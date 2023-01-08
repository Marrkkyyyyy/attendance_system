<?php
    include 'db.php';
    
    $date = $_POST['date'];
    $classID =$_POST['classID'];
    $query = mysqli_query($con, "SELECT student.*, attendance.attendanceID,attendance.date, IF(ISNULL(attendance.attendanceID), 'false', 'true') as attendance FROM student LEFT JOIN attendance ON student.studentID = attendance.studentID AND attendance.date = '$date' WHERE student.classID = '$classID' ORDER BY student.student_name");
    
    $list = array();
    if($query){
        while($row = mysqli_fetch_assoc($query)){
           
            $list[] = $row;
            
        }
        echo json_encode($list);
    }
    header('Content-type: application/json');
?>