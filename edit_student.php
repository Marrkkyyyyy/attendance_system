<?php
    include 'db.php';
    
    $studentID = $_POST['studentID'];
    $student_name = $_POST['student_name'];
    $school_id = $_POST['school_id'];
    
    $query = mysqli_query($con, "UPDATE student SET student_name = '$student_name', school_id = '$school_id' WHERE studentID = '$studentID'");
    
    if($query){
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }

    

   
?>