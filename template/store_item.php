<div class="item-content">
    <div class="item-image">
        <div>
            <img src="../<?php echo $_POST["img"]."?".filemtime("../".$_POST["img"]); ?>" >
        </div>
    </div>
    <div class="spacer-1"></div>
    <div class="spacer-2"></div>
    <div class="item-info">
        <div class="info-container">
            <div class="menu-container">
                <span class="menu-name"><?php echo $_POST["name"] ?></span>
                <span class="menu-price">&#8369; <?php echo $_POST["price"] ?></span>
            </div>
        </div>
    </div>
    <div class="item-control" id="<?php echo $_POST["menu_id"]; ?>">
    </div>
</div>