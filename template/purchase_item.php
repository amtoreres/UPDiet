<div class="o-item-item">
    <div class="o-item-container">
        <div class="o-item-img">
            <img src="../<?php echo $_POST["food_img"]."?".filemtime("../".$_POST["food_img"]); ?>" >
        </div>
        <div class="o-item-info">
            <div class="o-item-detail">
                <span class="o-item-title"><?php echo $_POST["food_name"] ?><span> x <?php echo $_POST["quantity"] ?></span></span>
                <span><?php echo $_POST["store_name"] ?></span>
                <span>&#8369;<?php echo number_format(floatval($_POST["price"]) * intval($_POST["quantity"]), 2, ".", ",") ?></span>
            </div>
            <div class="o-item-status">
                <span>Status: <?php echo $_POST["order_status"] ?></span>
            </div>
        </div>
    </div>
</div>