<?php
    include 'db.php';

    $classID = $_POST['classID'];
    $student_name = $_POST['student_name'];
    $school_id = $_POST['school_id'];
    
    $sql = mysqli_query($con, "SELECT * FROM student WHERE school_id = '$school_id' AND classID = '$classID'");

    if(mysqli_num_rows($sql) == 0){
        $query = mysqli_query($con, "INSERT INTO student VALUES('','$classID','$student_name','$school_id')");

        if($query){
            echo json_encode("Success");
        }else{
            echo json_encode("Error");
        }
    }else{
        echo json_encode("duplicateID");
    }

 

    
?>