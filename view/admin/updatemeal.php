<?php

require_once '../../models/meals.php';
require_once '../../control/MealsController.php';
require_once '../admin/parent.php';
$ses=new SES;
$ses->SES();
$result;
$meal=new Meals;
$mealsController=new MealsController;
$errMessage="";
$flag=0;

if(isset($_POST['id']))
{
    if(!empty($_POST['id']))
    {
        if(!$result=$mealsController->getspecificMeal($_POST['id']))
        {
            $errMessage="The Entered Meal_ID is Not Found!";
        }
        else
        {
            $meal->setMeal_Id($_POST['id']);
            if(isset($_POST['name']))
            {
                if(!empty($_POST['name']))
                {
                    $meal->setMeal_Name($_POST['name']);
                }
                else
                {
                    $meal->setMeal_Name($result[0]["Meal_Name"]);
                }
            }
            if(isset($_POST['price']))
            {
                if(!empty($_POST['price']))
                {
                    $meal->setMeal_Price($_POST['price']);
                }
                else
                {
                    $meal->setMeal_Price($result[0]["Meal_Price"]);
                }
            }
            if(isset($_POST['restaurant']))
            {
                if(!empty($_POST['restaurant']))
                {
                    $meal->setMeal_Restaurant($_POST['restaurant']);
                }
                else
                {
                    $meal->setMeal_Restaurant($result[0]["Meal_Restaurant"]);
                }
            }
            if(isset($_FILES["image"]))
            {
                $location="../image/".date("h-i-s").$_FILES["image"]["name"];
                if(move_uploaded_file($_FILES["image"]["tmp_name"],$location))
                {
                    $flag=1;
                    $meal->setMeal_Image($location);
                }
            }
            if(!$flag)
            {
                $meal->setMeal_Image($result[0]["Meal_Image"]);
            }
            if($mealsController->updateMeal($meal))
            {
                header("location: index.php");
            }

        }
    }
    else
    {
        $errMessage="Meal_ID is a Required Field to help you make UPDATE!";
    }
}

?>



<!DOCTYPE html>
<!-- saved from url=(0024)http://192.168.1.7:8000/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Brand</title>
    <link rel="stylesheet" href="./update meal_files/bootstrap.min.css">
    <link rel="stylesheet" href="./update meal_files/css">
    <link rel="stylesheet" href="./update meal_files/Font Awesome 5 Brands.css">
    <link rel="stylesheet" href="./update meal_files/Font Awesome 5 Free.css">
    <link rel="stylesheet" href="./update meal_files/css(1)">
    <link rel="stylesheet" href="./update meal_files/baguetteBox.min.css">
    <link rel="stylesheet" href="./update meal_files/CDRapido-Listado-Socios.css">
    <link rel="stylesheet" href="./update meal_files/vanilla-zoom.min.css">
    <link rel="stylesheet" href="./update meal_files/bootstrap.min.css">
    <link rel="stylesheet" href="./update meal_files/fontawesome-all.min.css">
    <link rel="stylesheet" href="./update meal_files/baguetteBox.min(1).css">
    <link rel="stylesheet" href="./update meal_files/Button-Change-Text-on-Hover.css">
    <link rel="stylesheet" href="./update meal_files/all.min.css">
    <link rel="stylesheet" href="./update meal_files/Ludens---Sleek-Image-Input-with-Preview.css">
</head>

<body>
<?php $ses->header()?>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Update Meal</h2>
                    <p></p>
                </div>
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
            <form class="form-horizontal" action="updatemeal.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3"><label class="form-label col-sm-2">ID</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="id"></div>
                </div>
                <div class="form-group mb-3"><label class="form-label col-sm-2">Meal_Name</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="name"></div>
                </div>
                <div class="form-group mb-3"><label class="form-label col-sm-2">Meal_Price</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="price"></div>
                </div>
                <div class="form-group mb-3"><label class="form-label col-sm-2">Meal_Restaurant</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="restaurant"></div>
                </div>
                <div class="mb-3"><label class="form-label" for="basic-icon-default-message">Meal_Image</label><input class="form-control" type="file" id="image" name="image" style="color:blue"></div>
                <button class="button" type="submit" data-hover="SURE!"><span>UPDATE</span></button>
                <br><a class="button" href="index.php" data-hover="SURE!"><span>BACK</span></a>
            </form>    
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="http://192.168.1.7:8000/#">Home</a></li>
                        <li><a href="http://192.168.1.7:8000/#">Sign up</a></li>
                        <li><a href="http://192.168.1.7:8000/#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="http://192.168.1.7:8000/#">Company Information</a></li>
                        <li><a href="http://192.168.1.7:8000/#">Contact us</a></li>
                        <li><a href="http://192.168.1.7:8000/#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5> <?php $ses->footer();?>
    <script src="./update meal_files/bootstrap.min.js.download"></script>
    <script src="./update meal_files/baguetteBox.min.js.download"></script>
    <script src="./update meal_files/vanilla-zoom.js.download"></script>
    <script src="./update meal_files/theme.js.download"></script>
    <script src="./update meal_files/bootstrap.min.js(1).download"></script>
    <script src="./update meal_files/Ludens---Sleek-Image-Input-with-Preview-dependencies.js.download"></script>
    <script id="bs-live-reload" data-sseport="53912" data-lastchange="1682526029987" src="./update meal_files/livereload.js.download"></script>


</body></html>