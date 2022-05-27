<?php
  session_start();
  include("../config/connection.php");
  include("../config/function.php");

  $user_data = check_login($con);
?>
<html>
<head>
  <meta  charset="utf-8">
  <meta name="description" content="Computer's Anatomy">
  <meta name="author" content="Loquias">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Welcomepage_home_style.css">
 
</head>
<body>
   <nav>
    <div class="menu">
      <div class="logo">
         <img class="logo_size" src="../images/logo.png">
      </div>
      
      
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="Welcomepage.php">Log out</a></li>
      </ul>
    </div>
  </nav>
  <div class="img"></div>
  <div class="center">
    <div class="title">Welcome user!</div>
    <div class="sub_title">Good day!</div>
    <div class="btns">
    </div>
  </div>
</body>
</html>
