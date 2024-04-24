<?php

require_once '../../models/meals.php';
require_once '../../models/order.php';
require_once '../../control/MealsController.php';
require_once '../../control/OrdersController.php';
require_once '../user/parent.php';
$ses=new SES;
$r=new order;
$mealsController=new MealsController;
session_start();
$x=  $_SESSION["userId"] ;
$or=new OrdersController;
$get=$or->getspecificOrderforUser($x);
$discount=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>About Us - Brand</title>
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
<?php $ses->header();?>
    <main class="page pricing-table-page">
        <section class="clean-block clean-pricing dark">
            <div class="container">
                <div class="block-heading">
                    
                    <h2 class="text-info">Your Orders</h2>
                    
                    <main>
                        
       <br><br>

                        <div class="container">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <table class="table table-striped table-bordered" id="example" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                    <th>Restaurant</th>
                                                    <th>Meal</th>
                                                    <th>Price</th>
                                                    <th>Photo</th>
                                                    <th>Order_Date</th>
                                                    <th>If you want to delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $total=0;
                                                $cnt=0;
                                                foreach($get as $gets)
                                                {
                                                    $meals=$mealsController->getspecificMeal($gets['Meal_Id']);
                                                    $date =$gets['Order_Date'];
                                                    $orderid=$gets['Order_Id'];
                                                
                                                
                                                foreach($meals as $meal)
                                                {
                                                    
                                                    $n="delete".$cnt++; 
                                                    $total+=$meal['Meal_Price'];
                                                    $discount=0;
                                                    if($total>=300)
                                                    {
                                                        $discount=.2*$total;
                                                    }                                               ?>
                                                    <tr>
                                                    <td><?php echo $meal['Meal_Restaurant']?></td>
                                                    <td><?php echo $meal['Meal_Name']?></td>
                                                    <td><?php echo $meal['Meal_Price']?> </td>
                                                    
                                                    <td><img width="150px" src="<?php echo $meal['Meal_Image']?>"onerror="this.onerror=null; this.src='<?php echo $meal['Meal_Image']?>'"/></td>
                                                    <td><?php echo $date?> </td>
                                                    <td>
                                        <form action="Orders.php" method="POST">
                                        <input type="hidden" name="MID"  >
                                            <button type="submit" name=<?php echo $n?> class="btn btn-danger">
                                                <i class="far fa-trash-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i>
                                            </button>
                                        
                                        </form>
                                    </td>
                                                </tr>
                                                <?php
                                                 if(isset($_POST["$n"])){
                                                    if($or->deleteOrder($orderid)){
                                                        echo"order deleted";
                                                    }
                                                 }
                                                }
                                            }
                                                ?>
                                                
                                                </tbody>

                                            
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>

<?php 
if($discount>0)
{
    $total=.8*$total;
    ?>
    <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong>your total price after discount </strong> <?php echo $total?>
  </div>
  <?php
}
else 
{
    ?>
            <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>your total price </strong><?php echo $total?>
</div>
<?php
}
?>

      </main>
                </div>
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