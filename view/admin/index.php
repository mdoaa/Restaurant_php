<?php

require_once '../../models/meals.php';
require_once '../../control/MealsController.php';
require_once '../admin/parent.php';
require_once '../../models/user.php';
require_once '../../control/UsersController.php';
$ses=new SES;
$ses->SES();
$dltMessage=false;
$mealsController=new MealsController;
$meals=$mealsController->getAllMeals();
if(isset($_POST["delete"]))
{
    if(!empty($_POST["MID"]))
    {
        if($mealsController->deleteMeal($_POST["MID"]))
        {
            $dltMessage=true;
            $meals=$mealsController->getAllMeals();
 

            
        }

    }
}

$dlttMessage=false;
$usersController=new UsersController;
$users=$usersController->getAllUsers();

if(isset($_POST["deletee"]))
{
    if(!empty($_POST["MIID"]))
    {
        if($usersController->deleteUser($_POST["MIID"]))
        {
            $dlttMessage=true;
            $users=$usersController->getAllUsers();
 
        }

    }
}



require_once '../../models/order.php';
require_once '../../control/OrdersController.php';
$dltttMessage=false;
$ordersController=new OrdersController;
$orders=$ordersController->getAllOrders();

if(isset($_POST["deleteee"]))
{
    if(!empty($_POST["MIIID"]))
    {
        if($ordersController->deleteOrder($_POST["MIIID"]))
        {
            $dltttMessage=true;
            $orders=$ordersController->getAllOrders();
 
        }

    }
}








?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blog Post - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Brands.css">
    <link rel="stylesheet" href="assets/css/Font%20Awesome%205%20Free.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/CDRapido-Listado-Socios.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/css/baguetteBox.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<?php $ses->header()?>

    <main class="page blog-post">
        <section class="clean-block clean-post dark">
            <div class="container">
                <div class="block-content"></div>
                <h1 class="text-center" style="font-weight: bold;">Manage Users</h1>
            </div>
        </section>
    </main>
            <div class="row">
                <div class="col-md-4">
                    <h2 style="width: 343px; color:darkred;">Users</h2>
                </div>
                <div class="col-md-4">
                    <form action="index.php" method="POST">
                        <div class="box">
                            <input type="text" name="search" placeholder="What are you looking for?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>        
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <a class="btn btn-primary d-flex align-items-center align-self-center" role="button" style="height: 38px;background-color: rgb(21,221,4);" href="adduser.php"><br>ADD USERS<br><br><i class="fa fa-plus-circle"></i></a>
                    <a class="btn btn-primary d-flex align-items-center align-self-center" role="button" style="height: 38px;background-color: rgb(21,221,4);" href="updateuser.php"><br>UPDATE USERS<br><br><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>

            <?php
            $flag=0;
            if(isset($_POST["search"]))
            {
                if(empty($_POST["search"]))
                {
                    ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Please!</strong> Enter what you want for search!
                    </div>
                    <?php
                }
                else
                {
                    $flag=false;
                    foreach($users as $user)
                    {
                        if($_POST["search"]==$user["User_Id"] || $_POST["search"]==$user["User_Name"] || $_POST["search"]==$user["Role_Id"] || $_POST["search"]==$user["User_Email"]||$_POST["search"]==$user["User_Password"]||$_POST["search"]==$user["User_Phone"])
                        {
                            $flag=true;
                            break;
                        }
                    }
                    if($flag==false)
                    {
                        ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Oh!</strong> No User Founded.. Try Again!
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <table   id="example" class="styled-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>User_ID </th>
                                            <th>Role_Name </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Phone</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($users as $user)
                                    {
                                        if($_POST["search"]==$user["User_Id"] || $_POST["search"]==$user["User_Name"] || $_POST["search"]==$user["Role_Id"] || $_POST["search"]==$user["User_Email"]||$_POST["search"]==$user["User_Password"]||$_POST["search"]==$user["User_Phone"])
                                        {

                                    ?>
                                
                                        
                                        <tr>
                                            <td><?php echo $user["User_Id"] ?> </td>
                                            <td>
                                                <?php 
                                                if($user["Role_Id"]==1)
                                                {
                                                    echo "Admin";
                                                } 
                                                else if($user["Role_Id"]==2)
                                                {
                                                    echo"User";
                                                }
                                                else
                                                {
                                                    echo"Employee";
                                                }
                                                ?> 
                                            </td>
                                            <td><?php echo $user["User_Name"] ?> </td>
                                            <td><?php echo $user["User_Email"] ?> </td>
                                            <td><?php echo $user["User_Password"] ?> </td>
                                            <td><?php echo $user["User_Phone"] ?> </td>
                                            <td>
                                                <form action="index.php" method="POST">
                                                    <input type="hidden" name="MIID" value="<?php echo $user["User_Id"] ?>">
                                                    <button type="submit" name="deletee" class="btn btn-danger">
                                                        <i class="far fa-trash-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-warning"><i class="fas fa-pencil-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                                    <button type="submit" class="btn btn-info"><i class="fas fa-address-book d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                            
                            <?php
                                        }
                                    }
                            ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <?php

                       
                    }
                }
            }    
            ?>       


            
 
                


            <?php
              if (count($users) == 0)
              {
              ?>
                <div  class="alert alert-danger" role="alert">No Available Users</div>
              <?php
              } 
              else
              {
                ?>
                <div class="row">
                    <div class="col-md-12">
                    <table   id="example" class="styled-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>User_ID </th>
                                <th>Role_Name </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($users as $user)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $user["User_Id"] ?> </td>
                                    <td>
                                        <?php 
                                        if($user["Role_Id"]==1)
                                        {
                                            echo "Admin";
                                        }
                                        else if($user["Role_Id"]==2)
                                        {
                                            echo"User";
                                        }
                                        else
                                        {
                                            echo"Employee";
                                        }
                                        ?> 
                                    </td>
                                    <td><?php echo $user["User_Name"] ?> </td>
                                    <td><?php echo $user["User_Email"] ?> </td>
                                    <td><?php echo $user["User_Password"] ?> </td>
                                    <td><?php echo $user["User_Phone"] ?> </td>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="MIID" value="<?php echo $user["User_Id"] ?>">
                                            <button type="submit" name="deletee" class="btn btn-danger">
                                                <i class="far fa-trash-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i>
                                            </button>
                                            <button type="submit" class="btn btn-warning"><i class="fas fa-pencil-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-address-book d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
             <?php
              }
              ?>
                    </table>
                    </div>
                </div>
        </div>
        <?php
        if ($dlttMessage == true) 
         {
        ?>
        <div class="container">
            <div data-delay="2000" class="bs-toast toast  fade toast-placement-ex bottom-0 start-50 translate-middle-x show bg-info" role="alert" aria-live="assertive" aria-atomic="true">    
                <div class="toast-header" style="color:cadetblue">
                  <i class="bx bx-trash me-2"></i>
                  <div class="me-auto fw-semibold" style="font-family:Georgia, 'Times New Roman', Times, serif">User has been Deleted..</div>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>
        </div>
       
    <?php
    }
    
    ?>








    <main>
        <section>
            <div class="container">
                <h1 class="text-center" style="height: 113.3px;margin: 56px;padding: 58px;font-weight: bold;">Manage Meals</h1>
            </div>
        </section>
    </main>
           <div class="row">
                <div class="col-md-4">
                    <h2 style="width: 343px; color:darkred;">Meals</h2>
                </div>
                <div class="col-md-4">
                    <form action="index.php" method="POST">
                        <div class="box">
                            <input type="text" name="searchh" placeholder="What are you looking for?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <a class="btn btn-primary d-flex align-items-center align-self-center" role="button" style="height: 38px;background-color: rgb(21,221,4);" href="addmeal.php"><br>ADD Meals<br><br><i class="fa fa-plus-circle"></i></a>
                    <a class="btn btn-primary d-flex align-items-center align-self-center" role="button" style="height: 38px;background-color: rgb(21,221,4);" href="updatemeal.php"><br>UPDATE Meals<br><br><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
            <?php
            $flagg=0;
            if(isset($_POST["searchh"]))
            {
                if(empty($_POST["searchh"]))
                {
                    ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Please!</strong> Enter what you want for search!
                    </div>
                    <?php
                }
                else
                {
                    $flagg=false;
                    foreach($meals as $meal)
                    {
                        if($_POST["searchh"]==$meal["Meal_Id"] || $_POST["searchh"]==$meal["Meal_Name"] || $_POST["searchh"]==$meal["Meal_Price"] || $_POST["searchh"]==$meal["Meal_Restaurant"])
                        {
                            $flagg=true;
                            break;
                        }
                    }
                    if($flagg==false)
                    {
                        ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Oh!</strong> No Meal Founded.. Try Again!
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <table   id="example" class="styled-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Restaurant</th>
                                            <th>Image</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($meals as $meal)
                                    {
                                        if($_POST["searchh"]==$meal["Meal_Id"] || $_POST["searchh"]==$meal["Meal_Name"] || $_POST["searchh"]==$meal["Meal_Price"] || $_POST["searchh"]==$meal["Meal_Restaurant"])
                                        {

                                    ?>
                                
                                        
                                            <tr>
                                                <td><?php echo $meal["Meal_Id"] ?> </td>
                                                <td><?php echo $meal["Meal_Name"] ?> </td>
                                                <td><?php echo $meal["Meal_Price"] ?></td>
                                                <td><?php echo $meal["Meal_Restaurant"] ?></td>
                                                <td><img width="150" height="100" src="<?php echo $meal['Meal_Image']?>"onerror="this.onerror=null; this.src='<?php echo $meal['Meal_Image']?>'"/></td>
                                                <td>
                                                    <form action="index.php" method="POST">
                                                    <input type="hidden" name="MID" value="<?php echo $meal["Meal_Id"] ?>">
                                                    <button type="submit" name="delete" class="btn btn-danger">
                                                        <i class="far fa-trash-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-warning"><i class="fas fa-pencil-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                                    <button type="submit" class="btn btn-info"><i class="fas fa-address-book d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            
                            <?php
                                        }
                                    }
                            ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <?php

                       
                    }
                }
            }    
            ?>       







            <?php
              if (count($meals) == 0)
              {
              ?>
                <div  class="alert alert-danger" role="alert">No Available Meals</div>
              <?php
              } 
              else
              {
                ?>
                <div class="row">
                    <div class="col-md-12">
                    <table   id="example" class="styled-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Restaurant</th>
                                <th>Image</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($meals as $meal)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $meal["Meal_Id"] ?> </td>
                                    <td><?php echo $meal["Meal_Name"] ?> </td>
                                    <td><?php echo $meal["Meal_Price"] ?></td>
                                    <td><?php echo $meal["Meal_Restaurant"] ?></td>
                                    <td><img width="150" height="100" src="<?php echo $meal['Meal_Image']?>"onerror="this.onerror=null; this.src='<?php echo $meal['Meal_Image']?>'"/></td>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="MID" value="<?php echo $meal["Meal_Id"] ?>">
                                            <button type="submit" name="delete" class="btn btn-danger">
                                                <i class="far fa-trash-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i>
                                            </button>
                                            <button type="submit" class="btn btn-warning"><i class="fas fa-pencil-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-address-book d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
             <?php
              }
              ?>
                    </table>
                    </div>
                </div>
        </div>

        <?php
        if ($dltMessage == true) 
        {
        ?>
        <div class="container">
            <div data-delay="2000" class="bs-toast toast  fade toast-placement-ex bottom-0 start-50 translate-middle-x show bg-info" role="alert" aria-live="assertive" aria-atomic="true">    
                <div class="toast-header" style="color:cadetblue">
                  <i class="bx bx-trash me-2"></i>
                  <div class="me-auto fw-semibold" style="font-family:Georgia, 'Times New Roman', Times, serif">Item has been Deleted..</div>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>
        </div>
       
    <?php
    }
    
    ?>


        <div>
        <div class="container">
     
    </div>

    <main>
        <section>
            <div class="container">
                <h1 style="text-align: center;height: 67.3px;margin: 67px;font-weight: bold;">Manage orders&nbsp;</h1>
            </div>
        </section>
    </main>
    <div class="row">
                <div class="col-md-4">
                    <h2 style="width: 343px; color:darkred;">Orders</h2>
                </div>
                <div class="col-md-4">
                    <form action="index.php" method="POST">
                        <div class="box">
                            <input type="text" name="searchhh" placeholder="What are you looking for?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>       
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <a class="btn btn-primary d-flex align-items-center align-self-center" role="button" style="height: 38px;background-color: rgb(21,221,4);" href="addorder.php"><br>ADD Order<br><br><i class="fa fa-plus-circle"></i></a>
                    <a class="btn btn-primary d-flex align-items-center align-self-center" role="button" style="height: 38px;background-color: rgb(21,221,4);" href="updateorder.php"><br>UPDATE Order<br><br><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>



            <?php
            $flaggg=0;
            if(isset($_POST["searchhh"]))
            {
                if(empty($_POST["searchhh"]))
                {
                    ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Please!</strong> Enter what you want for search!
                    </div>
                    <?php
                }
                else
                {
                    $flaggg=false;
                    foreach($orders as $order)
                    {
                        if($_POST["searchhh"]==$order["Order_Id"] || $_POST["searchhh"]==$order["Meal_Id"] || $_POST["searchhh"]==$order["User_Id"] || $_POST["searchhh"]==$order["Order_Date"])
                        {
                            $flaggg=true;
                            break;
                        }
                    }
                    if($flaggg==false)
                    {
                        ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Oh!</strong> No Order Founded.. Try Again!
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <table   id="example" class="styled-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Order_ID </th>
                                            <th>User_ID</th>
                                            <th>Meal_ID</th>
                                            <th>Order_Date</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($orders as $order)
                                    {
                                        if($_POST["searchhh"]==$order["Order_Id"] || $_POST["searchhh"]==$order["Meal_Id"] || $_POST["searchhh"]==$order["User_Id"] || $_POST["searchhh"]==$order["Order_Date"])
                                        {

                                    ?>
                                
                                        
                                            <tr>
                                                <td><?php echo $order["Order_Id"] ?> </td>
                                                <td><?php echo $order["User_Id"] ?> </td>
                                                <td><?php echo $order["Meal_Id"] ?> </td>
                                                <td><?php echo $order["Order_Date"] ?> </td>
                                                <td>
                                                    <form action="index.php" method="POST">
                                                        <input type="hidden" name="MIIID" value="<?php echo $order["Order_Id"] ?>">
                                                        <button type="submit" name="deleteee" class="btn btn-danger">
                                                            <i class="far fa-trash-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i>
                                                        </button>
                                                        <button type="submit" class="btn btn-warning"><i class="fas fa-pencil-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                                        <button type="submit" class="btn btn-info"><i class="fas fa-address-book d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            
                            <?php
                                        }
                                    }
                            ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <?php

                       
                    }
                }
            }    
            ?>       





            <?php
              if (count($orders) == 0)
              {
              ?>
                <div  class="alert alert-danger" role="alert">No Available Orders</div>
              <?php
              } 
              else
              {
                ?>
                <div class="row">
                    <div class="col-md-12">
                    <table   id="example" class="styled-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Order_ID </th>
                                <th>User_ID </th>
                                <th>Meal_ID </th>
                                <th>Order_Date</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($orders as $order)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $order["Order_Id"] ?> </td>
                                    <td><?php echo $order["User_Id"] ?> </td>
                                    <td><?php echo $order["Meal_Id"] ?> </td>
                                    <td><?php echo $order["Order_Date"] ?> </td>
                                    <td>
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="MIIID" value="<?php echo $order["Order_Id"] ?>">
                                            <button type="submit" name="deleteee" class="btn btn-danger">
                                                <i class="far fa-trash-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i>
                                            </button>
                                            <button type="submit" class="btn btn-warning"><i class="fas fa-pencil-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-address-book d-xl-flex justify-content-xl-center align-items-xl-center"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
             <?php
              }
              ?>
                    </table>
                    </div>
                </div>
        </div>
        <?php
        if ($dltttMessage == true) 
         {
        ?>
        <div class="container">
            <div data-delay="2000" class="bs-toast toast  fade toast-placement-ex bottom-0 start-50 translate-middle-x show bg-info" role="alert" aria-live="assertive" aria-atomic="true">    
                <div class="toast-header" style="color:cadetblue">
                  <i class="bx bx-trash me-2"></i>
                  <div class="me-auto fw-semibold" style="font-family:Georgia, 'Times New Roman', Times, serif">Order has been Deleted..</div>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>
        </div>
       
    <?php
    }
    
    ?>

<?php $ses->footer();?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>