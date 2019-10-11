<?php

include 'dbConnect.php';

$statusMsg = '';

$name = $ingredients = $cookingTime = $preprationTime = '';
$description = $steps = $type = $cuisine = $servings = '';


if (isset($_POST["submit"])) {

    if(!empty($_FILES["file"]["name"]))
    {
        $targetDir = "uploads/";
        $fileName = basename($_FILES['file']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $name =  htmlspecialchars(trim($_POST['name']));
        $ingredients =  htmlspecialchars(trim($_POST['Ingredients']));
        $cookingTime =  htmlspecialchars(trim($_POST['CookingTime']));
        $preprationTime =  htmlspecialchars(trim($_POST['PreparationTime']));
        $description =  htmlspecialchars(trim($_POST['Description']));
        $steps =  htmlspecialchars(trim($_POST['CookingSteps']));
        $type =  htmlspecialchars(trim($_POST['Type']));
        $cuisine =  htmlspecialchars(trim($_POST['Cuisine']));
        $tags = "data";
        $servings = (int) $_POST['Servings'];
    
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            
            
    
            //$image = $_FILES['file']['tmp_name'];
            //$imgContent = addslashes(file_get_contents($image));
    
            // echo $name;
            // echo $ingredients;
            // echo $cookingTime;
            // echo $preprationTime;
            // echo $description;
            // echo $steps;
            // echo $type;
            // echo $cuisine;
            // echo $tags;
    
            $createdDate = date("Y-m-d H:i:s");
    
            $fileNewName = uniqid('', true) . "." . $fileType;

    
            //$res = move_uploaded_file($_FILES['file']['tmp_name'],$targetFilePath);
            $fileDestination = 'uploads/' . $fileNewName;
    
            $sql = 'insert into recipes (RecipeName, Ingredients, Description, Steps, Type, Tags, Cuisine, CreatedDate, CookingTime, PreparationTime, Servings, DishPhoto) VALUES 
                ("' . $name . '","' . $ingredients . '","' . $description . '","' . $steps . '","' . $type . '","'
                . $tags . '","' . $cuisine . '","' . $createdDate . '","' . $cookingTime . '","' . $preprationTime . '",'.$servings.',"' . $fileDestination . '")';
    
 
            $result = mysqli_query($link, $sql);
    
            if ($result) {
                $statusMsg = '<div class="alert alert-success" role="alert" style="width:100%">Recipe added!</div>';
                move_uploaded_file($_FILES['file']['tmp_name'], $fileDestination);

                $name = $ingredients = $cookingTime = $preprationTime = '';
                $description = $steps = $type = $cuisine = $servings = '';

                unset($_POST);

            } else {
                echo 'failed' . mysqli_error($link);
            }
        } else {
            $statusMsg = '<div class="alert alert-danger" role="alert" style="width:100%">Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload!</div>';
        }
    }
    else {
        $statusMsg = '<div class="alert alert-danger" role="alert" style="width:100%">Please select a file</div>';
    }
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

<body class="add-body">

    <div class="container layer4" style="padding-bottom: 100px; padding-top: 80px;">

        <div class="row  justify-content-center">

            <div class="col-8">
                <div class="login-header">
                    <p class="display-4 text-center">
                        Add new recipe
                    </p>
                    <hr class="bg-black1">
                </div>
            </div>

        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-row">
                    <div class="col-md-12 ">
                        <?php echo $statusMsg; ?>
                    </div>
                </div>

            </div>


        </div>



        <form method="post" enctype="multipart/form-data" accept-charset="UTF-8">

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class=" col-md-12 mb-3 justify-content-center">
                            <label for="name">Recipe Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" pattern="^[A-Za-z][A-Za-z0-9!@#$%^&* ]*$" value="<?php echo $name; ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class="col-md-12 mb-3 justify-content-center">
                            <label for="Description">Short Description</label>
                            <textarea class="form-control rounded-0" id="Description" name="Description" placeholder="Description" rows="3" value="<?php echo $description; ?>" required></textarea>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class=" col-md-12 mb-3 justify-content-center">
                            <label for="Ingredients">Ingredients (separate usign comma ( ,) or new line) </label>
                            <!-- <input type="text" class="form-control" id="Ingredients" name="Ingredients" placeholder="Ingredients" pattern="^[A-Za-z][A-Za-z0-9!@#$%^&* ]*$" value="<?php echo $ingredients; ?>" required> -->

                            <textarea class="form-control rounded-0" id="Ingredients" name="Ingredients" pattern="^[A-Za-z][A-Za-z0-9!@#$%^&* ]*$" placeholder="Ingredients" rows="3" value="<?php echo $ingredients; ?>" required></textarea>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class=" col-md-12 mb-3 justify-content-center">
                            <label for="CookingTime">Cooking Time </label>
                            <input type="text" class="form-control" id="CookingTime" name="CookingTime" placeholder="Cooking Time" value="<?php echo $cookingTime; ?>" required>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class=" col-md-12 mb-3 justify-content-center">
                            <label for="PreparationTime">Preperation Time</label>
                            <input type="text" class="form-control" id="PreparationTime" name="PreparationTime" placeholder="Preparation Time" value="<?php echo $preprationTime; ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class=" col-md-12 mb-3 justify-content-center">
                            <label for="Servings">Max Servings</label>
                            <input type="text" class="form-control" id="Servings" name="Servings" placeholder="Max Servings" pattern="[0-9]+" value="<?php echo $servings; ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class="col-md-12 mb-3 justify-content-center">
                            <label for="CookingSteps">Cooking Steps</label>
                            <textarea class="form-control rounded-0" id="CookingSteps" name="CookingSteps" pattern="^[A-Za-z][A-Za-z0-9!@#$%^&* ]*$" placeholder="CookingSteps" rows="3" value="<?php echo $steps; ?>" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="Type">Recipe Type</label>
                            <select class="form-control" id="Type" name="Type" required>
                                <option selected disabled>Select Type</option>
                                <option <?php if(strcmp($type,"Breakfast and Brunch")==0) echo 'selected'; ?> value="Breakfast and Brunch">Breakfast and Brunch</option>
                                <option <?php if(strcmp($type,"Dessert")==0) echo 'selected'; ?> value="Dessert">Dessert</option>
                                <option <?php if(strcmp($type,"Chef's Special")==0) echo 'selected'; ?> value="Chef's Special">Chef's Special</option>
                                <option <?php if(strcmp($type,"Lunch")==0) echo 'selected'; ?> value="Lunch">Lunch</option>
                                <option <?php if(strcmp($type,"Dinner")==0) echo 'selected'; ?> value="Dinner">Dinner</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class=" col-md-12 mb-3 justify-content-center">
                            <label for="Cuisine">Cuisine</label>
                            <input type="text" class="form-control" id="Cuisine" name="Cuisine" placeholder="Cuisine" pattern="^[A-Za-z][A-Za-z0-9!@#$%^&* ]*$" value="<?php echo $cuisine; ?>" required>
                        </div>
                    </div>
                </div>
            </div>
   
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-row">
                        <div class="col-md-12 mb-3 ">
                            <label>Select Dish Image:</label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="file">Choose file</label>
                                <input type="file" class="custom-file-input" id="file" name="file" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top : 30px;">
                <div class="col-6">
                    <button class="btn btn-primary" style="width: 100%; font-size:20px;" type="submit" name="submit">Add
                        Recipe</button>
                </div>
            </div>
        </form>

    </div>


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

            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        });
    </script>


</body>

</html>