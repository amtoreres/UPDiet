<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    if(isset($_POST["u_id"])) {
        $uid = $_POST["u_id"];
        $mid = $_POST["menu_id"];

        $q = "DELETE FROM customer_cart WHERE u_id=$uid && menu_id=$mid;";
        $res = $db->query($q);
    }

?>