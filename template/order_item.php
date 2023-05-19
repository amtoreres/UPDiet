<?php

    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    $tid = $_POST["t_id"];

    $q = "SELECT COUNT(DISTINCT b.u_id) AS store_count FROM purchase_info AS a, store_menu AS b WHERE a.menu_id=b.menu_id && a.order_status!='Cancelled';";
    $resd = $db->query($q);
    $rowd = mysqli_fetch_array($resd);

    $df = 15 * $rowd["store_count"];

    $q = "SELECT SUM(price) AS total FROM purchase_info WHERE t_id=$tid && order_status!='Cancelled';";
    $rest = $db->query($q);
    $rowt = mysqli_fetch_array($rest);

    $total = $df + $rowt["total"];
?>
<div class="order-item"
     id="o-<?php echo $_POST["t_id"] ?>">
    <div class="order-container">
        <div class="order-detail">
            <div class="order-header order-text">
                <span class="order-title"><?php echo date_format(date_create($_POST["date"]), "F j, Y @ G:i") ?></span>
                <span><?php echo $_POST["location"] ?></span>
            </div>
            <div class="order-price order-text order-right">
                <span class="order-title">&#8369;<?php echo number_format(floatval($total), 2, ".", ",") ?></span>
                <span><?php echo $_POST["item_count"] ?> items</span>
            </div>
        </div>
    </div>
</div>