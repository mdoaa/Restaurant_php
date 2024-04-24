<?php
require_once '../user/parent.php';
$ses=new SES;
session_start();
$err=null;
if(!isset($_SESSION["userRole"]))
{
    header("location: ../auth/login.php");
}
else
{
    $err=$_SESSION["userName"];
        
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home </title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>

<?php $ses->header();?>
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image: url(&quot;assets/img/tech/Screenshot%20(218).png&quot;);color: rgba(17,16,16,0.81);">
            <div class="text">
                <h2>Welcome To Our Food Delivery System : Meet U there <?php echo $err?>  &nbsp;</h2>
                <p>this system helps you get food easily</p> <br><br><span style ="font-size: 50px"> Do you want to eat? &#128523;</span><br><br> <button onclick="document.location='Meals.php'">Click here</button>
                
            </div>
            
        </section>
</div>
    </main>
    <?php $ses->footer();?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>