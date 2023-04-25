<?php
    class resp {
        public $op_status = 0;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    // check if pw data is posted
    if(isset($_POST["submit-pw"]))
    {
        $pw = md5($_POST['pw-new']);
        if($_POST["type"] == "user") $uid = $_SESSION["user"]['u_id'];
        elseif($_POST["type"] == "admin") $uid = $_SESSION["admin"]['u_id'];
    
        // update pw from posted data
        $q = "UPDATE user SET password='$pw' WHERE u_id='$uid';";
        $res = $db -> query($q);
    
        $r = new resp();
        $r->op_status = 1;
    
        echo json_encode($r);
    }

    //header("location:browse.php");
?>