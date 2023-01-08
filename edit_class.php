<?php
    include 'db.php';
    
    $classID = $_POST['classID'];
    $class_name = $_POST['class_name'];
    
    $query = mysqli_query($con, "UPDATE class SET class_name = '$class_name' WHERE classID = '$classID'");
    
    if($query){
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }

    

   
?>