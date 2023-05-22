<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION["user"]["u_id"];

    $q = "SELECT a.order_status, a.t_id, a.food_name, a.quantity, a.store_name, a.price FROM purchase_info AS a, purchase AS b WHERE b.u_id=$uid && a.t_id=b.t_id && a.is_notify=1 ORDER BY ti_id;";
    $res = $db->query($q);

    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            echo json_encode($row);
            break;
        }
    }
?>