<?php
    class resp {
        public $op_status;
        public $t_id;
    }

    include("../conn/connect.php");

    error_reporting(1);
    session_start();

    if(isset($_POST["checkout"])) {
        $loc = mysqli_real_escape_string($db, $_POST["location"]);
        $uid = $_SESSION["user"]["u_id"];

        $q = "INSERT INTO purchase (u_id) VALUES ($uid);";
        $res1 = $db->query($q);

        $q = "SELECT * FROM purchase ORDER BY date DESC LIMIT 1;";
        $res2 = $db->query($q);
        $row = mysqli_fetch_array($res2);

        $tid = $row["t_id"];

        $q = "SELECT * FROM customer_cart WHERE u_id=$uid;";
        $resc = $db->query($q);
        $itm = mysqli_num_rows($resc);

        //echo mysqli_num_rows($resc);

        if(mysqli_num_rows($resc) > 0) {
            while($row = mysqli_fetch_assoc($resc)) {
                $mid = $row["menu_id"];

                $q = "SELECT * FROM store_menu WHERE menu_id=$mid;";
                $res3 = $db->query($q);
                $rowm = mysqli_fetch_array($res3);

                $q = "SELECT * FROM store_info WHERE u_id=".$rowm["u_id"].";";
                $resm = $db->query($q);
                $rowm2 = mysqli_fetch_array($resm);

                $q = "INSERT INTO purchase_info (t_id, order_status, food_name, store_name, price, quantity, food_img, store_id, menu_id) 
                      VALUES ($tid, 'Pending', '".$rowm["name"]."', '".$rowm2["name"]."', ".$rowm["price"].", ".$row["quantity"].", '".$rowm["img"]."', ".$rowm["u_id"].", ".$mid.");";
                $res4 = $db->query($q);
            }
        }

        $q = "SELECT COUNT(DISTINCT b.u_id) AS store_count FROM customer_cart AS a, store_menu AS b WHERE a.menu_id=b.menu_id;";
        $resd = $db->query($q);
        $rowd = mysqli_fetch_array($resd);

        $q = "UPDATE purchase SET item_count=$itm, location='$loc', remarks='".$_POST["remarks"]."' WHERE t_id=$tid;";
        $res5 = $db->query($q);

        $q = "DELETE FROM customer_cart WHERE u_id=$uid;";
        $res6 = $db->query($q);

        $r = new resp();
        $r->t_id = $tid;

        echo json_encode($r);
    }

?>