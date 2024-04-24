<?php

require_once '../../models/meals.php';
require_once '../../models/order.php';
require_once '../../control/MealsController.php';
require_once '../../control/OrdersController.php';
require_once '../user/parent.php';
$ses=new SES;
$r=new order;
$mealsController=new MealsController;
$meals=$mealsController->getAllMeals();
$order=new OrdersController;

    session_start();
$x=  $_SESSION["userId"] ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pricing - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Brands.css">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Free.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
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
                    
                    <h2 class="text-info">Pricing Table</h2>
                    
                    <main>
                        
      <form action="Meals.php" method="POST">
      <input type="text" class="searchTerm" placeholder="What are you looking for?" name="search" value="">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
     </form>
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
                                                    <th>Add</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!isset($_POST['search'])){
                                                   $xx=0;
                                                foreach($meals as $meal)
                                                {
                                                    
                                                   
                                                    $n="cart".$xx++; 
                                                    
                                                   // echo $n;
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $meal['Meal_Restaurant']?></td>
                                                    <td><?php echo $meal['Meal_Name']?></td>
                                                    <td><?php echo $meal['Meal_Price']?> </td>

                                                   
                                                    <td><img width="150px" src="<?php echo $meal['Meal_Image']?>"onerror="this.onerror=null; this.src='<?php echo $meal['Meal_Image']?>'"/></td>
                                                  <form   method="post" action="Meals.php"  > 
                                                    <td><button type="submit" class="addtocart" name=<?php echo $n?>><i class="fas fa-cart-plus"></i></button></td>
                                                </form>
                                                </tr>
                                                <?php
                                                        $y= $meal['Meal_Id'] ;
                                                        
                                                     if(isset($_POST["$n"])){
                                                        
                                                       // echo $x . $y ;
                                                       $r->setUser_Id($x);
                                                       $r->setMeal_Id($y);
                                                       $orderr=$order->addOrder($r);

                                                       
                                                    }
                                                    
                                                        
                                                             
                                                
                                                }
                                                
                                            }
                                            else{
                                                $ok=false;
                                                $xx=0;
                                                foreach($meals as $meal)
                                                {
                                                      $n="cart".$xx++;
                                                    ?>
                                                   <?php if($_POST['search']==$meal['Meal_Restaurant']||$_POST['search']==$meal['Meal_Name']||$_POST['search']==$meal['Meal_Price']){
                                                    $ok=true;

                                                   ?>
                                                   
                                                    <tr>
                                                    <td><?php echo $meal['Meal_Restaurant']?></td>
                                                    <td><?php echo $meal['Meal_Name']?></td>
                                                    <td><?php echo $meal['Meal_Price']?> </td>
                                                    <td><img width="150px" src="<?php echo $meal['Meal_Image']?>"onerror="this.onerror=null; this.src='<?php echo $meal['Meal_Image']?>'"/></td>
                                                    <form   method="post" action="Meals.php"  > 
                                                    <td><button type="submit" class="addtocart" name=<?php echo $n?>><i class="fas fa-cart-plus"></i></button></td>
                                                </form>
                                                <?php
                                                 $y= $meal['Meal_Id'] ;
                                                        
                                                 if(isset($_POST["$n"])){
                                                    
                                                    //echo $x . $y ;
                                                    $r->setUser_Id($x);
                                                    $r->setMeal_Id($y);
                                                    $orderr=$order->addOrder($r);

                                                 }
                                                ?>
                                                </tr>
                                                <?php
                                                
                                                   }
                                                }
                                                if($ok==false){
                                                    ?>
                                                   <!-- <h2>Alert Messages</h2>-->

                                                   <!-- <p>Click on the "x" symbol to close the alert message.</p> -->
                                                    <div class="alert">
                                                      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                                      <strong>Oops!</strong> NO Meal Found.
                                                    </div>
                                                    <?php
                                                }
                                                
                                            
                                            }
                                                ?>
                                                </tbody>

                                           
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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