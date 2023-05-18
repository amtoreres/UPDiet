<?php
    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    $q = "SELECT * FROM purchase WHERE t_id=".$_POST["t_id"].";";
    $rest = $db->query($q);
    $rowt = mysqli_fetch_array($rest);

    $q = "SELECT * FROM user WHERE u_id=".$rowt["u_id"].";";
    $resu = $db->query($q);
    $rowu = mysqli_fetch_array($resu);

    $q = "SELECT * FROM customer_info WHERE u_id=".$rowt["u_id"].";";
    $resc = $db->query($q);
    $rowc = mysqli_fetch_array($resc);
?>
<div class="item-content">
    <div class="item-image">
        <img src="../<?php echo $_POST["food_img"]."?".filemtime("../".$_POST["food_img"]); ?>" >
    </div>
    <div class="item-info">
        <span class="info-title"><?php echo $_POST["food_name"] ?></span>
        <span class="info-subtitle">Quantity: <?php echo $_POST["quantity"] ?></span>
        <span class="info-subtitle">Total: &#8369;<?php echo number_format(floatval($_POST["price"]) * intval($_POST["quantity"]), 2, ".", ",") ?></span>
        <span class="info-subtitle">Menu ID: <?php echo $_POST["menu_id"] ?></span>
    </div>
    <div class="item-source">
        <span class="info-title">Recipient: <?php echo $rowc["username"] ?></span>
        <span class="info-subtitle">Location: <?php echo $rowt["location"] ?></span>
        <span class="info-subtitle">Email: <?php echo $rowu["email"] ?></span>
        <span class="info-subtitle">Date: <?php echo $rowt["date"] ?></span>
    </div>
    <div class="item-remarks">
        <span class="info-title info-order">Status: <?php echo $_POST["order_status"] ?></span>
        <span class="info-subtitle">Notes: <?php echo $rowt["remarks"] ?></span>
    </div>
    <div class="item-control" id="<?php echo $_POST["ti_id"]; ?>"> 
    </div>
</div>