<?php
require_once '../../models/order.php';
require_once '../../control/OrdersController.php';
require_once '../../control/MealsController.php';
require_once '../../control/UsersController.php';
require_once '../admin/parent.php';

$errMessage="";
$ses=new SES;
$ses->SES();
$usersController=new UsersController;
$getuserid=$usersController->getAllUsersid();
$mealsController=new MealsController;
$getmealid=$mealsController->getAllMealsid();

if(isset($_POST['userid']) && isset($_POST['mealid']))
{

    if(!empty($_POST['userid']) && !empty($_POST['mealid']))
    {
        $order=new Order;
        $order->setUser_Id($_POST['userid']);
        $order->setMeal_Id($_POST['mealid']);
        $ordersController= new OrdersController;
        if($ordersController->addOrder($order))
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
        $errMessage="All Fields are Required! ";
    }
}





?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Order</title>
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
                    <h2 class="text-info">ADD Order</h2>
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
                <form action="addorder.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label" for="userid">User_ID</label>
                        <select class="form-select form-select-lg" name="userid" id="userid">
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
                    <div class="mb-3">
                        <label class="form-label" for="mealid">Meal_Id</label>
                        <select class="form-select form-select-lg" name="mealid" id="mealid">
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