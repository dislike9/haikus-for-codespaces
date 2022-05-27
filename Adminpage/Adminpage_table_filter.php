<?php
	include("../config/connection.php");
	include("Adminpage_table_edit_and_delete.php");
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
	<link rel="stylesheet" href="../css/Adminpage_table_style.css">
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
            <h3>Student Filter</h3>
        </div>
    </header>
<main>
<section class="recent">
	<div class="dash-card container-fluid">
        <div class="activity-card w-50">
            <div class="card-single">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <form class="form-horizontal" action="Adminpage_table.php" method="POST">
                                <div class="form-group mb-2">
                                    <label class="col-lg-7 control-label">First Name: </label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="fname" placeholder="First name here...">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-lg-7 control-label">Last Name: </label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="lname" placeholder="Last name here...">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-lg-7 control-label">Section: </label>
                                    <div class="col-lg-7">
                                    <?php 
                                            $sql = "SELECT * FROM sec";
                                            $result = mysqli_query($con, $sql);
                                            $option = array();
                                                
                                            if(mysqli_num_rows($result) > 0){
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        $option[] = $row;
                                                    }
                                            }
                                            
                                            
                                            echo "<select class='form-control' id='section' name='section'>";
                                            echo "<option value=''>Select a section</option>";
                                                    foreach($option as $option){
                                                        echo "<option value='".$option['section']."'>".$option['section']."</option>";
                                                    }
                                            echo "</select>";
                                        ?>	
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-lg-7 control-label">Grade Level: </label>
                                    <div class="col-lg-7">
                                    <?php 
                                        $sql = "SELECT * FROM add_grade";
                                        $result = mysqli_query($con, $sql);
                                        $option = array();
                                            
                                        if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $option[] = $row;
                                                }
                                        }
                                        
                                        
                                        echo "<select class='form-control' id='grade_level' name='grade_level'>";
                                        echo "<option value=''>Select a grade level</option>";
                                                foreach($option as $option){
                                                    echo "<option value='".$option['grade']."'>Grade ".$option['grade']."</option>";
                                                }
                                        echo "</select>";
                                    ?>	
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                                
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
</main>
</div>
</body>
</html>