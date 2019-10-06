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
	
	
	   <!-- Bootstrap CSS -->
     <!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
	   
      <link rel="stylesheet" href="css/style.css"/>
      <!-- <link rel="stylesheet" media="all" rel="stylesheet" type="text/css" href="/style.css"/> -->
  
      <link rel="stylesheet" media="all" rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   

</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"> 
        
        <div class="logo">

            <span><i class="fa fa-cutlery fa-2x"></i></span> <p>Kochi's Kitchen</p>

        </div>
      
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="#">Home
                  <!-- <span class="sr-only">(current)</span> -->
                </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Recipes</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
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
 
  <section class="recipe-section">

          <div class="container">
              <h2>Recipes</h2>
            <div class="row">
              <div class="col-sm">
                One of three columns
              </div>
              <div class="col-sm">
                One of three columns
              </div>
              <div class="col-sm">
                One of three columns
              </div>
            </div>
          </div>
          
  </section>




<!-- /.container -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>

</html>