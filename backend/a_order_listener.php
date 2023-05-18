<?php
    class resp {
        public $op_status;
        public $latest;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $r = new resp();
    
    $q = "SELECT ti_id FROM purchase_info ORDER BY ti_id DESC LIMIT 1;";
    $res = $db->query($q);
    
    if(mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        $r->latest = $row["ti_id"];
    }
    else $r->latest = -1;

    echo json_encode($r);
?>