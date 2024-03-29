<?php



    include 'editProfile_sql.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Sign Up - Kochi's Kitchen</title>

    <script src="https://kit.fontawesome.com/1c17e31fd4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" media="all" rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">



</head>

<body class="login-body">



    <section class="header">
        <?php
        include 'header.php';
        ?>
    </section>


    <section class="login-content layer2">

        <div class="container layer2" style="padding-bottom: 100px; padding-top: 80px;">
            <div class="row  justify-content-center">

                <div class="col-8">
                    <div class="login-header">
                        <p class="display-4 text-center">
                            Edit Profile
                        </p>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class="col-md-12 ">
                            <?php echo $signUpSuccess;?>
                        </div>
                    </div>

                </div>


            </div>


            <form method="post">
                <div class="row  justify-content-center" style="">
                    <div class="col-6">
                        <div class="form-row">
                            <div class=" col-md-12 mb-3 justify-content-center">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" pattern="^[A-Za-z][A-Za-z0-9!@#$%^&* ]*$" value="<?php echo htmlspecialchars($name) ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="phoneNo">Phone No.</label>
                                <input type="tel" class="form-control " id="phoneNo" pattern="^\d{11}" name="phoneNo" placeholder="Phone No" required title="Phone no must be 11 digits long" value="<?php echo htmlspecialchars($phoneNo) ?>">
                                <div class="validation-error">
                                    <?php echo "<p>".$phoneNoErr."</p>"; ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option selected disabled>Select Gender</option>
                                    <option <?php if (strcmp($gender, 'Male') == 0) echo 'selected'; ?> value="Male">Male</option>
                                    <option <?php if (strcmp($gender, 'Female') == 0) echo 'selected'; ?> value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" style="margin-top : 30px;">
                    <div class="col-6">
                        <button class="btn btn-login" style="width: 100%; font-size:20px;" type="submit">Save changes</button>
                    </div>
                </div>


            </form>

        </div>

        </div>


    </section>







    <section class="footer">
        <?php
        include 'footer.php';
        ?>
    </section>


    <!-- /.container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>



    <script>
        $(document).ready(function() {
            // executes when HTML-Document is loaded and DOM is ready
            console.log("document is ready");


            $(".card").hover(
                function() {
                    $(this).addClass('shadow-lg1').css('cursor', 'pointer');
                },
                function() {
                    $(this).removeClass('shadow-lg1');
                }
            );

            // document ready  
        });

        var data = <?php echo json_encode($phoneNoExist, JSON_HEX_TAG); ?>

        if(data==true)
        {
            document.getElementById("phoneNo").focus();
        }
 

    </script>


</body>

</html>