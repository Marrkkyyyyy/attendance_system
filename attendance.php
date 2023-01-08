<?php
    include 'db.php';

    $list = json_decode(htmlspecialchars_decode($_POST['list']));
    $date = $_POST['date'];
    $classID = $_POST['classID'];

    echo json_encode($list);
    $array = json_encode($list, true); 
    $sql = mysqli_query($con, "SELECT * FROM attendance WHERE date = '$date' AND classID = '$classID'");

    if(mysqli_num_rows($sql) == 0){
        foreach ($list as $user) {
            $query = 
            "INSERT INTO attendance VALUES 
            ('','".$user->classID."', '".$user->studentID."', 
            '".$user->date."')"; 
    
            if(mysqli_multi_query($con, $query)){
                echo ("Success");
            }else{
                echo ("Errorrr");
            }
        }
    }else{
        echo ("Existed");
    }
    

    


  

?>