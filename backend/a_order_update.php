<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $r = new resp();

    if(isset($_POST["ti_id"])) {
        $tiid = $_POST["ti_id"];
        $ord = $_POST["order_status"];

        $q = "UPDATE purchase_info SET order_status='$ord' WHERE ti_id=$tiid;";
        $res = $db->query($q);
    }

    echo json_encode($r);

?>