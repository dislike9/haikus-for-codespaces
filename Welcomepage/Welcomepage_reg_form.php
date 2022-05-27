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
			<li><a href="#" class="a_style" id="modal-login" name="modal-login"><i class="fa-solid fa-right-to-bracket"></i>Log in</a></li>
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
						<a href="#" class="btn_style" id="getstarted-btn" name="getstarted-btn">Get Started</a>
					</div>
						<div class="p_box"><i class="fa-solid fa-circle-arrow-up"></i><p>Don't have an account yet?</p></div>	
	</div>
<!--========================== register pop up modal==================================-->
	<div class="bg-modal-reg">
		<div class="modal-content">
			<form action="Welcomepage_registration_function.php" method="POST">
				<?php 
					if(isset($_GET['fname'])){
						$fname = $_GET['fname'];
					echo '<input type="text" class="input-field" id="fname" name="reg-firstname" placeholder="Enter your first name" value="'.$fname.'"required>';
					}
					else{
						echo'<input type="text" class="input-field" id="fname" name="reg-firstname" placeholder="Enter your first name" required>';
					}

					if(isset($_GET['lname'])){
						$lname = $_GET['lname'];
					echo '<input type="text" class="input-field" id="lname" name="reg-lastname" placeholder="Enter your last name" value="'.$lname.'"required>';
					}
					else{
						echo'<input type="text" class="input-field" id="lname" name="reg-lastname" placeholder="Enter your last name" required>';
					}
				?>
				<h2 class="h2-font">Sign up.</h2>
				<a href="Welcomepage.php" class="close">+</a>
				<label class="label-fname">First Name: </label>
				<label class="label-lname">Last Name: </label>
            	<label class="label-add">Grade level: </label>
<!-- -------------------------- php code for select tag ------------------------------------- -->
            	<?php 
					$sql = "SELECT * FROM add_grade";
					$result = mysqli_query($con, $sql);
					$option = array();
						
					if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								$option[] = $row;
							}
					}
					
					
					echo "<select class='input-field' id='grade_level' name='grade_level' required>";
					echo "<option value=''>Select a grade level</option>";
							foreach($option as $option){
								echo "<option value='".$option['grade']."'>Grade ".$option['grade']."</option>";
							}
					echo "</select>";
				?>	
				<label class="label-sec">Section: </label>
<!-- -------------------------- Section select tag ------------------------------------- -->
            	<?php 
					$sql = "SELECT * FROM sec";
					$result = mysqli_query($con, $sql);
					$option = array();
						
					if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								$option[] = $row;
							}
					}
					
					
					echo "<select class='input-field' id='section' name='section' required>";
					echo "<option value=''>Select a section</option>";
							foreach($option as $option){
								echo "<option value='".$option['section']."'>".$option['section']."</option>";
							}
					echo "</select>";
				?>	
				
            	<label class="label-uname">Email: </label>
            		<input type="Email" class="input-field" id="email" name="reg-email" placeholder="Enter your email" required>
            	<label class="label-pass">Password: </label>
            		<input type="password" class="input-field" id="password" name="reg-password" placeholder="Create your password" required>
            	<label class="label-conpass">Confirm Pass: </label>
            		<input type="password" class="input-field" id="confirm_pass" name="confirm-password" placeholder="Confirm your password here" required>
            	<button type="submit" name="reg-btn" id="reg-btn" class="submit-btn">Sign up</button>
            	<p class="p_box1">Already have an account? <a href="Welcomepage_log_form.php" id="switch-login" name="switch-login">click here..</a></p>
			</form>
<!--=============================Registration validation=======================================-->
				<?php
					if(!isset($_GET['signup'])){
						exit();
					}
					else{
						$signupCheck = $_GET['signup'];

						if($signupCheck == "invalid"){
							echo "<p class='error'>Please provide a valid information</p>";
							exit();
						}
						elseif($signupCheck == "incorrect_pass"){
							echo "<p class='error'>Confirmation password is not match.</p>";
							exit();
						}
						elseif($signupCheck == "email_already_exist"){
							echo "<p class='error'>Your email is already taken.</p>";
							exit();
						}
						
						elseif($signupCheck == "success"){
							echo '
				                <script>
				                $(document).ready(function(){
				                Swal.fire({
				                       type: "success",
				                       icon: "info",
				                       title: "Please verify your email.",
									   text: "We will send a verification code to your email and will expire within 15mins",
				                     }).then(function(){
				                        window.location = "Welcomepage_verify_form.php";
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