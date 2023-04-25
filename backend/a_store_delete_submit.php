<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    //$uid = $_SESSION['admin']['u_id'];

    function remove_files($dir) {
        $files = glob($dir."*", GLOB_MARK);

        foreach($files as $file) {
            if(is_dir($file)) remove_files($file);
            else unlink($file);
        }

        rmdir($dir);
    }

    if(isset($_POST["u_id"])) {
        $uid = $_POST["u_id"];
        
        $q = "SELECT prof_pic, prof_cover FROM store_info WHERE u_id=$uid;";
        $res = $db->query($q);
        $row = mysqli_fetch_array($res);

        $pf = $row["prof_pic"];
        $pc = $row["prof_cover"];

        // remove store picture
        if($pf) {
            if(file_exists("../".$pf)) {
                unlink("../".$pf);
            }
        }

        // remove store cover
        if($pc) {
            if(file_exists("../".$pc)) {
                unlink("../".$pc);
            }
        }

        remove_files("../uploads/img/store/menu/$uid/");
            

        $q = "DELETE FROM user WHERE u_id=$uid;";
        $res = $db->query($q);

        $q = "DELETE FROM store_info WHERE u_id=$uid;";
        $res = $db->query($q);

        $q = "DELETE FROM store_menu WHERE u_id=$uid;";
        $res = $db->query($q);
    }

?>