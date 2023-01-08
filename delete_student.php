<?php
    include 'db.php';

    $studentID = $_POST['studentID'];
    $query = mysqli_query($con, "DELETE FROM student WHERE studentID = '$studentID'");
    
    if($query){
       
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }
?>