<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    $tid = explode("-", $_POST["t_id"])[1];

    $q = "SELECT * FROM purchase_info WHERE t_id=$tid;";
    $res = $db->query($q);

    $q = "SELECT COUNT(DISTINCT b.u_id) AS store_count FROM purchase_info AS a, store_menu AS b WHERE a.menu_id=b.menu_id && a.order_status!='Cancelled';";
    $resd = $db->query($q);
    $rowd = mysqli_fetch_array($resd);

    $df = 15 * $rowd["store_count"];

?>
<div class="o-item-content">
    <div class="o-item-control">
        <span id="back-control"><img src="../img/left-arrow.png"><span>Back</span></span>
    </div>
    <div class="o-item-items">

    </div>
    <div class="o-form-spacer"></div>
    <div class="o-item-fees">
        <!-- delivery fee -->
        <span class="form-label">Delivery Fee:</span>
        <span class="form-value">&#8369;<?php echo number_format(floatval($df), 2, ".", ",") ; ?></span>
    </div>
</div>
<script>
    var koi = [];

    <?php 
    while($row = $res->fetch_assoc()) {
        echo "koi.push(".json_encode($row).");";
    }
    ?>
    console.log(koi);
</script>
<script src="../js/d_order_items.js"></script>