<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION["user"]["u_id"];

    $q = "UPDATE purchase_info SET is_notify=0;";
    $res = $db->query($q);
?>