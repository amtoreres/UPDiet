<?php

    class resp {
        public $op_status;
        public $state;
    }

    error_reporting(0);
    session_start();

    // check if signin state is posted
    if(isset($_POST["u_signin_state"]))
    {
        $_SESSION["u_signin_state"] = $_POST["u_signin_state"];

        $r = new resp();
        $r->op_status = 1;
        $r->state = $_SESSION["u_signin_state"];
        
        echo json_encode($r);
    }
?>