<?php
include("../config/connection.php");

if(isset($_POST['reset'])){
    $email = $_POST['email'];
    $newPass = $_POST['newpass'];

    $query = "SELECT * FROM users WHERE email = '$email' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0){
        $con->query("UPDATE users SET password = '$newPass' WHERE email = '$email' ") or die($con->error());
        header("location: Welcomepage_reset_form.php?email=correct");
        exit();
    }else{
        header("location: Welcomepage_reset_form.php?email=incorrect");
        exit();
    }
}
?>