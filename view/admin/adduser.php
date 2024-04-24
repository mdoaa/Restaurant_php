<?php
require_once '../../models/user.php';
require_once '../../control/UsersController.php';
require_once '../../control/RolesController.php';
require_once '../admin/parent.php';

$errMessage="";
$ses=new SES;
$ses->SES();
$rolesController=new RolesController;
$getrole=$rolesController->getAllRoleId();
if(isset($_POST['name']) && isset($_POST['id']) &&  isset($_POST['email']) &&  isset($_POST['password']) && isset($_POST['phone']))
{

    if(!empty($_POST['name']) && !empty($_POST['id']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']))
    {
        $user=new User;
        $user->setUser_Name($_POST['name']);
        $user->setRole_Id($_POST['id']);
        $user->setUser_Email($_POST['email']);
        $user->setUser_Password($_POST['password']);
        $user->setUser_Phone($_POST['phone']);
        $usersController= new UsersController;
        if($usersController->addUser($user))
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
    <title>Add USER</title>
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
                    <h2 class="text-info">ADD USER</h2>
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
                <form action="adduser.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3"><label class="form-label" for="name">User_Name</label><input class="form-control" type="text" id="name" name="name" ></div>
                    <div class="mb-3">
                        <label class="form-label">Role_Id</label>
                        <select class="form-select form-select-lg" name="id" id="id">
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
                    <div class="mb-3"><label class="form-label" for="email">User_Email</label><input class="form-control" type="email" id="email" name="email" ></div>
                    <div class="mb-3"><label class="form-label" for="password">User_Password</label><input class="form-control" type="text" id="password" name="password" ></div>
                    <div class="mb-3"><label class="form-label" for="phone">User_Phone</label><input class="form-control" type="text" id="phone" name="phone" ></div>
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