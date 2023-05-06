<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    $uid = $_SESSION['user']['u_id'];

    $q = "SELECT * FROM purchase WHERE u_id=$uid ORDER BY date DESC;";
    $res = $db->query($q);

?>
<div class="order-content">
    <div class="side-header">
        <div class="side-title">
            <span>My Orders</span>
        </div>
    </div>
    <div class="order-items">

    </div>
</div>
<script>
    var ko = [];

    <?php 
    while($row = $res->fetch_assoc()) {
        echo "ko.push(".json_encode($row).");";
    }
    ?>
    //console.log(ko);
</script>
<script src="../js/d_order_proper.js"></script>