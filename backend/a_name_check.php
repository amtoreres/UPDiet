<?php

    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    // check if email is posted
    if(isset($_POST["name"]))
    {                    
        $q = "SELECT * from store_info where name='".$_POST["name"]."';";
        $res = $db->query($q);
        $rows = mysqli_fetch_array($res);
    
        $r = new resp();
        if(is_array($rows)) $r->op_status = 0;  // return false if name exists
        else $r->op_status = 1;                 // otherwise true

        echo json_encode($r);
    }
?>