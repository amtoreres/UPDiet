<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION['admin']['u_id'];
    $nm = mysqli_real_escape_string($db, $_POST['name']);
    $num = mysqli_real_escape_string($db, $_POST['c_num']);
    $loc = mysqli_real_escape_string($db, $_POST['location']);
    
    $q = "UPDATE store_info SET name='$nm', c_num='$num', location='$loc'"; 

    $dir_p = "uploads/img/store/prof_pic/";  

    // check if store picture is uploaded
    if(is_uploaded_file($_FILES['prof_pic']['tmp_name']))
    {
        if(!is_dir("../".$dir_p)) mkdir("../".$dir_p, 0777, true);
        
        // overwrite if image exists
        if(file_exists($dir_p.$uid)) {
            chmod($dir_p.$uid,0755);
            unlink($dir_p.$uid);
        }
        
        // move file to upload directory
        move_uploaded_file($_FILES["prof_pic"]["tmp_name"], "../".$dir_p.$uid);
    
        $q .= ", prof_pic='$dir_p$uid'";
    }  

    $dir_c = "uploads/img/store/prof_cover/";  

    // check if store picture is uploaded
    if(is_uploaded_file($_FILES['prof_cover']['tmp_name']))
    {
        if(!is_dir("../".$dir_c)) mkdir("../".$dir_c, 0777, true);
        
        // overwrite if image exists
        if(file_exists($dir_c.$uid)) {
            chmod($dir_c.$uid,0755);
            unlink($dir_c.$uid);
        }
        
        // move file to upload directory
        move_uploaded_file($_FILES["prof_cover"]["tmp_name"], "../".$dir_c.$uid);
    
        $q .= ", prof_cover='$dir_c$uid'";
    }  
    
    $q .= " WHERE u_id=$uid;";
    $res = $db->query($q);
?>