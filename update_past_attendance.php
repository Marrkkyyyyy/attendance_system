<?php
    include 'db.php';

    $list = json_decode(htmlspecialchars_decode($_POST['list']));


    echo json_encode($list);
    $array = json_encode($list, true); 
  

    $listID = array();
    foreach ($list as $user) {
        $classID = $user->classID;
        $studentID = $user->studentID;
        $date = $user->date;
        $listID[] = $studentID;
        $query = 
        "INSERT INTO attendance(classID,studentID,date) SELECT '$classID', '$studentID', '$date' WHERE NOT EXISTS(SELECT studentID FROM attendance WHERE studentID = '$studentID') LIMIT 1"; 
      
        if(mysqli_multi_query($con, $query)){
            
            echo ("Success");
        }else{
            echo ("Errorrr");
        }
    }
    mysqli_query($con, "DELETE FROM attendance WHERE studentID NOT IN( '" . implode( "', '" , $listID ) . "' )");
    

        // "INSERT INTO attendance(classID,studentID,date) SELECT '".$user->classID."', '".$user->studentID."', 
    // '".$user->date."' WHERE NOT EXISTS(SELECT studentID FROM attendance WHERE studentID = '".$user->studentID."' LIMIT 1"

    // INSERT INTO attendance(classID,studentID,date) SELECT '8','16','2022-01-03' WHERE NOT EXISTS(SELECT studentID FROM attendance WHERE studentID = '16') 


  

?>