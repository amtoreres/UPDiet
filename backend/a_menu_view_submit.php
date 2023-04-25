<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    //$uid = $_SESSION['admin']['u_id'];

    if(isset($_POST["menu_id"])) {
        $mid = $_POST["menu_id"];

        $q = "SELECT is_published FROM store_menu WHERE menu_id=$mid";
        $res = $db->query($q);
        $row = mysqli_fetch_array($res);

        $is_p = $row["is_published"] ? 0 : 1;

        $q = "UPDATE store_menu SET is_published=$is_p WHERE menu_id=$mid";
        $res = $db->query($q);
        
        echo $is_p;
    }

?>