<head>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
</head>
<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../phpmailer/vendor/autoload.php';
	 
	include("../config/connection.php");
	$id = 0;

	if(isset($_GET['reject']))
	{
		$id = $_GET['reject'];
		$result = $con->query("SELECT * FROM users WHERE id=$id") or die($con->error());
		if($result->num_rows){
			$row = $result->fetch_array();
			$lname = $row['lname'];
			$email = $row['email'];

		$con->query("DELETE FROM users WHERE id=$id") or die($con->error());
		$mail = new PHPMailer(true);

			try {
			    //Server settings
			    $mail->isSMTP(); 
			    $mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
					);                                          //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			    $mail->Username   = 'jejilo283@gmail.com';                     //SMTP username
			    $mail->Password   = 'jellyace120';                               //SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			    //Recipients
			    $mail->setFrom('jejilo283@gmail.com', 'Admin');
			    $mail->addAddress($email, $lname);     //Add a recipient
			     
			    //Content
			    $mail->isHTML(true);                                  //Set email format to HTML
			    $mail->Subject = 'Registration Failed';
			    $mail->Body    = 'Your account has been rejected by admin';
			    
			    $mail->send();

			    	header("location: Adminpage_pending_user.php?sending=email");

			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
		else{
			echo "Message could no be sent or Incorrect email address.";
		}	
	}
?>