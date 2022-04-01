
<?php 
	include("../config/connection.php");
	$id = 0;

	if(isset($_GET['accept']))
	{
		$id = $_GET['accept'];

		$con->query("UPDATE users SET veri_status = 'verified' WHERE id=$id") or die($con->error());

		header('location: Adminpage_pending_user.php');

	}
?>