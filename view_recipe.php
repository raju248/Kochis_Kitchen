<?php

session_start();

include 'dbConnect.php';

$result = '';

if (isset($_GET['id'])) {
    $sql = "select * from recipes where id = " . $_GET['id'];

    $result = mysqli_query($link, $sql);
}

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

<body class="recipe-body">

    <section>
        <?php include 'header.php'; ?>
    </section>


    <section class="full-recipe-details">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-7 col-sm-12 ">

                    <?php
                    $row = mysqli_fetch_assoc($result); {
                        ?>

                        <div class="block-layer mb-3">
                            <div class="recipe-media ">
                                <img src="<?php echo $row["DishPhoto"]; ?>" alt="" class="recipe-img-top" style="width: 100%">
                            </div>

                            <div class="recipe-details p-4">

                                <div class="recipe-title mb-4">
                                    <h2 class="Display-3"> <?php echo $row["RecipeName"]; ?> </h2>
                                </div>

                                <hr class="bg-light">

                                <div class="repice-ingredients">
                                    <p class="ingredient-title"> <span> <i class="fas fa-shopping-cart"></i></span> Ingredients : </p>
                                    <p>


                                        <ul>
                                            <?php
                                                //  echo str_replace(".", ".<br>",$row["Steps"]);
                                                $stringArray2 = str_replace(",\n", "<br>", $row["Ingredients"]);
                                                $stringArray1 = explode("\n", $stringArray2);
                                                $finalString1 = array_filter($stringArray1);
                                                //print_r($stringArray);

                                                foreach ($finalString1 as $key => $value) {


                                                    ?>

                                                <li>
                                                    <?php if (!empty($value)) echo $value; ?>
                                                </li>

                                            <?php
                                                }
                                                ?>
                                        </ul>


                                    </p>
                                </div>

                                <div class="recipe-steps">
                                    <p class="steps-title"> <span><i class="fas fa-list-ul"></i></span> Steps :</p>
                                    <p>
                                        <ul>
                                            <?php
                                                //  echo str_replace(".", ".<br>",$row["Steps"]);
                                                $stringArray3 = str_replace(".", ".<br>", $row["Steps"]);
                                                $stringArray = explode("<br>", $stringArray3);
                                                $finalString = array_filter($stringArray);
                                                //print_r($stringArray);

                                                foreach ($finalString as $key => $value) {


                                                    ?>

                                                <li>
                                                    <?php if (!empty($value)) echo $value; ?>
                                                </li>

                                            <?php
                                                }
                                                ?>
                                        </ul>
                                    </p>
                                </div>


                            </div>


                        </div>



                </div>

                <!-- SELECT * FROM (select * from recipes where id <> 3) e order by rand() limit 2 -->

                <div class="col-lg-4 col-md-5 col-sm-12">
                    <div class="block-layer p-3 mb-4">
                        <ul class="list-unstyled">

                            <li class="mb-5  border-secondary">
                                <div> <span><i class="fas fa-user-shield"></i></span> Recipe By :

                                    <span class="float-right"> Admin </span></div>
                            </li>

                            <li class="mb-2 border-bottom border-secondary">
                                <div><span><i class="fas fa-clock"></i></span> Preparation Time :
                                    <span class="float-right"> <?php echo $row["PreparationTime"]; ?> </span></div>
                            </li>

                            <li class="mb-2 border-bottom border-secondary">
                                <div> <span><i class="fas fa-clock"></i></span> Cooking Time :

                                    <span class="float-right"> <?php echo $row["CookingTime"]; ?> </span></div>
                            </li>

                            <li class="mb-2 border-bottom border-secondary">
                                <div><span><i class="fas fa-users"></i></span> Max Serivgs :

                                    <span class="float-right"> <?php echo $row["Servings"]; ?> </span></div>
                            </li>

                            <li class="mb-2 border-bottom border-secondary">
                                <div> <span><i class="fas fa-cookie-bite"></i></span> Cuisine :

                                    <span class="float-right"> <?php echo $row["Cuisine"]; ?> </span></div>
                            </li>

                            <li class="mb-2 border-bottom border-secondary">
                                <div><span><i class="fas fa-sort-alpha-down"></i></span> Category :

                                    <span class="float-right"> <?php echo $row["Type"]; ?> </span></div>
                            </li>

                            <li class="mb-2 border-bottom border-secondary">
                                <div><span><i class="fas fa-folder-plus"></i></span> Created :

                                    <?php
                                        $parent = $row['CreatedDate'];

                                        $timestamp = strtotime($parent);

                                        $date = date('d-F-Y', $timestamp);
                                        $time = date('H:i a', $timestamp);



                                        //echo $diff->days;

                                        ?>

                                    <span class="float-right"> <?php echo $date; ?> </span></div>
                            </li>

                        </ul>
                    </div>

                <?php
                }
                ?>

                <div class="block-layer p-3">
                    <div class="check-wrapper ">
                        <div class="check-new">
                            <h4>Also check</h4>
                        </div>
                    </div>

                    <?php
                    $sql = "select * from (select * from recipes where ID <> " . $_GET['id'] . " and Type <> \"Chef's Special\") e order by rand() limit 2";

                    $result = mysqli_query($link, $sql); ?>

                    <ul class="list-unstyled">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                            <li class="border-bottom border-light mb-2">
                                <!-- <div class="new-suggestion">
                                    <div class="suggestion-image mb-1">
                                        <img src="<?php echo $row['DishPhoto']; ?>" alt="" style="width:100%;">
                                    </div>
                                    <div class="suggestion-title text-center">
                                        <a href="view_recipe.php?id=<?php echo $row['ID']; ?>" class="btn-primary">
                                            <?php echo $row['RecipeName']; ?>
                                        </a>
                                    </div>
                                </div> -->
                                <div class="card" style="width: 100%;">
                                    <div class="recipe-media">
                                    <img class="recipe-img-top" src="<?php echo $row['DishPhoto']; ?>" style="width:100%;" alt="Card image cap">
                                    </div>
                                    <div class="mini-card-body p-1 text-center">
                                        <a href="view_recipe.php?id=<?php echo $row['ID']; ?>" class="">

                                            <p class="card-text mini-card-title"><?php echo $row['RecipeName']; ?>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </li>

                        <?php
                        }
                        ?>
                    </ul>
                </div>
                </div>

            </div>

        </div>

    </section>




    <section>
        <?php include 'footer.php'; ?>
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


            // document ready  
        });
    </script>


</body>