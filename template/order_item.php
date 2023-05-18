<?php
    error_reporting(1);
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
                <span class="order-title">&#8369;<?php echo $_POST["total"] ?></span>
                <span><?php echo $_POST["item_count"] ?> items</span>
            </div>
        </div>
    </div>
</div>