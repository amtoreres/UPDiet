<?php
    class resp {
        public $op_status;
        public $is_exist;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $r = new resp();
    $r->is_exist = false;

    if(isset($_POST["menu_id"])) {
        $mid = $_POST["menu_id"];

        $q = "SELECT * FROM store_menu WHERE menu_id=$mid;";
        $res = $db->query($q);
        $rows = mysqli_fetch_array($res);

        if(mysqli_num_rows($res) > 0) {
            $r->is_exist = true;
        }
    }

    echo json_encode($r);

?>