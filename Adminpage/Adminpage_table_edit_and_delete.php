<head>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
</head>
<?php 
	include("../config/connection.php");

	$id = 0;
	$fname = '';
	$lname = '';
	$grade_level = '';
	$section='';
	$email = '';
	$password = '';

	if(isset($_GET['edit'])){//===============================sql statement in edit button>>>
		$id = $_GET['edit'];
		$result = $con->query("SELECT * FROM users WHERE id=$id") or die($con->error());
		if($result->num_rows){
			$row = $result->fetch_array();
			$fname = $row['fname'];
			$lname = $row['lname'];
			$grade_level = $row['grade_level'];
			$section = $row['section'];
			$email = $row['email'];
			$password = $row['password'];

		}
	}
	if(isset($_GET['delete'])){//=============================sql statement in delete button>>>>
		$id = $_GET['delete'];

		$con->query("UPDATE users SET delete_status = '1' WHERE id=$id") or die($con->error());

		header("location: Adminpage_table.php?update=successfully_archive");
	}
	if (isset($_POST['update'])) {//=================================sql statement in update button>>>>
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$grade_level = $_POST['grade_level'];
		$section = $_POST['section'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		
			$con->query("UPDATE users SET fname='$fname', lname='$lname', grade_level='$grade_level', section='$section',email='$email', password='$password' WHERE id=$id") or
			die($con->error);

			header("location: Adminpage_table.php?update=successfully_updated");
	}
?>