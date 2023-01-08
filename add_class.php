<?php
    include 'db.php';

    $userID = $_POST['userID'];
    $class_name = $_POST['class_name'];
    
    $query = mysqli_query($con, "INSERT INTO class VALUES('','$userID','$class_name')");

    if($query){
        echo json_encode("Success");
    }else{
        echo json_encode("Error");
    }

    
?>