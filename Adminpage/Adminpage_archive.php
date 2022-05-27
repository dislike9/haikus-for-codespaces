<?php
	include("../config/connection.php");
	include("Adminpage_archive_restore_and_delete.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/e012ed3e1a.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../css/Adminpage_archive_style.css">
		<link rel="stylesheet" href="../css/MainStyle.css">
		<script src="../js/sweetalert2.all.min.js"></script>
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

<!-- main content -->
<div class="main-content">
<header>
        <div class="search-wrapper">
            <h3>Archive</h3>
        </div>
    </header>
<main>
	<section class="recent">
		<div class="dash-cards container-fluid">
            <div class="activity-card">
				<div class="card-single">
                	<div class="card-body-table">
					<table id="dataTable">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Firstname</th>
								<th scope="col">Lastname</th>
								<th scope="col">Grade Level</th>
								<th scope="col">Email</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
								<?php /*=======================Archive statement===============================*/
								$query = "SELECT * FROM users WHERE user_type = 'user' AND veri_status = 'verified' AND delete_status = '1'";
								$query_run = mysqli_query($con, $query);
								while ($row = $query_run->fetch_assoc()):
								?>
								<tr>
									<td><?php echo $row['id'];?></td>
									<td><?php echo $row['fname'];?></td>
									<td><?php echo $row['lname'];?></td>
									<td><?php echo "Grade ",$row['grade_level'];?></td>
									<td><?php echo $row['email'];?></td>
									<td>
										<a href="Adminpage_archive_restore_and_delete.php?restore=<?php echo $row['id']?>" class="btn btn-success restorebtn" name="restorebtn">Restore</a>
										<a href="Adminpage_archive_restore_and_delete.php?delete=<?php echo $row['id']?>" class="btn btn-danger deletebtn" name="perma_delete">Delete</a>
									</td>
								</tr>
								<?php endwhile;?>
						</table>
					</div>
				<div>
			</div>
		</div>
	</section>	
</main>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
    	$('#dataTable').DataTable({
			"lengthMenu": [ 5 ]
		});
		});
	</script>
	<script>
		$('.restorebtn').on('click', function(e)
		{
			e.preventDefault();
			const href = $(this).attr('href')

			Swal.fire({
				title : 'Are you sure?',
				text : 'This user will be restore.',
				icon : 'warning',
				type : 'warning',
				showCancelButton: true,
				cancelButtonColor: '#3085d6',
				confirmButtonColor: '#007500',
				confirmButtonText:'Restore',
			}).then((query_run)=>{
				if(query_run.value) {
					document.location.href = href;
				}
			})
		})
	</script>
	<script>
		$('.deletebtn').on('click', function(e)
		{
			e.preventDefault();
			const href = $(this).attr('href')

			Swal.fire({
				title : 'Are you sure?',
				text : 'This user will be permanently deleted!.',
				icon : 'warning',
				type : 'warning',
				showCancelButton: true,
				cancelButtonColor: '#3085d6',
				confirmButtonColor: '#d63031',
				confirmButtonText:'Delete',
			}).then((query_run)=>{
				if(query_run.value) {
					document.location.href = href;
				}
			})
		})
	</script>
<!--===========================Pop up notification================================================-->
	<?php
					if(!isset($_GET['archive'])){
						exit();
					}
					else{
						$signupCheck = $_GET['archive'];

						if($signupCheck == "restore"){
							echo '
		                <script>
		                $(document).ready(function(){
		                Swal.fire({
		                       type: "success",
		                       icon: "success",
		                       title: "User has been restore!",
		                     }).then(function(){
		                        window.location = "Adminpage_archive.php";
		                      })
		                    });
		                </script>
            			';
							exit();
						}
						elseif($signupCheck == "delete"){
							echo '
				                <script>
				                $(document).ready(function(){
				                Swal.fire({
				                       type: "success",
				                       icon: "success",
				                       title: "User has been permanently deleted!",
				                     }).then(function(){
				                        window.location = "Adminpage_archive.php";
				                      })
				                    });
				                </script>
		            		';
						}
					}
	?>
</body>
</html>