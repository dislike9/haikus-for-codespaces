<?php
	include("../config/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <!--==================================================================================== 
                    link import here
    ======================================================================== -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e012ed3e1a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/Adminpage_style.css">
	<link rel="stylesheet" href="../css/MainStyle.css">
    <!-- jquery cdn link here -->
    <script src="../js/jquery-3.6.0.min.js"></script>
	<script src="../js/sweetalert2.all.min.js"></script>
	<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />

		<!--======================google charts for registered user================================-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
      		google.charts.load('current', {'packages':['corechart']});
      		google.charts.setOnLoadCallback(drawChart);

      			function drawChart() {

	        		var data = google.visualization.arrayToDataTable([
	        			['Grade Level', 'Number'],  
			          <?php
      						$query = "SELECT grade_level, count(*) AS NUMBER FROM users WHERE user_type = 'user' 
                              AND veri_status = 'verified' GROUP BY grade_level ORDER BY(grade_level) ASC";
								$result = mysqli_query($con, $query);

      						while($row = mysqli_fetch_array($result))
      						{
      							echo "['Grade ".$row["grade_level"]."', ".$row["NUMBER"]."],";
      						}
      					?>
	        		]);

		        var options = {
		          title: 'Registered user base on grade level.',
		          pieHole: 0.2,
		        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

    </script>
    <!--=========================graph in veri status==========================-->
    <script type="text/javascript">
      		google.charts.load('current', {'packages':['corechart']});
      		google.charts.setOnLoadCallback(drawChart);

      			function drawChart() {

	        		var data = google.visualization.arrayToDataTable([
	        			['Grade Level', 'Number'],  
			          <?php
      						$query = "SELECT veri_status, count(*) AS NUMBER FROM users WHERE user_type = 'user' GROUP BY veri_status";
								$result = mysqli_query($con, $query);

      						while($row = mysqli_fetch_array($result))
      						{
      							echo "['".$row["veri_status"]."', ".$row["NUMBER"]."],";
      						}
      					?>
	        		]);

		        var options = {
		          title: 'Pending Status',
		          pieHole: 0.2
		        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_verifieduser'));
        chart.draw(data, options);
      }
    </script>
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

<!--=======================================================================================-->

<div class="main-content">
<header>
        <div class="search-wrapper">
            <h3>Dashboard</h3>
        </div>
    </header>
<main>
        <div class="dash-cards">
            <div class="card-single">
                <div class="card-body">
                    <span class="fa-solid fa-users"></span> 
                    <div>
                        <h5>Registered users.</h5>
                        <?php
                        $query = "SELECT * FROM users WHERE user_type = 'user' AND veri_status = 'verified' ";
                        $query_run = mysqli_query($con, $query);

                        $registered_user = mysqli_num_rows($query_run);
                        ?>
                        <h4><?php echo $registered_user;?></h4>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="bx bx-user-voice"></span>
                    <div>
                        <h5>Pending users.</h5>
                        <?php
                        $query = "SELECT * FROM users WHERE user_type = 'user' AND veri_status = 'pending' ";
                        $query_run = mysqli_query($con, $query);

                        $pending_user = mysqli_num_rows($query_run);
                        ?>
                        <h4><?php echo $pending_user;?></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- piechar here -->
        <section class="recent">
            <div class="dash-cards container-fluid">
                <div class="activity-card">
                	<div class="card-single">
                		<div class="card-body"> 
                			<div id="piechart"></div>
                	    </div>
                    </div>   
                </div> 
                <div class="activity-card">
                	<div class="card-single">
                			<div class="card-body">
							 	<div id="piechart_verifieduser"></div>
								</div>
							</div>
						</div>
            </div>          
        </section>
</main>
</div>
	
</body>
</html>




