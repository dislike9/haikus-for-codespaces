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
	<link rel="stylesheet" href="../css/Adminpage_style.css">
	<script src="../js/sweetalert2.all.min.js"></script>

		<!--======================google charts for registered user================================-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
      		google.charts.load('current', {'packages':['corechart']});
      		google.charts.setOnLoadCallback(drawChart);

      			function drawChart() {

	        		var data = google.visualization.arrayToDataTable([
	        			['Grade Level', 'Number'],  
			          <?php
      						$query = "SELECT grade_level, count(*) AS NUMBER FROM users WHERE user_type = 'user' AND veri_status = 'verified' GROUP BY grade_level ORDER BY(id) ASC";
								$result = mysqli_query($con, $query);

      						while($row = mysqli_fetch_array($result))
      						{
      							echo "['".$row["grade_level"]."', ".$row["NUMBER"]."],";
      						}
      					?>
	        		]);

		        var options = {
		          title: 'Registered user base on grade level.',
		          pieHole: 0.4,
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
		          pieHole: 0.4
		        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_verifieduser'));
        chart.draw(data, options);
      }
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
			<li><a href="#">Archive</a></li>
			<li><a href="#">Set instruction</a></li>
			<li><a href="#">Upload video</a></li>
			<li><a href="#">Tool for customization</a></li>
			<li><a href="#">Log out</a></li>
		</ul>
	</div>
	<div class="dashboard_box">
		<h3>Dashboard</h3>
	</div>
	<div class="num_registered_user_box">
		<i class="fa-solid fa-users"></i>
		<h3>Registered users.</h3>
			<?php
                $query = "SELECT * FROM users WHERE user_type = 'user' AND veri_status = 'verified' ";
                $query_run = mysqli_query($con, $query);

                    $row = mysqli_num_rows($query_run);

                       echo '<h4>'.$row.'</h4>';
            ?>
	</div>
	<div class="pending_user_box">
		<h3>Pending users.</h3>
		<i class="fa-solid fa-envelope"></i>
		<?php
                $query = "SELECT * FROM users WHERE user_type = 'user' AND veri_status = 'pending' ";
                $query_run = mysqli_query($con, $query);

                    $row = mysqli_num_rows($query_run);

                       echo '<h4>'.$row.'</h4>';
        ?>
	</div>
	 <div id="piechart" class="piechart_style"></div>
	 <div id="piechart_verifieduser" class="piechart_verified_style"></div>
</body>
</html>