<!DOCTYPE html>
<html>
    <?php 
        include("../conn/connect.php");

        error_reporting(0);
        session_start(); 

        if(!isset($_SESSION["user"])) header("location:../user/");
        if(!isset($_SESSION["store"])) header("location:../dashboard/");

        $s = $_SESSION["store"];
        $u = $_SESSION["user"]["u_id"];

        $q = "SELECT user.email, store_info.* FROM user, store_info WHERE user.u_id=$s && store_info.u_id=$s;";
        $res = $db->query($q);
        $rows = mysqli_fetch_array($res);

    ?>
    <head>
        <title><?php echo $rows["name"]; ?></title>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="../img/logo.png" type="image/png">

        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/d_base.css">
        <link rel="stylesheet" href="../css/d_store.css">
        
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
            <div class="content-content">
                <div class="content-header">
                    <div class="content-title">
                        <img class="title-image" src="../img/logo.png">
                        <div class="store-content"
                             style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 1%, rgba(0,0,0,0.9)), url('../<?php echo $rows["prof_cover"]; ?>');">
                             <div class="store-container">
                                <div class="store-pic">
                                    <img src="../<?php echo $rows['prof_pic'] ?>" >
                                </div>
                                <div class="store-info">
                                    <span class="store-title"><?php echo $rows["name"] ?></span>
                                    <div class="sub-container">
                                        <span class="store-subtitle"><img src="../img/location_l.png"><span><?php echo $rows["location"] ?></span></span>
                                        <span class="store-subtitle"><img src="../img/mail_l.png"><span><?php echo $rows["email"] ?></span></span>
                                        <span class="store-subtitle"><img src="../img/contact_l.png"><span><?php echo $rows["c_num"] ?></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-category">
                    <div class="cate-img">
                        <div>
                            <img src="../img/main_course.png">
                            <span class="cate-type">Main Course</span>
                        </div>
                    </div>
                    <div class="cate-img">
                        <div>
                            <img src="../img/appetizer.png">
                            <span class="cate-type">Appetizer</span>
                        </div>
                    </div>
                    <div class="cate-img">
                        <div>
                            <img src="../img/dessert.png">
                            <span class="cate-type">Dessert</span>
                        </div>
                    </div>
                    <div class="cate-img">
                        <div>
                            <img src="../img/beverages.png">
                            <span class="cate-type">Beverage</span>
                        </div>
                    </div>
                    <div class="cate-img">
                        <div>
                            <img src="../img/addons.png">
                            <span class="cate-type">Add-on</span>
                        </div>
                    </div>
                </div>
                <div class="content-store">

                </div>
            </div>
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
        <script>
            var db_uid = <?php echo $u; ?>;
            var db_sid = <?php echo $s; ?>;
        </script>
        <script type="module" src="../js/d_base.js"></script>
        <script type="module" src="../js/d_notif.js"></script>
        <script type="module" src="../js/d_store.js"></script>
    </body> 
</html>