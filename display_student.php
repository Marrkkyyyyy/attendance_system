<?php
    include 'db.php';
    
    $classID = $_POST['classID'];

    $query = mysqli_query($con, "SELECT * FROM student WHERE classID = '$classID' ORDER BY student_name");
    
    $list = array();
    if($query){
        while($row = mysqli_fetch_assoc($query)){
           
            $list[] = $row;
            
        }
        echo json_encode($list);
    }
    header('Content-type: application/json');
?>