<?php
    include 'db.php';
    
    $userID = $_POST['userID'];

    $query = mysqli_query($con, "SELECT class.*, COUNT(student.classID) as total_student FROM class LEFT JOIN student ON class.classID = student.classID WHERE class.userID = '$userID'  GROUP BY class.classID ORDER BY class_name");
    
    $list = array();
    if($query){
        while($row = mysqli_fetch_assoc($query)){
           
            $list[] = $row;
            
        }
        echo json_encode($list);
    }
    header('Content-type: application/json');
?>