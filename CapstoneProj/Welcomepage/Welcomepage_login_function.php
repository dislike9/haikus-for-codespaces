<head>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
</head>
<?php
	session_start();
 	include("../config/connection.php");
    include("../config/function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['log-email'];
        $password = $_POST['log-password'];
        
        $select = "SELECT * FROM users WHERE email = '$email' && password = '$password' "; 

        $result = mysqli_query($con, $select);
        if(mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_array($result);

            if($user_data['veri_status'] == 'verified'){

                if($user_data['user_type'] == 'admin'){

                    $_SESSION['username'] = $user_data['username'];
                    header("location: ../Adminpage/Adminpage.php");
                }
                elseif($user_data['user_type'] == 'user'){
                    
                    $_SESSION['username'] = $user_data['username'];
                    header("location: userside/welcomepage.php");
                }
            }
            else{
                echo '
                <script>
                $(document).ready(function(){
                Swal.fire({
                       type: "warning",
                       icon: "warning",
                       title: "Your account is still not verified by admin",
                     }).then(function(){
                        window.location = "Welcomepage.php";
                      })
                    });
                </script>
            ';

            }    
        }
        else
        {
        	echo '
                <script>
                $(document).ready(function(){
                Swal.fire({
                       type: "error",
                       icon: "error",
                       title: "Incorrect email or password.",
                     }).then(function(){
                        window.location = "Welcomepage.php";
                      })
                    });
                </script>
            ';
        }
    }    
?>
