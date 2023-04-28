<!DOCTYPE html>
<html>
    <?php 
        include("../conn/connect.php");

        error_reporting(0);
        session_start(); 

        if(!isset($_SESSION["user"])) header("location:../user/");
    ?>
    <head>
        <title>Dashboard</title>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="../img/logo.png" type="image/png">

        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/d_base.css">

        <script src="../js/jquery-3.6.4.min.js"></script>
    </head>
    <body>
        <div class="nav">
            <div class="nav-container">
                <div class="navbar">
                    <button class="nav-button nav-link" id="home-trigger">
                        <img src="../img/dashboard.png" />
                    </button>
                    <button class="nav-button nav-link" id="prof-trigger" >
                        <img src="../img/user.png" />
                    </button>
                    <button class="nav-button nav-link" id="order-trigger">
                        <img src="../img/orders.png" />
                    </button>
                    <button class="nav-button nav-link" id="cart-trigger">
                        <img src="../img/cart.png" />
                    </button>
                </div>
                <div class="logout">
                    <?php include("../user/logout.php"); ?>
                </div>
            </div>
        </div>
        <div class="content">
            <?php include("dashboard_proper.php") ?>
        </div>
        <div class="sidebar">
            <?php //include("../user/overlay_proper.php"); ?>
        </div>
        <script type="module" src="../js/d_dashboard.js"></script>
    </body> 
</html>