<?php
require_once '../../models/user.php';
require_once '../../control/AuthController.php';
if(session_status()==null)
{
    session_start();
}
$errMessage = "";
if(isset($_POST['email']) && isset($_POST['password']) &&isset($_POST['name'])&&isset($_POST['number']))
{

    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['number']))
    {
        $user = new User;
        $auth= new AuthController;
        $user->setUser_Email($_POST['email']);
        $user->setUser_Password($_POST['password']);
        $user->setUser_Name($_POST['name']);
        $user->setUser_Phone($_POST['number']);
        if($auth->register($user))
        {
            header("location: ../user/index.php");
        }
        else
        {
            $errMessage=$_SESSION["errMessage"];
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
    <title>Register</title>
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
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2  style="color:darkcyan">Welcome to Meet U There!</h2>
                </div>
                <div class="block-heading">
                    <h2 class="text-info">Registration</h2>
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
                <form action="register.php" method="POST">
                    <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control item" type="text" id="name" name="name"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" id="password" name="password"></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" id="email" name="email"></div>
                    <div class="mb-3"><label class="form-label" for="number">Phone Number</label><input class="form-control item" type="text" id="number" name="number"></div>
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2023 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>