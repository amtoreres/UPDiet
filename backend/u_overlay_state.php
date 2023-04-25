<?php
    class resp {
        public $op_status;
    }

    error_reporting(0);
    session_start();

    // checks if overlay state is posted
    if(isset($_POST["u_overlay_state"]))
    {
        // change current form state on signin page
        $_SESSION["u_overlay_state"] = $_POST["u_overlay_state"];

        $r = new resp();
        $r->op_status = 1;
        
        echo json_encode($r);
    }

?>