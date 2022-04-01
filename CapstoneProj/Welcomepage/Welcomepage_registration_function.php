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
        $fname = $_POST['reg-firstname'];
        $lname = $_POST['reg-lastname'];
        $grade_level = $_POST['grade_level'];
        $email = $_POST['reg-email'];
        $password = $_POST['reg-password'];
        
        if(!is_numeric($fname) && !is_numeric($lname))
        {
            //==============to avoid the duplication of username==================
              $stmt = $con->prepare("SELECT email FROM users WHERE email = ? Limit 1");
              $stmt->bind_param("s", $email);
              $stmt->execute();
              $stmt->bind_result($email);
              $stmt->store_result();
              $rnum = $stmt->num_rows;

            if($rnum == 0)
            {
            //======================insert statement===========================
            $query = "INSERT INTO users (fname, lname, grade_level, email, password) values ('$fname','$lname','$grade_level','$email',
                '$password')";

            mysqli_query($con, $query);

            echo '
            	<script>
            	$(document).ready(function(){
				Swal.fire({
					   type: "success",
					   icon: "success",
					   title: "Registration is still not complete yet.",
					   text: "Please wait for the verification of the admin.",
					   width: "580px",
					 }).then(function(){
					 	window.location = "Welcomepage.php";
					 	})
					});
				</script>
            ';
            }
            else
            {
            echo '
            	<script>
            	$(document).ready(function(){
				Swal.fire({
					   type: "warning",
					   icon: "warning",
					   title: "Invalid email",
					   text: "Email is already existing",
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
					   type: "warning",
					   icon: "error",
					   title: "Invalid input",
					   text: "Please provide a valid information",
					 }).then(function(){
					 	window.location = "Welcomepage.php";
					 	})
					});
				</script>
            ';
        }
    }
?>

