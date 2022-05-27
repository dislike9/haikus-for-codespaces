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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e012ed3e1a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/Adminpage_tools_style.css">
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
<!--==================================================================================-->
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
<!--============================================================================
			gpu parts pop up modal hereee 
			
===============================================================================-->
<div class="col-md-12">
				<div class="modal fade" id="gpuModal">
					<div class="modal-dialog modal-lg-8">
						<div class="modal-content">
							<div class="modal-header">
								<h5>GPU</h5>
							</div>
							<div class="modal-body">
								<form action="Adminpage_tools_upload.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="size" value="1000000">
								<input type="hidden" name="item_type" value="GPU">
								<input type="hidden" name="socket" value="NULL">
								<input type="hidden" name="ddr" value="NULL">
								<input type="hidden" name="capacity" value="NULL">
								<label for="gpuname" class="form-label">GPU name</label>
								<input class="form-control" type="text" placeholder="GPU name..." aria-label="default input example" name="name" id="gpuname" required>

								<label for="select" class="form-label">GPU PCIe interface</label>
					                <select class="form-select" id="select" aria-label="Default select example" name="interface" required>
									  <option selected value="">Select a PCIe interface</option>
									  <option value="PCIe 4.0">PCIe 4.0</option>
									  <option value="PCIe 5.0">PCIe 5.0</option>
									</select>

									<label for="select" class="form-label">GPU Memory</label>
					                <select class="form-select" id="select" aria-label="Default select example" name="memory" required>
									  <option selected value="">Select a memory size</option>
									  <option value="4">4GB</option>
									  <option value="8">8GB</option>
									  <option value="12">12GB</option>
									</select>

									<label for="select" class="form-label">GPU watts</label>
					             <select class="form-select" id="select" aria-label="Default select example" name="watts" required>
									  <option selected value="">Select a watts</option>
									  <option value="50">50 watts</option>
									  <option value="100">100 watts</option>
									</select>	
					                <div class="mb-3">
								  	 <label for="formFileSm" class="form-label">GPU picture</label>
								      <input class="form-control form-control-sm" id="formFileSm" type="file" name="file" required>
								</div>
							</div>
									<div class="modal-footer">
										<button class="btn btn-primary update" type="submit" name="submit">Upload</button>
										<a class="btn btn-light" href="#" data-bs-dismiss="modal">Cancel</a>
									</div>
								</form>	
						</div>
					</div>
				</div>	
			</div>
<div class="main-content">
<header>
        <div class="search-wrapper">
            <h3>Tools for customization</h3>
        </div>
    </header>
<main>
<div class="dash-cards-tools-link">
            <div class="card-single">
                <div class="card-body-tools-link">
				<a href="Adminpage_tools.php" class="btn btn-outline-secondary linkbtn">GPU</a>
				<a href="Adminpage_tools_cpu.php" class="btn btn-outline-secondary linkbtn">CPU</a>
				<a href="Adminpage_tools_ram.php" class="btn btn-outline-secondary linkbtn">RAM</a>
				<a href="Adminpage_tools_mobo.php" class="btn btn-outline-secondary linkbtn">MOBO</a>
				<a href="Adminpage_tools_storage.php" class="btn btn-outline-secondary linkbtn">STORAGE</a>
				<a href="Adminpage_tools_psu.php" class="btn btn-outline-secondary linkbtn">PSU</a>
                </div>
            </div>
<section class="recent">
	<div class="dash-cards container-fluid">
        <div class="activity-card">
			<div class="card-single">
			<h3>GPU Table <a href="#" data-bs-toggle="modal" data-bs-target="#gpuModal" class="btn btn-outline-secondary addbtn">Add GPU</a>
				</h3>
                <div class="card-body-table">
<!--=====================================================================================
						gpu table here 
					
==========================================================================================-->
					<table id="dataTable">
						<thead>
						<tr>
							<th scope="col">image</th>
							<th scope="col">name</th>
							<th scope="col">interface</th>
							<th scope="col">memory</th>
							<th scope="col">watts</th>
							<!-- <th scope="col">action</th> -->
						</tr>
					</thead>
							<?php
							$query = "SELECT * FROM tools WHERE item_type='GPU' ";
							$query_run = mysqli_query($con, $query);
							while ($row = $query_run->fetch_assoc()):
							?>
							<tr>
								<td><image class="img_div" src="../uploadedFile/<?php echo $row['image'];?>"></td>
								<td><?php echo $row['name'];?></td>
								<td><?php echo $row['interface'];?></td>
								<td><?php echo $row['memory'];?></td>
								<td><?php echo $row['watts'];?></td>
								<!-- <td>
									<a href="Adminpage_table_edit_and_delete.php?delete=<?php echo $row['id'];?>"
									class="btn btn-danger deletebtn">Archive</a>
								</td> -->
							</tr>
							<?php endwhile;?>
					</table>
				</div>
			</div>
		</div>
	</div>	
</section>
</main>
</div>	

<!--================ import script datatable =======================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!--=================== GPU table datatable here    ================================-->
			<script>
				$(document).ready(function() {
		    	$('#dataTable').DataTable({
		    		"lengthMenu": [ 4 ]
		    	});
				} );
			</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>