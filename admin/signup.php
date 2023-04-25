<!DOCTYPE html>
<html>
    <?php 
        include("../conn/connect.php");

        error_reporting(0);
        session_start(); 

        // prevent signin when already logged in
        if(isset($_SESSION["admin"])) header("location:profile.php");
    ?>
    <head>
        <title>Admin - Register store.</title>

        <link rel="icon" href="../img/logo.png" type="image/png">

        <link rel="stylesheet" href="../css/base.css" />
        <link rel="stylesheet" href="../css/fonts.css" />
        <link rel="stylesheet" href="../css/a_base.css" />
        <link rel="stylesheet" href="../css/a_signin.css" />
        <link rel="stylesheet" href="../css/a_signup.css" />

        <script src="../js/jquery-3.6.4.min.js"></script>
    </head>
    <body>
        <div class="nav">
            <a href="../user/">
                <img src="../img/left-arrow.png">
                <span>Back to user signin</span>
            </a>
        </div>
        <div class="form">
            <div class="form-container">
                <div class="form-label">
                    <span>REGISTER STORE</span>
                </div>
                <div class="h-sep"></div>
                <form class="form-proper">
                    <div class="signup-field">
                        <input type="text" id="name" maxlength="20" placeholder="Store Name">
                        <span class="tooltip-q">?
                            <span class="tooltip">Max of 20 characters. Should start and end with a character.</span>
                        </span>
                    </div>
                    <div class="signup-field">
                        <input type="text" id="email" placeholder="Email">
                        <span class="tooltip-q">?
                            <span class="tooltip">Any valid email.</span>
                        </span>
                    </div>
                    <div class="signup-field">
                        <input type="password" id="password" maxlength="16" placeholder="Password">
                        <span class="tooltip-q">?
                            <span class="tooltip">Max of 16 alphanumeric characters.</span>
                        </span>
                    </div>
                    <div class="signup-field">
                        <input type="text" id="c_num" maxlength="11" placeholder="Contact Number">
                        <span class="tooltip-q">?
                            <span class="tooltip">11-digit number.</span>
                        </span>
                    </div>
                    <div class="signup-field">
                        <input type="text" id="location" placeholder="Location">
                        <span class="tooltip-q">?
                            <span class="tooltip">Location within Miagao. Should not be empty.</span>
                        </span>
                    </div>
                    <span id="error-msg" class="error"></span>
                    <button type="button" id="submit" disabled="true">Submit</button>
                    <a id="create" href="../admin/">
                        <img src="../img/left-arrow.png" />
                        <span>Log in to account.</span>
                    </a>
                </form>
            </div>
        </div>
        <script src="../js/a_signup.js"></script>
    </body>
</html>