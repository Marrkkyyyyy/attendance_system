<?php
    include 'db.php';

    $classID = $_POST['classID'];
    $query = mysqli_query($con, "DELETE FROM class WHERE classID = '$classID'");
    
    if($query){
        mysqli_query($con, "DELETE FROM student WHERE classID = '$classID'");
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }
?>