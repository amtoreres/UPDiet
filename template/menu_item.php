<div class="item-content">
    <div class="item-image">
        <img src="../<?php echo $_POST["img"]."?".filemtime("../".$_POST["img"]); ?>" >
    </div>
    <div class="item-info">
        <span class="info-title"><?php echo $_POST["name"] ?></span>
        <span class="info-subtitle"><?php echo $_POST["type"] ?></span>
        <span class="info-subtitle"><?php echo $_POST["date"] ?></span>
        <span class="info-subtitle"><?php echo $_POST["menu_id"] ?></span>
    </div>
    <div class="item-control" id="<?php echo $_POST["menu_id"]; ?>">
        <button type="button" class="icon-button view-control" title="Changes visibility">
            <img src="../img/view-<?php echo $_POST["is_published"] ? "show" : "hide"; ?>.png">
        </button>
        <button type="button" class="icon-button edit-control" title="Edit">
            <img src="../img/edit.png">
        </button>
        <button type="button" class="icon-button del-control" title="Delete">
            <img src="../img/delete.png">
        </button>
    </div>
</div>