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

?>
<div class="o-item-content">
    <div class="o-item-items">

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