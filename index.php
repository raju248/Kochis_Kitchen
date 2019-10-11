<?php
session_start();

include 'dbConnect.php';


$sql = "select * from recipes where Type <> \"Chef's Special\" order by CreatedDate desc ";

$resultSet = mysqli_query($link, $sql);

$rowNum = mysqli_num_rows($resultSet);

mysqli_close($link);

?>


<!DOCTYPE html>
<html lang="en" class="device-mobile-optimized device-android device-phone device-webkit device-chrome">

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
  <link rel="stylesheet" media="all" rel="stylesheet" type="text/css" href="css/animate.css" />

  <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">


</head>

<body class="home-body">

  <?php

  include 'header.php';

  ?>

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('images/ok1.jpg')">
          <div class="carousel-caption">
            <p class="">Welcome to Kochi's Kitchen</p>

          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('images/ok2.jpg')">
          <div class="carousel-caption ">
            <p class="">Welcome to Kochi's Kitchen</p>

          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('images/ok7.jpg')">
          <div class="carousel-caption">
            <p class="">Welcome to Kochi's Kitchen</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>


  <!-- Page Content -->

  <section class="recipe-section layer">

    <div class="container">
      <div class="row mb-1 ">
        <div class="col-md-6">
          <h2 class="display-4 recipe-section-title">Latest Recipes</h2>
        </div>


      </div>

      <div class="row text-center justify-content-center justify-content-sm-between justify-content-md-between  justify-content-lg-start">

        <?php
        for ($i = 0; $i < 6; $i++) {
          $row = mysqli_fetch_assoc($resultSet);

          // print_r($row);

          ?>

          <?php
            if (!empty($row))
              include 'card_temp.php';
            ?>

        <?php
        }
        ?>

      </div>

      <div class="row justify-content-center justify-content-sm-center justify-content-md-center ">
      <div class="col-6 col-md-6 col-lg-6  ">
          <a href= "view_all_recipes.php" type="button" class="btn btn-login " style="width: 100%;font-size : 20px;">View all recipes</a>
        </div>
      </div>
    </div>

  </section>

  <section>
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
  </script>


</body>

</html>