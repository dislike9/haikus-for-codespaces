<?php
	//check if the user is login in order to get the user data.
	function check_login($con){

		if(isset($_SESSION['email'])){
			$email = $_SESSION['email'];
			$query = "SELECT * FROM users WHERE email = '$email' limit 1";

			$result = mysqli_query($con, $query);
			if($result && mysqli_num_rows($result) > 0){

				$user_data = mysqli_fetch_assoc($result);
				return $user_data; 
			}
		}
		//return to login page
		//header("Location: ../loginreg.php");
		//die();
	}
?>