<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION['admin']['u_id'];

    if(isset($_POST["submit-view"])) {
        $q = "SELECT COUNT(menu_id) as total FROM store_menu WHERE u_id=$uid && is_published=1;";
        $res = $db->query($q);
        $row = mysqli_fetch_array($res);

        if($row["total"] > 0) {
            $q = "SELECT prof_pic, prof_cover FROM store_info WHERE u_id=$uid;";
            $res = $db->query($q);
            $row = mysqli_fetch_array($res);

            if($row["prof_pic"] && $row["prof_cover"]) {
                $q = "SELECT is_published FROM store_info WHERE u_id=$uid;";
                $res = $db->query($q);
                $row = mysqli_fetch_array($res);
        
                if(isset($_POST["v"])) $is_p = $row["is_published"];
                else $is_p = $row["is_published"] ? 0 : 1;
        
                $q = "UPDATE store_info SET is_published=$is_p WHERE u_id=$uid";
                $res = $db->query($q);
                
                echo $is_p;
            }
            else echo 0;
        }
        else echo 0;
    }

?>