<?php
require_once '../../models/user.php';
require_once '../../control/AuthController.php';
$errMessage="";
if(isset($_POST['email']) && isset($_POST['password']))
{

    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $user = new User;
        $auth= new AuthController;
        $user->setUser_Email($_POST['email']);
        $user->setUser_Password($_POST['password']);
        if(!$auth->login($user))
        {
            if(session_status()==null)
            {
                session_start();
            }
            $errMessage=$_SESSION["errMessage"];
        }
        else
        {
            if(session_status()==null)
            {
                session_start();
            }
            if($_SESSION["userRole"]=="admin")
            {
                header("location: ../admin/index.php");
            }
            else
            {
                header("location: ../user/index.php");
            }
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
    <title>Login - Brand</title>
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
    <link rel="stylesheet" href="assetss/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetss/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assetss/css/Login-Box-En-login-box-en.css">
    <style>
        p{
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
    

</head>

<body>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading"><img width="690" height="284" src="assets/img/Screenshot%20(218).png">
                    <h2 class="text-info">Log In</h2>
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
                
        <div class="d-flex flex-column justify-content-center" id="login-box">
        
        <form action="login.php" method="POST">
        <div class="email-login" style="background-color: #ffffff;"><input type="email" class="email-imput form-control" style="margin-top: 10px;" placeholder="Email" minlength="6" name="email"><input name="password" type="password" class="password-input form-control" style="margin-top: 10px;" placeholder="Password"></div>
        <div class="submit-row" style="margin-bottom: 8px;padding-top: 0px;"><button class="btn btn-primary" type="submit">Log In</button>
                </form>
        <div class="d-flex justify-content-between">
                <div class="form-check form-check-inline" id="form-check-rememberMe"><input class="form-check-input" type="checkbox" id="formCheck-1" for="remember" style="cursor: pointer;" name="check"><label class="form-check-label" for="formCheck-1"><span class="label-text">Remember Me</span></label></div><a id="forgot-password-link" href="#">Forgot Password?</a>
            </div>
        </div>
        <div id="login-box-footer" style="padding: 10px 20px;padding-bottom: 23px;padding-top: 18px;">
            <p style="margin-bottom: 0px;">Don't have an account?<a id="register-link" href="../auth/register.php">Sign Up!</a></p>
        </div>
    </div>

               
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