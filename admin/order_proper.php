<?php
    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    $uid = $_SESSION["admin"]["u_id"];

    $q = "SELECT * FROM purchase_info WHERE store_id=$uid ORDER BY t_id DESC;";
    $res = $db->query($q);
?>
<link rel="stylesheet" href="../css/a_order.css" />
<div class="order-content">
    <div class="order-header">
        <span class="reload-trigger">You have new orders. Reload page to update list.</span>
    </div>
    <div class="order-list"></div>
</div>
<script>
    var kao = [];

    <?php 
    while($row = $res->fetch_assoc()) {
        echo "kao.push(".json_encode($row).");";
    }
    ?>
    console.log(kao);
</script>
<script type="module" src="../js/a_order_proper.js"></script>