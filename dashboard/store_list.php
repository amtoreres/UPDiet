<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    if(isset($_POST["fetch"])) {
        $uid = $_POST["u_id"];
        $typ = $_POST["type"];

        $q = "SELECT * FROM store_menu WHERE u_id=$uid && type='$typ';";
        $res = $db->query($q);
    }

?>
<div class="list-content">
    
</div>
<script>
    var ka = [];

    <?php 
    while($row = $res->fetch_assoc()) {
        echo "ka.push(".json_encode($row).");";
    }
    ?>

    for(var i=0;i<10;i++){
        ka.push(ka[0]);
    }
</script>
<script src="../js/d_store_list.js"></script>