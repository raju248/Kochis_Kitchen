<?php


include 'dbConnect.php';

$name = $phoneNo = $message = '';
$nameErr = $phoneNoErr = $messageErr = '';
$success ='';

if (!empty($_POST)) {
    if (!empty(trim($_POST['name']))) {
        $name = htmlspecialchars($_POST['name']);
    }

    if (!empty(trim($_POST['phoneNo']))) {
        $phoneNo = htmlspecialchars($_POST['phoneNo']);
    }

    if (!empty(trim($_POST['message']))) {
        $message = htmlspecialchars($_POST['message']);
    }

    $Time = date("Y-m-d H:i:s");

    $sql  = 'insert into contactus (Name, PhoneNo, Message, Time) values ("'.$name.'","'.$phoneNo.'","'.$message.'","'.$Time.'")';

    $resultInsert = mysqli_query($link, $sql);

    if ($resultInsert) {
        $success = '<div class="alert alert-success" role="alert" style="width:100%">Thank You! We will get back to you soon.</div>';
        unset($_POST);
        $name = $phoneNo = $message = '';
    } else {
        $success = '<div class="alert alert-danger" role="alert">Unable to submit. Please try again. </div>';
      
    }
}

?>