<?php
	include("../config/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<!--=============================List of users============================================-->

	<!--=============================Imports link here============================================-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e012ed3e1a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/Adminpage_table_section_style.css">
	<link rel="stylesheet" href="../css/MainStyle.css">
	<!-- sweetler cdn link -->
	<script src="../js/sweetalert2.all.min.js"></script>
	<!-- jquery -->
	<script src="../js/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
            <a href="Adminpage_table_filter.php">
               <span class="bx bxs-detail"></span>
               <span>Student Db</span>
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
<!-- main conten -->
<div class="main-content">
<header>
        <div class="search-wrapper">
            <h3>Create a new Section & Grade Level</h3>
        </div>
    </header>
<main>
<section class="recent">
	<div class="dash-cards">
		<div class="activity-card">
            <div class="card-single">
				<div class="card-header">
					Add Grade Level
					</div>
                <div class="card-body">
					<form action="Adminpage_add_sec_grade_function.php" method="POST">
					<h5 class="card-title">Create a Grade Level</h5>
					<p class="card-text">
						<input type="text" name="add_grade" class="form-control form-control-sm" placeholder="Create a Grade Level" required>	
					</p>
					<button type="submit" name="create_grade" class="btn btn-primary">Create</button>
					</form>
				</div>
			</div>
		</div>
		<div class="activity-card">
		<div class="card-single">
				<div class="card-header">
					Add section
					</div>
                <div class="card-body">
					<form action="Adminpage_add_sec_grade_function.php" method="POST">
					<h5 class="card-title">Create a section.</h5>
					<p class="card-text">
						<input type="text" name="section_name" class="form-control form-control-sm" placeholder="Create a section" required>
					</p>
					<button type="submit" name="create_section" class="btn btn-primary">Create</button>
					</form>
				</div>
			</div>
		</div>	
	</div>
	</section>
<div class="dash-cards container-fluid">
<div class="activity-card">
            <div class="card-single">
			<div class="card-body-table-sectionlist">
					<table id="gradeTable" class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Grade</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
								<?php
								$query = "SELECT * FROM add_grade";

								$query_run = mysqli_query($con, $query);
								while ($row = $query_run->fetch_assoc()):
								?>
								<tr>
									<td><?php echo $row['grade'];?></td>
									<td>
										<a href="Adminpage_add_sec_grade_function.php?grade-delete=<?php echo $row['id'];?>"
										class="btn btn-danger deletebtn">Delete</a>
									</td>
								</tr>
								<?php endwhile;?>
						</table>
					</div>
			</div>
	</div>
	<!-- ----------------------------------section table here----------------------- -->
	<div class="activity-card">
            <div class="card-single">
			<div class="card-body-table-sectionlist">
					<table id="secTable" class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Section</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
								<?php
								$query = "SELECT * FROM sec";

								$query_run = mysqli_query($con, $query);
								while ($row = $query_run->fetch_assoc()):
								?>
								<tr>
									<td><?php echo $row['section'];?></td>
									<td>
										<a href="Adminpage_add_sec_grade_function.php?sec-delete=<?php echo $row['id'];?>"
										class="btn btn-danger deletebtn">Delete</a>
									</td>
								</tr>
								<?php endwhile;?>
						</table>
					</div>
			</div>
	</div>
</div>		
</main>
</div>
<!-- imports for dataTable here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
    	$('#gradeTable').DataTable({
			"bInfo" : false,
			"lengthMenu": [ 5 ]
		});
		});
	</script>
	<script>
		$(document).ready(function() {
    	$('#secTable').DataTable({
			"bInfo" : false,
			"lengthMenu": [ 5 ]
		});
		});
	</script>
<?php
				if(!isset($_GET['create'])){
						exit();
					}
					else{
						$action = $_GET['create'];

						if($action == "create-grade"){
							echo '
				                <script>
				                $(document).ready(function(){
				                Swal.fire({
				                       type: "success",
				                       icon: "success",
				                       title: "Successfully Created",
				                     }).then(function(){
				                        window.location = "Adminpage_add_sec_grade.php";
				                      })
				                    });
				                </script>
		            		';
						}
					   elseif($action == "delete-grade"){
							echo '
				                <script>
				                $(document).ready(function(){
				                Swal.fire({
				                       type: "success",
				                       icon: "success",
				                       title: "Successfully Deleted",
				                     }).then(function(){
				                        window.location = "Adminpage_add_sec_grade.php";
				                      })
				                    });
				                </script>
		            		';
						}
						elseif($action == "create-sec"){
							echo '
				                <script>
				                $(document).ready(function(){
				                Swal.fire({
				                       type: "success",
				                       icon: "success",
				                       title: "Successfully Created",
				                     }).then(function(){
				                        window.location = "Adminpage_add_sec_grade.php";
				                      })
				                    });
				                </script>
		            		';
						}
						elseif($action == "delete-sec"){
							echo '
				                <script>
				                $(document).ready(function(){
				                Swal.fire({
				                       type: "success",
				                       icon: "success",
				                       title: "Successfully Deleted",
				                     }).then(function(){
				                        window.location = "Adminpage_add_sec_grade.php";
				                      })
				                    });
				                </script>
		            		';
						}
						elseif($action == "duplicate"){
							echo '
				                <script>
				                $(document).ready(function(){
				                Swal.fire({
				                       type: "error",
				                       icon: "error",
				                       title: "Already existing",
				                     }).then(function(){
				                        window.location = "Adminpage_add_sec_grade.php";
				                      })
				                    });
				                </script>
		            		';
						}
					}	
			?>
</body>
</html>