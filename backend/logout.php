<?php
    class resp {
        public $op_status;
    }

    session_start();

    if(isset($_POST["u_type"])) {
        if($_POST["u_type"] == "user") unset($_SESSION["user"]);
        elseif($_POST["u_type"] == "admin") unset($_SESSION["admin"]);
    }
    
            
    $r->op_status = 1;
    echo json_encode($r);

?>