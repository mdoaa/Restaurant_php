<?php

require_once '../../models/order.php';
require_once '../../control/OrdersController.php';
require_once '../../control/MealsController.php';
require_once '../../control/UsersController.php';
require_once '../admin/parent.php';

$ses=new SES;
$ses->SES();
$usersController=new UsersController;
$getuserid=$usersController->getAllUsersid();
$mealsController=new MealsController;
$getmealid=$mealsController->getAllMealsid();

$result;
$order=new Order;
$ordersController=new OrdersController;
$errMessage="";

if(isset($_POST['id']))
{
    if(!empty($_POST['id']))
    {
        if(!$result=$ordersController->getspecificOrder($_POST['id']))
        {
            $errMessage="The Entered ORDER_ID is Not Found!";
        }
        else
        {
            $order->setOrder_Id($_POST['id']);
            if(isset($_POST['userid']))
            {
                if(!empty($_POST['userid']))
                {
                    $order->setUser_Id($_POST['userid']);
                }
                else
                {
                    $order->setUser_Id($result[0]["User_Id"]);
                }
            }
            if(isset($_POST['mealid']))
            {
                if(!empty($_POST['mealid']))
                {
                    $order->setMeal_Id($_POST['mealid']);
                }
                else
                {
                    $order->setMeal_Id($result[0]["Meal_Id"]);
                }
            }
            if($ordersController->updateOrder($order))
            {
                header("location: index.php");
            }

        }
    }
    else
    {
        $errMessage="ORDER_ID is a Required Field to help you make UPDATE!";
    }
}

?>



<!DOCTYPE html>
<!-- saved from url=(0024)http://192.168.1.7:8000/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>UPDATE Order</title>
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
                    <h2 class="text-info">UPDATE Order</h2>
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
            <form class="form-horizontal" action="updateorder.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3"><label class="form-label col-sm-2">ORDER_ID</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="id"></div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label col-sm-2">User_Id</label>
                    <div class="col-sm-10">
                    <select class="form-select form-select-lg" name="userid" id="userid">
                            <option value=""></option>
                            <?php
                            foreach($getuserid as $getuid)
                            {
                                ?>
                                <option value="<?php echo $getuid["User_Id"] ?>"><?php echo $getuid["User_Id"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3"><label class="form-label col-sm-2">Meal_Id</label>
                    <div class="col-sm-10">
                    <select class="form-select form-select-lg" name="mealid" id="mealid">

                            <option value=""></option>
                            <?php
                            foreach($getmealid as $getmid)
                            {
                                ?>
                                <option value="<?php echo $getmid["Meal_Id"] ?>"><?php echo $getmid["Meal_Id"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button class="button" type="submit" data-hover="SURE!"><span>UPDATE</span></button>
                <br><a class="button" href="index.php" data-hover="SURE!"><span>BACK</span></a>
            </form> 
        </section>
    </main>
    <?php $ses->footer();?>
    <script src="./update meal_files/bootstrap.min.js.download"></script>
    <script src="./update meal_files/baguetteBox.min.js.download"></script>
    <script src="./update meal_files/vanilla-zoom.js.download"></script>
    <script src="./update meal_files/theme.js.download"></script>
    <script src="./update meal_files/bootstrap.min.js(1).download"></script>
    <script src="./update meal_files/Ludens---Sleek-Image-Input-with-Preview-dependencies.js.download"></script>
    <script id="bs-live-reload" data-sseport="53912" data-lastchange="1682526029987" src="./update meal_files/livereload.js.download"></script>


</body></html>