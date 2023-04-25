<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION['admin']['u_id'];

    if(isset($_POST["fetch-list"])) {
        $si = $_POST["search-input"];
        $ft = $_POST["filter-type"];
        $sm = $_POST["sort-mode"];
        $sp = $_POST["sort-priority"];

        $q = "SELECT * from store_menu WHERE u_id=$uid";

        if($si !== "") $q .= " && name LIKE '%$si%'";
        if($ft != "All") $q .= " && type='$ft'";

        $q .= " ORDER BY ";

        switch($sm) {
            case 0: $q .= "date"; break;
            case 1: $q .= "name"; break;
            case 2: $q .= "type"; break;
        }
        if($sp) $q .= " DESC";

        $q .= ";";
        $res = $db->query($q);
    }

?>
<link rel="stylesheet" href="../css/a_menu_list.css" />
<div class="list-content">
    
</div>
<script>
    var ka = [];

    <?php 
    while($row = $res->fetch_assoc()) {
        echo "ka.push(".json_encode($row).");";
    }
    ?>
</script>
<script src="../js/a_menu_list.js"></script>