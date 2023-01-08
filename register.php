<?php
    include 'db.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");

    if(mysqli_num_rows($sql) == 0){
        $query = mysqli_query($con, "INSERT INTO user VALUES('','$first_name','$last_name','$email','$password')");

        if($query){
            echo json_encode("Success");
        }else{
            echo json_encode("Error");
        }
    }else{
        echo json_encode("duplicateEmail");
    }
    
    

    
?>