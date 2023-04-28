<?php
    class resp {
        public $op_status;
    }

    error_reporting(0);
    session_start();

    // checks if overlay state is posted
    if(isset($_POST["store"]))
    {
        $uid = explode("-", $_POST["store"]);

        // change current form state on signin page
        $_SESSION["store"] = $uid[1];

        $r = new resp();
        $r->op_status = 1;
        
        echo json_encode($r);
    }

?>