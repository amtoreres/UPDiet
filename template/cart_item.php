<div class="item-content">
    <div class="item-img">
        <img src="../<?php echo $_POST["img"]; ?>">
    </div>
    <div class="item-info">
        <span><?php echo $_POST["name"]; ?></span>
        <span><?php echo $_POST["store_name"]; ?></span>
        <span>&#8369;<?php echo $_POST["price"]; ?></span>
    </div>
    <div class="item-control">
        <button class="control-button">
            <img src="../img/minus.png">
        </button>
        <span><?php echo $_POST["quantity"]; ?></span>
        <button class="control-button">
            <img src="../img/add.png">
        </button>
    </div>
</div>