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
						<a href="Welcomepage_reg_form.php" class="btn_style">Get Started</a>
					</div>
						<div class="p_box"><i class="fa-solid fa-circle-arrow-up"></i><p>Don't have an account yet?</p></div>	
	</div>
</body>
</html>