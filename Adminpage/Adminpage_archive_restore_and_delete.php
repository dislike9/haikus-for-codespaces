<head>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
</head>
<?php 
	include("../config/connection.php");
	$id = 0;
	
	if(isset($_GET['restore'])){//=============================sql statement in restore button>>>>
		$id = $_GET['restore'];

	$con->query("UPDATE users SET delete_status = '0' WHERE id=$id") or die($con->error());

		header("location: Adminpage_archive.php?archive=restore");
	}
	if(isset($_GET['delete'])){//=============================sql statement in delete button>>>>
		$id = $_GET['delete'];

		$con->query("DELETE FROM users WHERE id=$id") or die($con->error());

		header("location: Adminpage_archive.php?archive=delete");
	}
?>