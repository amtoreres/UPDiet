<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start(); 

    $uid = $_SESSION['user']['u_id'];

    $q = "SELECT * from customer_info where u_id='$uid';";
    $resi = $db -> query($q);
    $rowi = mysqli_fetch_array($resi);
    
    $usr = $rowi["username"];

    $q = "SELECT * FROM store_info WHERE is_published=1;";
    $res = $db->query($q);
?>
<link rel="stylesheet" href="../css/d_store_proper.css">
<div class="content-content">
    <div class="content-header">
        <div class="content-title">
            <img src="../img/logo.png">
            <div class="title-detail">
                <span class="title-title">Hi, <?php echo $usr; ?>!</span>
                <span class="title-subtitle">Welcome to your dashboard.</span>
            </div>
        </div>
    </div>
    <div class="content-store">

    </div>
</div>
<script>
    var ka = [];

    <?php 
    while($row = $res->fetch_assoc()) {
        echo "ka.push(".json_encode($row).");";
    }
    ?>

    //console.log(ka);
</script>
<script src="../js/d_store_proper.js"></script>
