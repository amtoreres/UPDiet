<?php

    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    // check if email is posted
    if(isset($_POST["email"]))
    {                    
        $em = mysqli_escape_string($db, $_POST["email"]);
        $typ = $_POST["u_type"];

        $q = "SELECT * from user where email='$em' && u_type='$typ';";
        $res = $db -> query($q);
        $rows = mysqli_fetch_array($res);
    
        $r = new resp();
        if(is_array($rows)) $r->op_status = 0;  // return false if email exists
        else $r->op_status = 1;                 // otherwise true

        echo json_encode($r);
    }
?>