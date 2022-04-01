<?php 
	include("../config/connection.php");
	$id = 0;

	if(isset($_GET['reject']))
	{
		$id = $_GET['reject'];

		$con->query("DELETE FROM users WHERE id=$id") or die($con->error());

		header('location: Adminpage_pending_user.php');
	}
?>