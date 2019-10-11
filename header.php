<nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">

      <div class="logo">

        
        <span><i class="fa fa-cutlery fa-2x"></i></span>
        <a href="index.php"><h2 style="color:white" class="brand-name">Kochi's Kitchen</h2></a>

      </div>

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">Recipes</a>
          </li>
          -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" >
            Recipes
          </a>
          <div class="dropdown-menu " >
          <a class="dropdown-item" href="lunch.php">Lunch</a>
            <a class="dropdown-item" href="break_and_brunch.php">Breakfast and Brunch</a>
            <a class="dropdown-item" href="view_dessert.php">Dessert</a>
            <a class="dropdown-item" href="dinner.php">Dinner</a>
            <a class="dropdown-item" href="chef_special.php">Chef's Special</a>
          </div>
        </li>

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Recipes
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="break_and_brunch.php">Breakfast and Brunch</a>
            <a class="dropdown-item" href="view_dessert.php">Dessert</a>
            <a class="dropdown-item" href="chef_special.php">Chef's Special</a>
          </div>
        </li> -->


        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Contact Us</a>
        </li>
        
          <?php

              if(isset($_SESSION['Name']))
              {
                  echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">'.$_SESSION['Name'].'</a>';
                          echo '<div class="dropdown-menu">';
                          echo '<a class="dropdown-item" href="editProfile.php">Edit Profile</a>';
                          echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                          echo '</div>';
                  echo '</li>';
              }
              else
              {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link" href="login.php">Login <i class="fas fa-sign-in-alt"></i></a>';
                  echo '</li>';
              }

          ?>

          <!-- <a class="nav-link" href="login.php">Login <i class="fas fa-sign-in-alt"></i></a> -->
       
      </ul>
    </div>
  </div>
</nav>