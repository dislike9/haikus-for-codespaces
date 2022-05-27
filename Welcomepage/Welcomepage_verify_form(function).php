<?php 
	include("../config/connection.php");
    //set the timezone to asia
    date_default_timezone_set('Asia/Manila');
    $todayDate = date('m/d/Y H:i:s');

    if(isset($_POST["verify"])){
        $veri_code = $_POST["veriCode"];
    
        $query = "SELECT * FROM users WHERE veri_code = '$veri_code' ";
            //AND code_ex = '0' AND NOW() <= DATE_ADD(veri_at, INTERVAL 15 MINUTE) ";
        $query_run = mysqli_query($con, $query);

 //==============================check if blank
        if(!empty($veri_code)){
 //==================checking if there is $veri_code & $email in the array
         if(mysqli_num_rows($query_run) > 0){
 //========================checking the expiration date of verification code
            $queryVeri_at = "SELECT * FROM users WHERE veri_code = '$veri_code'
            AND code_ex = '0' AND NOW() <= DATE_ADD(veri_at, INTERVAL 15 MINUTE) ";
            $queryVeri_at_run = mysqli_query($con, $queryVeri_at);
                
            if(mysqli_num_rows($queryVeri_at_run) > 0){
 //===============================updating accoung verify status to verified 
              $update_stat = "UPDATE users SET code_ex = '1', email_stat = '1'
                               WHERE veri_code = '$veri_code' " ;
              $update_res = mysqli_query($con, $update_stat);  

              header("location: Welcomepage_verify_form.php?email=correct");
            }
            else{
              header("location: Welcomepage_verify_form.php?email=timeout"); 
            }
          }
            else{
             header("location: Welcomepage_verify_form.php?email=incorrect");
            }
          }
          else{
              header("location: Welcomepage_verify_form.php?email=blank");
          }
     }
     //resend button
     if(isset($_POST['resend'])){

        // $veri_code = $_POST["veriCode"];
        // $data = mysqli_query($con, "SELECT * FROM users WHERE veri_code = '$veri_code' ");
        // $result = mysqli_fetch_array($data);

        // $exp_at = $result['veri_at'];
        // $interval = new DateTime($exp_at);
        // $interval->add(new DateInterval('PT15M'));

        // $code_ex = $interval->format('Y-m-d H:i:s');

        //  if($todayDate < $code_ex){
        //      echo "The product is expired";
        //  }else{
        //      echo "The product is not expired and will expire in $code_ex";
        //  }
     }

?>
