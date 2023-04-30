<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    if(isset($_POST["fetch"])) {
        $uid = $_POST["u_id"];
        $typ = $_POST["type"];

        $q = "SELECT * FROM store_menu WHERE u_id=$uid && type='$typ';";
        $res = $db->query($q);
    }

?>