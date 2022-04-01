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
			<li><a href="#" class="a_style" id="modal-login"><i class="fa-solid fa-right-to-bracket"></i>Log in</a></li>
		</ul>
	</div>

	<div class="content_container">
	<div class="bg_box"></div>
		<div class="logo_container">
			<image class="logo_image" src="../images/RosaryHill.png">
		</div>
			<div class="h1_box">
				<h1>2D PC Challenging Quiz</h1>
			</div>
				<div class="h5_box">
					<h5>An Interactive Input/Output Device of Computer Customization Management 
						System for Rosary Hills International School</h5>
				</div>
					<div class="btn_box">
						<a href="#" class="btn_style" id="getstarted-btn">Get Started</a>
					</div>
						<div class="p_box"><i class="fa-solid fa-circle-arrow-up"></i><p>Don't have a account?.</p></div>	
	</div>
		<!--========================== register pop up modal==================================-->
	<div class="bg-modal-reg">
		<div class="modal-content">
			<form action="Welcomepage_registration_function.php" method="POST">
				<h2 class="h2-font">Sign up.</h2>
				<a href="Welcomepage.php" class="close">+</a>
				<label class="label-fname">Firstname: </label>
				<input type="text" class="input-field" name="reg-firstname" placeholder="Enter your first name..." required>
				<label class="label-lname">Lastname: </label>
            	<input type="text" class="input-field" name="reg-lastname" placeholder="Enter your last name..." required>
            	<label class="label-add">Grade level: </label>
            	<select class="input-field" name="grade_level" required>
              		<option value="">Please select your grade level.</option>
              		<option value="Grade 7">Grade 7</option>
              		<option value="Grade 8">Grade 8</option>
              		<option value="Grade 9">Grade 9</option>
              		<option value="Grade 10">Grade 10</option>
              		<option value="Grade 11">Grade 11</option>
              		<option value="Grade 12">Grade 12</option>
            	</select>
            	<label class="label-uname">Email: </label>
            	<input type="Email" class="input-field" name="reg-email" placeholder="Enter your email..." required>
            	<label class="label-pass">Password: </label>
            	<input type="password" class="input-field" name="reg-password" placeholder="Create your password..." required>
            	<button type="submit" name="reg-btn" class="submit-btn">Submit</button>
            	<p class="p_box1">Already have an account? <a href="#" id="switch-login">click here..</a></p>
			</form>
		</div>
		<script>/*====================script for pop up modal reg===============*/
					document.getElementById('getstarted-btn').addEventListener('click', function(){
                    document.querySelector('.bg-modal-reg').style.display = 'flex';
                    });
                    document.querySelector('.close').addEventListener('click', function(){
                    document.querySelector('.bg-modal-reg').style.display = 'none';
                    });
		</script>
		<script>/*====================switch to login modal===============*/
					document.getElementById('switch-login').addEventListener('click', function(){
					document.querySelector('.bg-modal-reg').style.display = 'none';	
                    document.querySelector('.bg-modal-login').style.display = 'flex';
                    });
		</script>
	</div>
		<!--========================== login pop up modal==================================-->
		<div class="bg-modal-login">
			<div class="modal-content-login">
				<form action="Welcomepage_login_function.php" method="POST">
					<a href="Welcomepage.php" class="close">+</a>
					<h2 class="h2-font-log">Log in</h2>
					<label class="label-uname-log">Email: </label>
					<input type="Email" class="input-field" name="log-email" placeholder="Enter your email..." required>
					<label class="label-pass-log">Password: </label>
					<input type="password" class="input-field" name="log-password" placeholder="Enter your password..." required>
					<a href="#" class="link-forgotpass">Forgot your password?</a>
					<button type="submit" name="login-btn" class="login-btn">Log in<i class="fa-solid fa-arrow-right-to-bracket"></i></button>
					<p class="p_box2">Don't have a account? <a href="#" id="switch-reg">click here..</a></p>
				</form>
			</div>
			<script>/*====================script for pop up modal reg===============*/
					document.getElementById('modal-login').addEventListener('click', function(){
                    document.querySelector('.bg-modal-login').style.display = 'flex';
                    });
                    document.querySelector('.close').addEventListener('click', function(){
                    document.querySelector('.bg-modal-login').style.display = 'none';
                    });
			</script>
			<script>/*====================switch to reg modal===============*/
					document.getElementById('switch-reg').addEventListener('click', function(){
					document.querySelector('.bg-modal-login').style.display = 'none';	
                    document.querySelector('.bg-modal-reg').style.display = 'flex';
                    });
		</script>	
		</div>
</body>
</html>