<?php
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../phpmailer/vendor/autoload.php';

    include("../config/connection.php");
	

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $fname = $_POST['reg-firstname'];
        $lname = $_POST['reg-lastname'];
        $grade_level = $_POST['grade_level'];
        $section = $_POST['section'];
        $email = $_POST['reg-email'];
        $password = $_POST['reg-password'];
        $confirm_pass = $_POST['confirm-password'];
        
        if(!is_numeric($fname) && !is_numeric($lname))
        {
            //==============to avoid the duplication of username==================
              $stmt = $con->prepare("SELECT email FROM users WHERE email = ? Limit 1");
              $stmt->bind_param("s", $email);
              $stmt->execute();
              $stmt->bind_result($email);
              $stmt->store_result();
              $rnum = $stmt->num_rows;

              if($password == $confirm_pass){

                    if($rnum == 0)
                    {
                    //======================insert statement===========================
                    $query = "INSERT INTO users (fname, lname, grade_level, section, email, password) 
                    values ('$fname','$lname','$grade_level','$section','$email', '$password')";
                    mysqli_query($con, $query);
                    
                    //sending OTP
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
                        $mail->setFrom('jejilo283@gmail.com', '2D PC Challenging Quiz Admin');
                        $mail->addAddress($email, $lname);     //Add a recipient
                         
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
        
                        $veri_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        
                        $mail->Subject = 'Email Verification';
                        $mail->Body    = '<p>Your account verification code is: <b style="font-size: 30px;">'.$veri_code.'</b></p>
                                          <p>Your verification code will expire in 15 minute</p>';
                        
                        $mail->send();
        
                        $sql = "UPDATE users SET veri_code = $veri_code, veri_at = NOW() WHERE email = '$email' ";
                        mysqli_query($con, $sql);
        
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer  Error: {$mail->ErrorInfo}";
                    }

                    //registration success
                    header("location: Welcomepage_reg_form.php?signup=success");
                    }
                    else
                    {//email is already existing
                    header("location: Welcomepage_reg_form.php?signup=email_already_exist&fname=$fname&lname=$lname");
                        exit();
                    }
                }
                else{
                    header("location: Welcomepage_reg_form.php?signup=incorrect_pass&fname=$fname&lname=$lname");
                    exit();
                }    
        }
        else
        {//input a valid information
            header("location: Welcomepage_reg_form.php?signup=invalid");
            exit();
        }
    }
?>