<?php

require_once '../../models/meals.php';
require_once '../../control/MealsController.php';
require_once '../admin/parent.php';
$errMessage="";


$ses=new SES;
$ses->SES();

if(isset($_POST['name']) && isset($_POST['restaurant']) &&  isset($_POST['price']) && isset($_FILES["image"]) )
{

    if(!empty($_POST['name']) && !empty($_POST['restaurant']) && !empty($_POST['price']))
    {
        $meal=new Meals;
        $meal->setMeal_Name($_POST['name']);
        $meal->setMeal_Restaurant($_POST['restaurant']);
        $meal->setMeal_Price($_POST['price']);
        $mealsController= new MealsController;

        $location="../image/".date("h-i-s").$_FILES["image"]["name"];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$location))
        {
            $meal->setMeal_Image($location);
             if($mealsController->addMeal($meal))
             {
                 header("location: index.php");
             }
             else
             {
                 $errMessage="Something Went Wrong... Try Again!";
             }


        }
        else
        {
            $errMessage="Error in Upload";
        }
    }
    else
    {
        $errMessage="All Fields are Required! ";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Meal</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Brands.css">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Free.css">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/CDRapido-Listado-Socios.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/css/baguetteBox.min.css">
</head>

<body>
    <?php $ses->header()?>

    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">ADD Meal</h2>
                    <p></p>
                </div>
                <?php
                    if($errMessage!="")
                    {
                        ?>
                            <div class="alert alert-danger" role="alert" >
                            <?php  echo $errMessage ?>
                            </div>
                        <?php
                    }


                ?>
                <form action="addmeal.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3"><label class="form-label" for="name">Meal_Name</label><input class="form-control" type="text" id="name" name="name" ></div>
                    <div class="mb-3"><label class="form-label" for="name">Meal_Restaurant</label><input class="form-control" type="text" id="restaurant" name="restaurant" ></div>
                    <div class="mb-3"><label class="form-label" for="price">Meal_Price</label><input class="form-control" type="text" id="price" name="price" ></div>
                    <div class="mb-3"><label class="form-label" for="basic-icon-default-message">Image</label><input class="form-control" type="file" id="image" name="image" style="color:blue"></div>
                    <div class="mb-3"><button class="btn btn-primary"  type="submit">Save</button> <a href="index.php" class="btn btn-warning">Back</a></div>
                </form>
            </div>
        </section>
    </main>
   <?php $ses->footer();?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>