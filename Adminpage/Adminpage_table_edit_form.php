<?php
	include("../config/connection.php");
	include("Adminpage_table_edit_and_delete.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/e012ed3e1a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/Adminpage_table_edit_form_style.css">
    <link rel="stylesheet" href="../css/MainStyle.css">
	 <script src="../js/jquery-3.6.0.min.js"></script>
     <script src="../js/sweetalert2.all.min.js"></script>
	 <!-- themify icon here -->
	<link 
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"
    />
	<!-- box icon here -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
<input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
       <div class="sidebar-header">
        <div class="container brand">
            <image class="logo_image img-fluid" src="../images/logo.png">
        </div>
        <label  for="sidebar-toggle" class="ti-menu-alt"></label>
       </div>
      <!-- ================================================
                    Navigation sidebar heree 
                
        ====================================================-->
 <div class="sidebar-menu">
     <ul>
        <li>
             <a href="Adminpage.php">
                <span class="bx bxs-dashboard"></span>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="Adminpage_table.php">
               <span class="bx bxs-detail"></span>
               <span>List of student</span>
           </a>
       </li>
       <li>
            <a href="Adminpage_pending_user.php">
                <span class="bx bxs-user-plus"></span>
                <span>Pending users</span>
            </a>
        </li>   
        <li>
            <a href="Adminpage_archive.php">
                <span class='bx bxs-archive-in'></span>
                <span>Archive</span>
            </a>
        </li>
        <li>
            <a href="Adminpage_add_sec_grade.php">
                <span class='bx bx-book-add'></span>
                <span>Section & Grade</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="bx bxs-user-voice"></span>
                <span>Set instruction</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class='bx bxs-videos'></span>
                <span>Upload video</span>
            </a>
        </li>
        <li>
            <a href="Adminpage_tools.php">
                <span class='bx bxs-briefcase-alt-2'></span>
                <span>Tool for customization</span>
            </a>
        </li>      
        <li>
            <a href="../config/logout.php">
                <span class="bx bx-log-out"></span>
                <span>Logout</span>
            </a>
        </li>
    </ul>
  </div>
</div>

<div class="main-content">
<header>
        <div class="search-wrapper">
            <h3>Edit user information</h3>
        </div>
    </header>
<main>

<div class="dash-card">
<div class="activity-card w-50">
    <div class="card-single">
        <div class="card-body">
				<form action="Adminpage_table_edit_and_delete.php" method="POST" class="row g-4">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<div class="col-md-7 text-start">
					<label for="firstName" class="from-label">First Name: </label>
					<input type="text" class="form-control" id="firstName" name="fname" value="<?php echo $fname?>">
				</div>
				<div class="col-md-7 text-start">
					<label for="lastName" class="from-label">Last Name: </label>
					<input type="text" class="form-control" id="lastName" name="lname" value="<?php echo $lname?>">
				</div>
				<div class="col-md-7 text-start">
					<label for="e-mail" class="from-label">E-mail: </label>
					<input type="text" class="form-control" id="e-mail" name="email" value="<?php echo $email?>">
				</div>
				<div class="col-md-7 text-start">
					<label for="g_level" class="from-label">Grade level: </label>
<!-- ------------------------------Select for grade level------------------------------------- -->
					<?php 
					$sql = "SELECT * FROM add_grade";
					$result = mysqli_query($con, $sql);
					$option = array();
						
					if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								$option[] = $row;
							}
					}
					
					
					echo "<select class='form-control' id='g_level' name='grade_level' required>";
					echo "<option value='".$grade_level."'>Grade ".$grade_level."</option>";
							foreach($option as $option){
								echo "<option value='".$option['grade']."'>Grade ".$option['grade']."</option>";
							}
					echo "</select>";
				?>
				</div>
<!-- ------------------------------Select for section------------------------------------- -->
                <div class="col-md-7 text-start">
					<label for="section" class="from-label">Section: </label>
					<?php 
					$sql = "SELECT * FROM sec";
					$result = mysqli_query($con, $sql);
					$option = array();
						
					if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								$option[] = $row;
							}
					}
					
					
					echo "<select class='form-control' id='section' name='section' required>";
					echo "<option value='".$section."'>".$section."</option>";
							foreach($option as $option){
								echo "<option value='".$option['section']."'>".$option['section']."</option>";
							}
					echo "</select>";
				?>	
				</div>
				<div class="col-md-7 text-start">
					<label for="pass" class="from-label">Password: </label>
					<input type="text" class="form-control" id="pass" name="password" value="<?php echo $password?>">
				</div>
				<div class="col-md-12">
				<div class="modal fade" id="myModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Are you sure!</h3>
							</div>
							<div class="modal-body">
								<p>Update user information</p>
							</div>
							<div class="modal-footer">
								<button class="btn btn-primary update" type="submit" name="update">Update</button>
								<a class="btn btn-light" href="#" data-bs-dismiss="modal">Cancel</a>
							</div>
						</div>
					</div>
				</div>	
					<a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary">Update</a>
					<a class="btn btn-light" href="Adminpage_table.php" >Cancel</a>
				</div>				
			</form>	
		</div>  
    </div> 
</div>
</div>

</main>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>