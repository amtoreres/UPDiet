<?php
    include("../conn/connect.php");

    session_start();
    error_reporting(0);

    $uid = $_SESSION["user"]["u_id"];

    // fetch account data
    $q = "SELECT email from user where u_id='$uid';";
    $resu = $db -> query($q);
    $rowu = mysqli_fetch_array($resu);

    $q = "SELECT * from customer_info where u_id='$uid';";
    $resi = $db -> query($q);
    $rowi = mysqli_fetch_array($resi);
    
    $em = $rowu["email"];
    $usr = $rowi["username"];
    $num = $rowi["c_num"];
    $pp = $rowi["prof_pic"];
?>

<link rel="stylesheet" href="../css/u_overlay_proper.css">
<div class="body-container">
    <div class="profile-content">
        <div class="profile-info">
            <div class="img-container">
                <div>
                    <img id="prof_pic" src="" />
                </div>
            </div>
            <div class="info-container">
                <div class="info-title">
                    <span><?php echo $usr; ?></span>
                </div>
                <div class="info-detail">
                    <span><?php echo $em; ?></span>
                    <span><?php echo $num; ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="preview-container">
        <?php
            include("overlay_order.php");
        ?>
    </div>
    <div class="floating-buttons">
        <button id="edit-prof" class="button-show" title="Edit profile">
            <img src="../img/edit.png"/>
        </button>
        <button id="edit-pw" class="button-show" title="Edit password">
            <img src="../img/password.png"/>
        </button>
    </div>
</div>
<script>
    var db_img = "<?php echo $pp; ?>";

    // fallback profile picture
    if(db_img == "")
        document.getElementById("prof_pic").src = "../img/user.png";      
    else {
        // add random number to prevent loading from cache
        db_img = `../${db_img}?${new Date().getTime()}`;
        document.getElementById("prof_pic").src = db_img;
    }
</script>
<script type="module" src="../js/u_overlay_proper.js"></script>