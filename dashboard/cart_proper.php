<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION['user']['u_id'];

    $q = "SELECT a.*, b.quantity, c.name AS store_name FROM store_menu AS a, orders AS b, store_info AS c WHERE a.menu_id=b.menu_id && b.u_id=1 && b.status='cart' && a.u_id=c.u_id ORDER BY b.date;";
    $res = $db->query($q);

?>
<link rel="stylesheet" href="../css/d_cart_proper.css">
<div class="content-content">
    <div class="content-header">
        <div class="content-title">
            <span>My Cart</span>
        </div>
    </div>
    <div class="content-cart">

    </div>
</div>
<script>
    var ka = [];

    <?php 
    while($row = $res->fetch_assoc()) {
        echo "ka.push(".json_encode($row).");";
    }
    ?>

    //console.log(ka);
</script>
<script src="../js/d_cart_proper.js"></script>