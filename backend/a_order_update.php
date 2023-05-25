<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    if(isset($_POST["ti_id"])) {
        $tiid = $_POST["ti_id"];
        $ord = $_POST["order_status"];

        $q = "UPDATE purchase_info SET order_status='$ord'";

        if($ord == "Cancelled" || $ord == "On Delivery") {
            $q .= ", is_notify=1";
        }
        
        
        $q .= " WHERE ti_id=$tiid;";
        $res = $db->query($q);
    }

?>