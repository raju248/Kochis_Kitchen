<?php
    
    include 'dbConnect.php';


    
    
    $phoneNo = $password = '';
    
    $phoneNoErr = '';
    $loginErr = '';
    $passwordEnc ='';
    $messageToUser = 'Log in';
    
    
    if(isset($_GET['status']))
    {
        $messageToUser = "Log in to see chef's exclusive recipes";
        unset($_GET['status']);
    }
    
    if ($_POST) {
        if (!empty(trim($_POST['phoneNo']))) {
    
    
            if (!preg_match('/^\+?\d+$/', $_POST['phoneNo'])) {
                $phoneNoErr = "Invalid Phone No";
            } else {
                $phoneNo = htmlspecialchars(trim($_POST['phoneNo']));
            }
        }
    
        if (!empty(trim($_POST['password']))) {
            $password = htmlspecialchars($_POST['password']);
        }
    
        $sql = 'select * from users where PhoneNo =' . $phoneNo;
    
        $result = mysqli_query($link, $sql);
    
    
        $rowNum = mysqli_num_rows($result);
    
        if ($rowNum > 0) 
        {
            $passwordEnc = md5($password);
    
            if($row = mysqli_fetch_assoc($result))
            {
                    session_start();
                    $passwordDB = $row['Password'];
                    $nameDB = $row['Name'];
                    $phoneNoDB = $row['PhoneNo'];
                    $genderDB = $row['Gender'];
    
                    if(strcmp($passwordDB,$passwordEnc)==0)
                    {
                        $_SESSION['Name'] = $nameDB;
                        $_SESSION['PhoneNo']= $phoneNoDB;
                        $_SESSION['Gender']= $genderDB;
                        
                        header("Location: index.php");
                    }
                    else
                    {
                        $loginErr = "Incorrect Phone no or Password!";
                    }
    
                    mysqli_close($link);
            }
        }
        else
        {
            $loginErr = "Incorrect Phone no or Password!";
        }
    }


?>