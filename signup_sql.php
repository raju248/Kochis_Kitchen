<?php
        
include 'dbConnect.php';

$name = $phoneNo = $password = $gender = '';
$phoneNoErr = '';
$phoneNoExist = false;
$signUpSuccess = '';

if (!empty($_POST)) {
    if (!empty(trim($_POST['name']))) {
        $name = htmlspecialchars($_POST['name']);
    }

    if (!empty(trim($_POST['phoneNo']))) {
        $phoneNo = htmlspecialchars($_POST['phoneNo']);
    }

    if (!empty(trim($_POST['password']))) {
        $password = htmlspecialchars($_POST['password']);
    }

    $gender = $_POST['gender'];

    //print_r($_POST);

    $sql = 'select * from users where PhoneNo = ' . $phoneNo;

    $result = mysqli_query($link, $sql);

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $phoneNoErr = "Phone no already exists.";
        $phoneNoExist = true;
        mysqli_close($link);
        //echo $phoneNoErr;
    } else {
        $sql = 'insert into users (Name, PhoneNo, Password, Gender) values ("' . $name . '","' . $phoneNo . '","' . md5($password) . '","' . $gender . '")';

        $resultInsert = mysqli_query($link, $sql);

        

        if ($resultInsert) {
            $signUpSuccess = '<div class="alert alert-success" role="alert" style="width:100%">Sign up successful!</div>';
            $name = $phoneNo = $password = $gender = '';
            header( "refresh:5;url=login.php" );


        } else {
            $signUpSuccess = '<div class="alert alert-danger" role="alert">Sign up failed! Try again</div>';
           // $signUpSuccess = 'error';
        }

        mysqli_close($link);
    }
}

?>