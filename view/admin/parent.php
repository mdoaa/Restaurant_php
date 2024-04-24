<?php

 class SES
{
    public function SES()
    {
        session_start();
      if(!isset($_SESSION["userRole"]))
{
    header("location: ../auth/login.php");
}
else
{
    if($_SESSION["userRole"]!="admin")
    {
        header("location: ../auth/login.php");
    }
}
    }
    public function header()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Meet U there</a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav ms-auto">
         <li class="nav-item"><a class="nav-link" href="../user/index.php">Home</a></li>
         <li class="nav-item"><a class="nav-link active" href="../user/Meals.php">Meals</a></li>
         <li class="nav-item"><a class="nav-link" href="../user/Orders.php">Orders</a></li>
          <li class="nav-item"><a class="nav-link" href="../auth/login.php?logout">logout</a></li>
        </div>
        </div>
        </nav>
        </html>
            <?php

    }
    public function footer()
    {
        ?>
                <!DOCTYPE html>
        <html lang="en">
        <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2023 Copyright Text</p>
        </div>
    </footer>
        </html>
        <?php

    }

}




?>