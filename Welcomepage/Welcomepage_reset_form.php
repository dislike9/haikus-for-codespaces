<?php
	session_start();
	include("../config/connection.php");
	include("../config/function.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!--================== imports here =============-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/e012ed3e1a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/Welcomepage_style.css">
	<script src="../js/jquery-3.6.0.min.js"></script>
	<script src="../js/sweetalert2.all.min.js"></script>
</head>
<body>
	<div class="header_container">
		<ul class="nav_style">
			<li><a href="Welcomepage_log_form.php" class="a_style" id="modal-login" name="modal-login"><i class="fa-solid fa-right-to-bracket"></i>Log in</a></li>
		</ul>
	</div>

	<div class="content_container">
	<div class="bg_box"></div>
	<div class="school_logo_container">
			<image class="school_logo_image" src="../images/RosaryHill.png">
		</div>
		<div class="logo_container">
			<image class="logo_image" src="../images/logo.png">
		</div>
			<div class="h1_box">
				<h1>2D PC Challenging Quiz</h1>
			</div>
				<div class="h5_box">
					<h5>An Interactive Input/Output Device of Computer Customization Management 
						System for Rosary Hills International School</h5>
				</div>
					<div class="btn_box">
						<a href="Welcomepage_reg_form.php" class="btn_style" id="getstarted-btn" name="getstarted-btn">Get Started</a>
					</div>
						<div class="p_box"><i class="fa-solid fa-circle-arrow-up"></i><p>Don't have an account yet?</p></div>	
	</div>
		<!--========================== login pop up modal==================================-->
		<div class="bg-modal-login">
			<div class="modal-content-login">
				<form action="Welcomepage_reset_form(function).php" method="POST">
					<a href="Welcomepage.php" class="close">+</a>
					<h2 class="h2-font-ver">Reset your password</h2>
					<label class="label-reset">Enter your email to change your password.</label>
					<input type="text" class="input-field-reset" name="email" placeholder="Enter your email">
					<input type="password" class="input-field-reset" name="newpass" placeholder="Enter your new password">
					<button type="submit" name="reset" class="btn btn-primary">Change password</button>
				</form>
					
<!--=============================Log in validation=======================================-->
				<?php
					if(!isset($_GET['email'])){
						exit();
					}
					else{
						$veri = $_GET['email'];

						if($veri == "incorrect"){
							echo "<p class='errorCode'>Incorrect email address</p>";
							exit();
						}
						elseif($veri == "correct"){
							echo '
				                <script>
				                $(document).ready(function(){
				                Swal.fire({
				                       type: "success",
				                       icon: "success",
				                       title: "Success",
									   text: "Your password has been updated.",
				                     }).then(function(){
				                        window.location = "Welcomepage_log_form.php";
				                      })
				                    });
				                </script>
		            		';
						}
					}
				?>
			</div>
		</div>
</body>
</html>