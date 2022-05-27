<?php
	
	include("../config/connection.php");

	if(isset($_POST['submit'])){

		$image = $_FILES['file']['name'];
		$item_type = $_POST['item_type'];
		$name = $_POST['name'];
		// ================================================>>computer here
		$memory = $_POST['memory'];
		$interface = $_POST['interface'];
		$socket = $_POST['socket'];
		$ddr = $_POST['ddr'];
		$capacity = $_POST['capacity'];
		$watts = $_POST['watts'];
		//==========================================>>1mb only
		$fileSize = $_FILES['file']['size'];
		//=================================================>>error check
		$fileError = $_FILES['file']['error'];
		//====================================================>to avoid uploading any kind of file
		$allowed = array('jpg', 'jpeg', 'png');
		
		//=======================================================>>to avoid overwriting the other file
		$fileNameNew = uniqid('', true).".".$image;

		$target = '../uploadedFile/'.basename($fileNameNew);


		//if (in_array(needle, $allowed)) {
			// check if there is no file error
			if ($fileError === 0) {
				// limit to 1mb only 
				if($fileSize < 1000000){

					// avoid duplication of name
					$stmt1 = "SELECT COUNT(name) FROM tools WHERE name='$name' AND item_type='$item_type' ";
					$x = mysqli_query($con, $stmt1);
					if($x == 0){

						if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
							$sql = "INSERT INTO tools (image, name, item_type, watts, memory, interface, socket, ddr, capacity) 
							VALUES ('$fileNameNew','$name', '$item_type', '$watts', '$memory', '$interface', '$socket', '$ddr','$capacity')";
							mysqli_query($con, $sql);


							echo("<script>alert('Uploaded Successfully!.')</script>");
							echo("<script>window.location = 'Adminpage_tools.php';</script>");
						}
						else{
							echo("<script>alert('Uploading Failed!.')</script>");
							echo("<script>window.location = 'Adminpage_tools.php';</script>");
						}
					}
					else{
						echo("<script>alert('the input name is already existing.')</script>");
						echo("<script>window.location = 'Adminpage_tools.php';</script>");
					}
				}
				else{
					echo("<script>alert('1MB or less are allowed to upload!.')</script>");
					echo("<script>window.location = 'Adminpage_tools.php';</script>");
				}
			}
			else{
				echo("<script>alert('There was an error in your file!.')</script>");
				echo("<script>window.location = 'Adminpage_tools.php';</script>");
			}
	}	