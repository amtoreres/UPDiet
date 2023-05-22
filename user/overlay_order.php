<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    $uid = $_SESSION["user"]["u_id"];

    $q = "SELECT b.* FROM purchase AS a, purchase_info AS b WHERE a.u_id=$uid && a.t_id=b.t_id && b.order_status='Pending' ORDER BY ti_id DESC;";
    $res = $db->query($q);

?>
<link rel="stylesheet" href="../css/u_overlay_order.css">
<div class="preview-content">
    <div class="preview-list">

    </div>
    <div class="preview-control">
        <span class="preview-redirect">View all</span>
    </div>
</div>
<script>
    var kop = [];

    <?php 
    while($row = $res->fetch_assoc()) {
        echo "kop.push(".json_encode($row).");";
    }
    ?>
    //console.log(kop);
</script>
<script src="../js/u_overlay_order.js"></script>