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
        <title>About</title>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="icon" href="../img/logo.png" type="image/png">

        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/u_about.css">
    </head>
    
    <body>
        <div class="nav">
            <div class="nav-link">
                <div class="logo">
                    <span class="logo-u">U</span><span class="logo-p">P</span><span class="logo-diet">DIET</span>
                </div>
                <div class="navbar">
                    <a href="../user">Home</a>
                    <a href="../admin/">Admin</a>
                    <a href="" class="nav-active">About</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-header">
                <div class="header-logo">
                    <img src="../img/slogan.png">
                </div>
                <div class="header-title">
                    <span>Development Team</span>
                </div>
                <div class="header-contact">
                    <span class="decorated-title contact-title">Contact Us</span>
                    <span class="contact-info">updiet@up.edu.ph</span>
                    <span class="contact-info">+63(2)5216574</span>
                    <span class="contact-info">University of the Philippines Visayas, Miagao</span>
                    <span class="contact-info">5023 Iloilo, Philippines</span>
                </div>
            </div>
            <div class="content-items">
                <div class="dev-item">
                    <div class="dev-header">
                        <img class="title-img" src="../img/d_2.png">
                        <div class="title-content">
                            <span class="decorated-title title-name">Rheymart Tugado</span>
                            <span class="title-title">Project Manager</span>
                        </div>
                    </div>
                    <div class="dev-content">
                        <span class="decorated-title text-title">Mission</span>
                        <span class="text-text">
                            At UPDiet Food Delivery, our mission is to provide the UPV community with a convenient and safe food delivery service that centralizes all available food options. We aim to simplify the process of ordering food, minimize physical interactions, and contribute to efforts in reducing the transmission of COVID-19.
                        </span>
                    </div>
                </div>
                <div class="dev-item">
                    <div class="dev-header">
                        <img class="title-img" src="../img/d_1.png">
                        <div class="title-content">
                            <span class="decorated-title title-name">Ellaine Ba&#241;es</span>
                            <span class="title-title">Business Analyst</span>
                        </div>
                    </div>
                    <div class="dev-content">
                        <span class="decorated-title text-title">Vision</span>
                        <span class="text-text">
                        Our vision is to become the go-to platform for UPV students and staff when it comes to ordering food. We strive to continuously enhance the user experience, expand our restaurant partnerships, and offer a wide variety of food options to cater to diverse preferences.
                        </span>
                    </div>
                </div>
                <div class="dev-item">
                    <div class="dev-header">
                        <img class="title-img" src="../img/d_3.png">
                        <div class="title-content">
                            <span class="decorated-title title-name">Kyle Enorio</span>
                            <span class="title-title">Developer</span>
                        </div>
                    </div>
                    <div class="dev-content">
                        <span class="decorated-title text-title">Key Values & Goals</span>
                        <span class="text-text">
                        At UPDiet Food Delivery, our key values and goals revolve around convenience, safety, variety, reliability, and customer satisfaction. We are committed to providing the UPV community with a seamless, safe, and diverse food ordering experience, ensuring their satisfaction and well-being every step of the way.
                        </span>
                    </div>
                </div>
                <div class="dev-item">
                    <div class="dev-header">
                        <img class="title-img" src="../img/d_4.png">
                        <div class="title-content">
                            <span class="decorated-title title-name">Aldritch Toreres</span>
                            <span class="title-title">QA Analyst</span>
                        </div>
                    </div>
                    <div class="dev-content">
                        <span class="decorated-title text-title">Core Belief</span>
                        <span class="text-text">
                        We believe that everyone deserves access to a convenient and safe food delivery service, especially during challenging times like the COVID-19 pandemic. Our core belief is that technology can play a vital role in enhancing the overall dining experience and promoting the well-being of the UPV community.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
