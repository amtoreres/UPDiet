<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();
    //comment
    //comment 2

    //$uid = $_SESSION['admin']['u_id'];

    if(isset($_POST["menu_id"])) {
        $mid = $_POST["menu_id"];
        
        $q = "SELECT img FROM store_menu WHERE menu_id=$mid;";
        $res = $db->query($q);
        $row = mysqli_fetch_array($res);

        $i = $row["img"];

        // remove menu item picture
        if($i) {
            if(file_exists("../".$i)) {
                unlink("../".$i);
            }
        }

        $q = "DELETE FROM store_menu WHERE menu_id=$mid;";
        $res = $db->query($q);
        
        echo $is_p;
    }

?>