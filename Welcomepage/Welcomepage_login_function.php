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

            if($user_data['email_stat'] == '1'){

                if($user_data['veri_status'] == 'verified'){

                    if($user_data['user_type'] == 'admin'){

                        $_SESSION['username'] = $user_data['username'];
                        header("location: ../Adminpage/Adminpage.php");
                    }
                    elseif($user_data['user_type'] == 'user'){
                        
                        $_SESSION['email'] = $user_data['email'];
                        header("location: Welcomepage_index.php");
                    }
                }
                else{
                    header("location: Welcomepage_log_form.php?login=pending");
                    exit();
                }    
            }
            else{//You're account is still pending
                header("location: Welcomepage_verify_form.php?");
                exit();
            }    
        }
        else
        {//Incorrect email or password.
        header("location: Welcomepage_log_form.php?login=invalid");
        exit();
        }
    }    
?>
