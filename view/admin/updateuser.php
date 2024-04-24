<?php

require_once '../../models/user.php';
require_once '../../control/UsersController.php';
require_once '../../control/RolesController.php';
require_once '../admin/parent.php';
$ses=new SES;
$ses->SES();
$rolesController=new RolesController;
$getrole=$rolesController->getAllRoleId();

$result;
$user=new User;
$usersController=new UsersController;
$errMessage="";

if(isset($_POST['id']))
{
    if(!empty($_POST['id']))
    {
        if(!$result=$usersController->getspecificUser($_POST['id']))
        {
            $errMessage="The Entered USER_ID is Not Found!";
        }
        else
        {
            $user->setUser_Id($_POST['id']);
            if(isset($_POST['name']))
            {
                if(!empty($_POST['name']))
                {
                    $user->setUser_Name($_POST['name']);
                }
                else
                {
                    $user->setUser_Name($result[0]["User_Name"]);
                }
            }
            if(isset($_POST['roleid']))
            {
                if(!empty($_POST['roleid']))
                {
                    $user->setRole_Id($_POST['roleid']);
                }
                else
                {
                    $user->setRole_Id($result[0]["Role_Id"]);
                }
            }
            if(isset($_POST['email']))
            {
                if(!empty($_POST['email']))
                {
                    $user->setUser_Email($_POST['email']);
                }
                else
                {
                    $user->setUser_Email($result[0]["User_Email"]);
                }
            }
            if(isset($_POST['password']))
            {
                if(!empty($_POST['password']))
                {
                    $user->setUser_Password($_POST['password']);
                }
                else
                {
                    $user->setUser_Password($result[0]["User_Password"]);
                }
            }
            if(isset($_POST['phone']))
            {
                if(!empty($_POST['phone']))
                {
                    $user->setUser_Phone($_POST['phone']);
                }
                else
                {
                    $user->setUser_Phone($result[0]["User_Phone"]);
                }
            }
            
            if($usersController->updateUser($user))
            {
                header("location: index.php");
            }

        }
    }
    else
    {
        $errMessage="USER_ID is a Required Field to help you make UPDATE!";
    }
}

?>



<!DOCTYPE html>
<!-- saved from url=(0024)http://192.168.1.7:8000/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>UPDATE USER</title>
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
                    <h2 class="text-info">UPDATE USER</h2>
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
            <form class="form-horizontal" action="updateuser.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3"><label class="form-label col-sm-2">USER_ID</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="id"></div>
                </div>
                <div class="form-group mb-3"><label class="form-label col-sm-2">User_Name</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="name"></div>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label col-sm-2">Role_Id</label>
                    <div class="col-sm-10">
                    <select class="form-select form-select-lg" name="roleid" id="roleid">
                            <option value=""></option>
                            <?php
                            foreach($getrole as $getuid)
                            {
                                ?>
                                <option value="<?php echo $getuid["Roles_Id"] ?>"><?php echo $getuid["Roles_Id"] ?></option>
                                <?php
                            }
                            ?>
                    </select>
                    </div>
                </div>
                <div class="form-group mb-3"><label class="form-label col-sm-2">User_Email</label>
                    <div class="col-sm-10"><input class="form-control" type="email" name="email"></div>
                </div>
                <div class="form-group mb-3"><label class="form-label col-sm-2">User_Password</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="password"></div>
                </div>
                <div class="form-group mb-3"><label class="form-label col-sm-2">User_Phone</label>
                    <div class="col-sm-10"><input class="form-control" type="text" name="phone"></div>
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