<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start(); 

    $uid = $_SESSION['user']['u_id'];

    $q = "SELECT * FROM store_info WHERE is_published=1;";
    $res = $db->query($q);
?>
<link rel="stylesheet" href="../css/d_store_proper.css">
<div class="content-content">
    <div class="content-header">
        <div class="content-title">
            <span>Discover</span>
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

    console.log(ka);
</script>
<script src="../js/d_store_proper.js"></script>
