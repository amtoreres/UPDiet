<?php
    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    $tid = $_POST["t_id"];

    $q = "SELECT * FROM purchase WHERE t_id=$tid;";
    $rest = $db->query($q);
    $rowt = mysqli_fetch_array($rest);

    $q = "SELECT SUM(price) AS total FROM purchase_info WHERE t_id=$tid && order_status!='Cancelled';";
    $rest = $db->query($q);
    $rowt = mysqli_fetch_array($rest);
?>
<div class="preview-item"
     id="t-<?php echo $_POST["t_id"] ?>">
    <div class="preview-container">
        <div class="preview-detail">
            <div class="preview-header preview-text">
                <span class="preview-title"><span class="title-bold"><?php echo $_POST["food_name"]; ?> </span><span class="title-normal">x<?php echo $_POST["quantity"]; ?></span></span>
                <span><?php echo $_POST["store_name"] ?></span>
            </div>
            <div class="preview-right preview-text">
                <span class="preview-title">&#8369;<?php echo number_format(floatval($rowt["total"]), 2, ".", ","); ?></span>
                <span><span class="title-italic">+ delivery fee</span></span>
            </div>
        </div>
    </div>
</div>