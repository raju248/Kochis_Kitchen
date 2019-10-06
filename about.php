<?php
    session_start();

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
    <title>Bootstrap</title>

    <script src="https://kit.fontawesome.com/1c17e31fd4.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="css/style.css" />


    <link rel="stylesheet" media="all" rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />


    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">


</head>


<body class="about-body">

    <section class="header">
        <?php
        include 'header.php';
        ?>
    </section>


    <section class="about-content layer">
        <div class="container">
            <!-- <h2 class="display-4 recipe-section-title text-center">About Us</h2> -->
<h2 class="display-4 about-section-title text-center px-5">Meet the team</h2>
            <div class="about-us-intro">

                <p class="display-4 text-center">
                    Our goal is to provide tasty food recipes for free.
                </p>

            </div>


            

            <div class="row justify-content-center">

                <div class="col-6 text-center">

                    <div class="about-us-card">
                        <img src="images/1r.jpg" class="about-us-member-image">

                        <div class="about-us-member-info pt-2 pb-1 px-4">
                            <p class="m-0">Md Shah Faisal Raju</p>
                        </div>

                        <div class="member-social pb-2 px-4">
                            <a href="#"><i class="fab fa-facebook-f fa-2x mr-3 footer-social-info"></i></a>
                            <a href="#"><i class="fab fa-pinterest fa-2x mr-3 footer-social-info"></i></a>
                            <a href="#"><i class="fab fa-twitter fa-2x mr-3 footer-social-info"></i></a>
                            <a href="#"><i class="fab fa-linkedin fa-2x mr-3 footer-social-info"></i></a>

                        </div>

                    </div>


                </div>

                <div class="col-6 text-center">

                    <div class="about-us-card">
                        <img src="images/1m.jpg" class="about-us-member-image">

                        <div class="about-us-member-info pt-2 pb-1 px-4">
                            <p class="m-0">Mahmudul Hasan Mahi</p>
                        </div>

                        <div class="member-social pb-2 px-4">
                            <a href="#"><i class="fab fa-facebook-f fa-2x mr-3 footer-social-info"></i></a>
                            <a href="#"><i class="fab fa-pinterest fa-2x mr-3 footer-social-info"></i></a>
                            <a href="#"><i class="fab fa-twitter fa-2x mr-3 footer-social-info"></i></a>
                            <a href="#"><i class="fab fa-linkedin fa-2x mr-3 footer-social-info"></i></a>

                        </div>

                    </div>


                </div>

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
                    $(this).addClass('shadow-lg').css('cursor', 'pointer');
                },
                function() {
                    $(this).removeClass('shadow-lg');
                }
            );




            // document ready  
        });
    </script>


</body>

</html>