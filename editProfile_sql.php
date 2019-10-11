<?php
        
session_start();

include 'dbConnect.php';


        $name =$_SESSION['Name'];
        $phoneNo = $_SESSION['PhoneNo'];
        $gender = $_SESSION['Gender'];

        $phoneNoErr = '';
        $phoneNoExist = false;
        $signUpSuccess = '';

        $nameNew = $phoneNoNew = $genderNew = '';

if (!empty($_POST)) {
    if (!empty(trim($_POST['name']))) {
        $nameNew = htmlspecialchars(trim($_POST['name']));
    }

    if (!empty(trim($_POST['phoneNo']))) {
        $phoneNoNew = htmlspecialchars(trim($_POST['phoneNo']));
    }

    $genderNew = $_POST['gender'];

    //print_r($_POST);

    $sql = 'select * from users where PhoneNo = ' . $phoneNoNew;

    $result = mysqli_query($link, $sql);

    $row = mysqli_num_rows($result);

    if(strcmp($phoneNo,$phoneNoNew)==0)
    {
        $sql = 'update users set Name = "'.$nameNew.'", PhoneNo = "'.$phoneNoNew.'", Gender = "'.$genderNew.'" where PhoneNo= "'.$phoneNo.'"';

        $resultInsert = mysqli_query($link, $sql);

        if ($resultInsert) {
            $signUpSuccess = '<div class="alert alert-success" role="alert" style="width:100%">Changes saved successfully!</div>';
            //$name = $phoneNo = $gender = '';
          //  header( "refresh:5;url=login.php" );
          $_SESSION['Name'] = $nameNew;
          $_SESSION['PhoneNo']= $phoneNoNew;
                        $_SESSION['Gender']= $genderNew;

        $name =$_SESSION['Name'];
         $phoneNo = $_SESSION['PhoneNo'];
        $gender = $_SESSION['Gender'];
        } else {
            $signUpSuccess = '<div class="alert alert-danger" role="alert">Unable to save changes! Try again</div>'.mysqli_error($link)."<br>".$sql;
           // $signUpSuccess = 'error';
        }

        mysqli_close($link);
    }
    else
    {
        if ($row > 0) {
            $phoneNoErr = "Phone no already exists.";
            $phoneNoExist = true;
            mysqli_close($link);
            //echo $phoneNoErr;
        } else {
            $sql = 'update users set Name = "'.$nameNew.'", PhoneNo = "'.$phoneNoNew.'", Gender = "'.$genderNew.'" where PhoneNo= "'.$phoneNo.'"';
    
            $resultInsert = mysqli_query($link, $sql);
    
            $_SESSION['Name'] = $nameNew;
            $_SESSION['PhoneNo']= $phoneNoNew;
            $_SESSION['Gender']= $genderNew;

            $name =$_SESSION['Name'];
            $phoneNo = $_SESSION['PhoneNo'];
            $gender = $_SESSION['Gender'];
    
            if ($resultInsert) {
                $signUpSuccess = '<div class="alert alert-success" role="alert" style="width:100%">Changes saved successfully!</div>';
                //$name = $phoneNo = $gender = '';
                header( "refresh:5;url=login.php" );
    
    
            } else {
                $signUpSuccess = '<div class="alert alert-danger" role="alert">Unable to save changes! Try again</div>';
               // $signUpSuccess = 'error';
            }
    
            mysqli_close($link);
        }
    }


}
