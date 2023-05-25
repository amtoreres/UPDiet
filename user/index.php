<!DOCTYPE html>
<html>
    <?php 
        include("../conn/connect.php");

        error_reporting(0);
        session_start(); 

        // prevent signin when already logged in
        if(isset($_SESSION["user"])) header("location:../dashboard/");
    ?>
    <head>
        <title>Sign in to your account.</title>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="icon" href="../img/logo.png" type="image/png">

        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/u_signin.css">

        <script src="../js/jquery-3.6.4.min.js"></script>
    </head>
    
    <body>
        <div class="nav">
            <div class="nav-link">
                <div class="logo">
                    <span class="logo-u">U</span><span class="logo-p">P</span><span class="logo-diet">DIET</span>
                </div>
                <div class="navbar">
                    <a href="" class="nav-active">Home</a>
                    <a href="../admin/">Admin</a>
                    <a href="about.php">About</a>
                </div>
            </div>
            <div class="nav-content">
                <div class="nav-body">
                    <div class="slogan">
                        <img src="../img/slogan.png" />
                    </div>
                    <div class="buttons">
                        <div class="order">
                            <button>
                                <span>Order Now</span>
                            </button>
                        </div>
                        <div class="watch">
                            <button>
                                <img src="../img/play.png" />
                            </button>
                            <span>Watch Video</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form">
            <?php
                // show login page by default
                if(!isset($_SESSION["u_signin_state"]) || $_SESSION["u_signin_state"]) 
                    include('login.php');
                else include('signup.php');
            ?>
        </div>
        <div class="flair">
            <img src="../img/background.png">
        </div>
        <script>
            // set current form page
            <?php if(!isset($_SESSION["u_signin_state"])) $_SESSION["u_signin_state"] = 1; ?>
            var u_signin_state = <?php echo $_SESSION["u_signin_state"]; ?>;
        </script>
        <script src="../js/u_signin.js"></script>
    </body>
</html>
