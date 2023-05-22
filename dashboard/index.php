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
        
        <link rel="stylesheet" href="../css/d_cart_proper.css">
        <link rel="stylesheet" href="../css/d_cart_checkout.css">
        <link rel="stylesheet" href="../css/d_cart_success.css">

        <link rel="stylesheet" href="../css/d_order_proper.css">

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
                        <span class="nav-notif-order">1<span>
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
        </div>
        <div class="sidebar">
            <?php //include("../user/overlay_proper.php"); ?>
        </div>
        <div class="notif">
            <div class="notif-header">
                <div class="notif-title">
                    <span class="notif-title-img">
                        <img src="../img/delivery.png">
                    </span>
                    <span class="notif-title-text">You have updates on your order.</span>
                    <div class="notif-controls">
                        <button class="notif-control">
                            <img src="../img/close.png">
                        </button>
                    </div>
                </div>
                <div class="notif-subheader">
                    <span class="notif-subheader-text"></span>
                </div>
            </div>
            <div class="notif-content">
                <div class="notif-c-header">
                    <span class="notif-c-h-label">
                        Order is <span class="notif-c-h-value"></span>.
                    </span>
                    <div class="notif-c-h-detail">
                        <div class="notif-d-food">
                            <span class="notif-d-f-name"></span>
                            <span class="notif-d-f-quantity"></span>
                        </div>
                        <span class="notif-d-store"></span>
                        <span class="notif-d-price"></span>
                        <span class="notif-d-italic">+ delivery fee</span>
                    </div>
                </div>
                <div class="notif-redirect">
                    <span class="notif-r-control">View order</span>
                </div>
            </div>
        </div>
        <script type="module" src="../js/d_base.js"></script>
        <script type="module" src="../js/d_notif.js"></script>
        <script type="module" src="../js/d_dashboard.js"></script>
    </body> 
</html>