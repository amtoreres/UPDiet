<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION['admin']['u_id'];
    $mid = $_POST['menu_id'];
    $nm = mysqli_real_escape_string($db, $_POST['name']);
    $typ = mysqli_real_escape_string($db, $_POST['type']);
    $prc = mysqli_real_escape_string($db, $_POST['price']);

    // check if new item
    if(isset($_POST["submit-add"]))
    {
        $q = "INSERT INTO store_menu (name, type, price, u_id) VALUES ('$nm', '$typ', '$prc', '$uid');";         
        $res = $db->query($q);

        $q = "SELECT * from store_menu ORDER BY date DESC";
        $res = $db->query($q);
        //$rows = mysqli_fetch_array($res);

        if($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                $mid = $row["menu_id"];
                echo "1";
                break;
            }
        }

        $dir = "uploads/img/store/menu/$uid/";
        if(!is_dir("../".$dir)) mkdir("../".$dir, 0777, true);
        
        // overwrite if image exists
        if(file_exists($dir.$mid)) {
            chmod($dir.$mid, 0755);
            unlink($dir.$mid);
        }

        move_uploaded_file($_FILES["img"]["tmp_name"], "../".$dir.$mid);

        $q = "UPDATE store_menu SET img='".$dir.$mid."' WHERE menu_id=$mid;";
        $res = $db->query($q);

        $r = new resp();
        $r->op_status = 1;

        echo json_encode($r);
    }
    // check if update item
    elseif(isset($_POST["submit-edit"]))
    {     
        $q = "UPDATE store_menu SET name='$nm', type='$typ', price='$prc'"; 
        $dir = "uploads/img/store/menu/$uid/";  

        // check if image is uploaded
        if(is_uploaded_file($_FILES['img']['tmp_name']))
        {
            if(!is_dir("../".$dir)) mkdir("../".$dir, 0777, true);
            
            // overwrite if image exists
            if(file_exists($dir.$mid)) {
                chmod($dir.$mid,0755);
                unlink($dir.$mid);
            }
            
            // move file to upload directory
            move_uploaded_file($_FILES["img"]["tmp_name"], "../".$dir.$mid);
        
            $q .= ", img='$dir$mid'";
        }  
        
        $q .= " WHERE menu_id=$mid;";
        $res = $db->query($q);

        $r = new resp();
        $r->op_status = 1;

        echo $q;

        //echo json_encode($r);
    }

?>