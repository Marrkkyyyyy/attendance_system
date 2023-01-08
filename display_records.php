<?php
    include 'db.php';
    
    $classID = $_POST['classID'];

    $query = mysqli_query($con, "SELECT student.*, COUNT(attendance.studentID) as attendance, (SELECT COUNT(DISTINCT date) FROM attendance WHERE classID = '$classID') as total_attendance FROM student LEFT JOIN attendance ON student.studentID = attendance.studentID WHERE student.classID = '$classID' GROUP BY student.studentID ORDER BY student.student_name");
    
    $list = array();
    if($query){
        while($row = mysqli_fetch_assoc($query)){
           
            $list[] = $row;
            
        }
        echo json_encode($list);
    }
    header('Content-type: application/json');
?>