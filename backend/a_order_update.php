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

        $q = "SELECT order_status FROM purchase_info WHERE ti_id=$tiid;";
        $resq = $db->query($q);
        $rowq = mysqli_fetch_array($resq);

        if($rowq["order_status"] == "Pending" || $ord == "Completed") {
            $q = "UPDATE purchase_info SET order_status='$ord'";
    
            if($ord == "Cancelled" || $ord == "On Delivery") {
                $q .= ", is_notify=1";
            }
            
            $q .= " WHERE ti_id=$tiid;";
            $res = $db->query($q);

            echo json_encode(array("is_update"=>true));
        }
        else  echo json_encode(array("is_update"=>false));
    }

?>