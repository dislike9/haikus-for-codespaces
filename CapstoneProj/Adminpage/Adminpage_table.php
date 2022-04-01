<?php
	include("../config/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/e012ed3e1a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/Adminpage_table_style.css">
	<script src="../js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    </script>
</head>
<body>
	<div class="side_navbar_container">
		<div class="logo_container">
			<image class="logo_image" src="../images/RosaryHill.png">
		</div>
		<ul>
			<li><a href="Adminpage.php">Dashboard</a></li>
			<li><a href="Adminpage_table.php">Table</a></li>
			<li><a href="Adminpage_pending_user.php">Pending users</a></li>
			<li><a href="Adminpage_archive.php">Archive</a></li>
			<li><a href="#">Set Instruction</a></li>
			<li><a href="#">Upload Video</a></li>
			<li><a href="#">Tool for Customization</a></li>
			<li><a href="#">Log out</a></li>
		</ul>
	</div>
	<div class="dashboard_table_box">
		<h3>Table</h3>
	</div>
	<div class="table_container">
		<table id="dataTable">
  		<thead>
    		<tr>
     			<th scope="col">Firstname</th>
      			<th scope="col">Lastname</th>
      			<th scope="col">Grade Level</th>
      			<th scope="col">Email</th>
      			<th scope="col">Action</th>
    		</tr>
  		</thead>
  				 <?php
                 $query = "SELECT * FROM users WHERE user_type = 'user' AND veri_status = 'verified' ";
                 $query_run = mysqli_query($con, $query);
                 while ($row = $query_run->fetch_assoc()):
                 ?>
                 <tr>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['grade_level'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td>
                        <a href="updateuserpage.php?edit=<?php echo $row['id'];?>" 
                        id="button1" class="editbtn">Edit</a>
                        <a href="../config/configdashboard.php?delete=<?php echo $row['id'];?>"
                        class="deletebtn">Delete</a>
                    </td>
                 </tr>
                 <?php endwhile;?>
  	    </table>
	</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
    	$('#dataTable').DataTable();
		} );
	</script>
</body>
</html>