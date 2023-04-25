<!DOCTYPE html>
<html>
    <?php 
        include("../conn/connect.php");

        error_reporting(0);
        session_start(); 

        // prevent access when not logged in
        if(!isset($_SESSION["admin"])) header("location:index.php");
    ?>
    <head>
        <title>Store Profile</title>

        <link rel="icon" href="../img/logo.png" type="image/png">

        <link rel="stylesheet" href="../css/base.css" />
        <link rel="stylesheet" href="../css/fonts.css" />
        <link rel="stylesheet" href="../css/a_base.css" />
        <link rel="stylesheet" href="../css/a_dashboard.css" />

        <script src="../js/jquery-3.6.4.min.js"></script>
    </head>
    <body>
        <div class="nav">
            <a class="nav-link nav-active" href="">
                <span>Profile</span>
            </a>
            <a class="nav-link">
                <span>Orders</span>
            </a>
            <a class="nav-link" href="menu.php">
                <span>Menu</span>
            </a>
            <?php include("logout.php"); ?>
        </div>
        <div class="content">
            <?php include("profile_proper.php"); ?>
        </div>
        <script>
            var db_uid = <?php echo $_SESSION["admin"]["u_id"]; ?>;
        </script>
        <script src="../js/a_profile.js"></script>
    </body>
</html>