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
	$lname = '';
	$email = '';
	if(isset($_GET['accept']))
	{
		$id = $_GET['accept'];
		$result = $con->query("SELECT * FROM users WHERE id=$id") or die($con->error());
		if($result->num_rows){
			$row = $result->fetch_array();
			$lname = $row['lname'];
			$email = $row['email'];

		// $con->query("UPDATE users 
		// 			SET veri_status = 'verified', veri_at = NOW()
		// 			WHERE id=$id") or die($con->error());	
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

			    $mail->Subject = 'Admin Approval';
			    $mail->Body    = '<p>You can login now in 2D PC Challenging Quiz.</p>';
			    
			    $mail->send();

				$sql = "UPDATE users SET veri_status = 'verified' WHERE id = $id ";
				mysqli_query($con, $sql);

			    	header("location: Adminpage_pending_user.php?sending=email");

			} catch (Exception $e) {
			    header("location: Adminpage_pending_user.php?sending=error");
			}
		}
		else{
			echo "Unknown error occured. Try again later";
		}	
	}
	else{
		echo "Unknown error occured. Try again later";
	}
?>