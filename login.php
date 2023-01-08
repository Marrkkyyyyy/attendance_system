<?php
    include 'db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $login['message'] = "";
    $query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");

    if(mysqli_num_rows($query) > 0){
        $pass = mysqli_fetch_assoc($query);
        if($password == $pass['password']){
            $login['message'] = "Success";

            $login['userID'] = $pass['userID'];
            $login['first_name'] = $pass['first_name'];
            $login['last_name'] = $pass['last_name'];
            $login['email'] = $pass['email'];
            $login['password'] = $pass['password'];
        }else{
            $login['message'] = "IncorrectPassword";
        }
    }else{
        $login['message'] = "NotRegistered";
    }


    header('Content-Type: application/json');
    echo json_encode($login);
?>