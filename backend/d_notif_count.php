<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION["user"]["u_id"];

    $q = "SELECT COUNT(a.ti_id) AS count FROM purchase_info AS a, purchase AS b WHERE b.u_id=$uid && a.t_id=b.t_id && a.is_notify=1 ORDER BY ti_id;";
    $res = $db->query($q);
    $row = mysqli_fetch_array($res);

    echo json_encode(array("count"=>$row["count"]));
?>