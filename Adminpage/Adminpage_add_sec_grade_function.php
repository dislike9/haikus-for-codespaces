<?php 
    include("../config/connection.php");
    
    //create a grade level
    if(isset($_POST['create_grade'])){
        $add_grade= $_POST["add_grade"];

        $stmt = $con->prepare("SELECT grade FROM add_grade WHERE grade = ? Limit 1");
        $stmt->bind_param("s", $add_grade);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0){
        $sql = "INSERT INTO add_grade (grade) values ('$add_grade')";
        mysqli_query($con, $sql);

        header("location: Adminpage_add_sec_grade.php?create=create-grade");
        }
        else{
            header("location: Adminpage_add_sec_grade.php?create=duplicate");
        }
    }
    
    // delete grade level
    if(isset($_GET['grade-delete'])){
        $id= $_GET['grade-delete'];

        $con->query("DELETE FROM add_grade WHERE id=$id") or die($con->error());

        header("location: Adminpage_add_sec_grade.php?create=delete-grade");
    }
    




    // create a section
    if(isset($_POST['create_section'])){
        $section_name = $_POST["section_name"];

        $stmt = $con->prepare("SELECT section FROM sec WHERE section = ? Limit 1");
        $stmt->bind_param("s", $section_name);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if($rnum == 0){
        $sql = "INSERT INTO sec (section) values ('$section_name')";
        mysqli_query($con, $sql);

        header("location: Adminpage_add_sec_grade.php?create=create-sec");
        }
        else{
            header("location: Adminpage_add_sec_grade.php?create=duplicate");
        }
    }
   
    // delete section
    if(isset($_GET['sec-delete'])){
        $id= $_GET['sec-delete'];

        $con->query("DELETE FROM sec WHERE id=$id") or die($con->error());

        header("location: Adminpage_add_sec_grade.php?create=delete-sec");
    }
    
?>