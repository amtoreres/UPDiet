<?php
    class resp {
        public $op_status;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION['user']['u_id'];

    // check if profile data is posted
    if(isset($_POST["submit-prof"]))
    {
        $usr = mysqli_real_escape_string($db, $_POST['username']);
        $num = mysqli_real_escape_string($db, $_POST['c_num']);

        $q = "UPDATE customer_info SET username='$usr', c_num='$num'";
        
        // check if image is uploaded
        if(is_uploaded_file($_FILES['prof_pic']['tmp_name']))
        {
            $dir = "uploads/img/user/prof-pic/";
            if(!is_dir("../".$dir)) mkdir("../".$dir, 0777, true);
            
            // overwrite if image exists
            if(file_exists($dir.$uid)) {
                chmod($dir.$uid,0755);
                unlink($dir.$uid);
            }
            
            // move file to upload directory
            move_uploaded_file($_FILES["prof_pic"]["tmp_name"], "../".$dir.$uid);
        
            $q .= ", prof_pic='$dir$uid'";
        }           
        
        $q .= " WHERE u_id='".$uid."';";
        $res = $db -> query($q);

        $r = new resp();
        $r->op_status = 1;
        echo json_encode($r);
    }

?>