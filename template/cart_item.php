<div class="cart-item">
    <div class="cart-container">
        <div class="cart-img">
            <img src="../<?php echo $_POST["img"]."?".filemtime("../".$_POST["img"]); ?>" >
        </div>
        <div class="cart-info">
            <div class="cart-detail">
                <span class="cart-title"><?php echo $_POST["name"] ?></span>
                <span><?php echo $_POST["store_name"] ?></span>
                <span>&#8369;<?php echo $_POST["price"] ?></span>
            </div>
            <div class="cart-control" id="c-<?php echo $_POST["u_id"]; ?>-<?php echo $_POST["menu_id"]; ?>">
                <span class="cart-button cart-sub"><img src="../img/minus.png"></span>
                <span class="cart-quantity"><?php echo $_POST["quantity"] ?></span>
                <span class="cart-button cart-add"><img src="../img/add.png"></span>
                <span class="cart-button cart-rem"><img src="../img/delete.png"></span>
            </div>
        </div>
    </div>
</div>