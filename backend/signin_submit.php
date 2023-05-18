<?php

    class resp {
        public $op_status;
        public $msg;
    }

    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    // check if signin data is posted
    if(isset($_POST["submit"]))
    {
        $em = mysqli_real_escape_string($db, $_POST["email"]);
        $pw = md5($_POST["password"]);
        $typ = mysqli_real_escape_string($db, $_POST["u_type"]);
        
        $r = new resp();

        if($typ == "user") {
            if($_SESSION["u_signin_state"]) {
                // query account
                $q = "SELECT * from user where email='$em' && password='$pw' && u_type='$typ';";
                $res = $db->query($q);
                $rows = mysqli_fetch_array($res);
    
                // check if account exists
                if(is_array($rows))
                {
                    $_SESSION["user"]["u_id"] = $rows['u_id'];
                    $_SESSION["user"]["u_type"] = $typ;
                    
                    $r->op_status = 1;                      // return true if exists
                }
                else {
                    $r->op_status = 0;
                    $r->msg = "Invalid credentials.";
                } 
            }
            else {
                $usr = mysqli_real_escape_string($db, $_POST["username"]);
                $num = mysqli_real_escape_string($db, $_POST["c_num"]);

                // create account in db
                $q = "INSERT INTO user (email, password, u_type) VALUES ('$em', '$pw','$typ');";
                $res = $db->query($q);
                
                // get u_id
                $q = "SELECT * from user where email='$em' && password='$pw' && u_type='$typ';";
                $res = $db->query($q);

                $rows = mysqli_fetch_array($res);
                $uid = $rows['u_id'];
                
                $q = "INSERT INTO customer_info (u_id, username, c_num) VALUES ('$uid', '$usr', '$num');";
                $res = $db->query($q);
                
                $_SESSION["user"]["u_id"] = $uid;
                $_SESSION["user"]["u_type"] = $typ;
                
                $r->op_status = 1;
    
            }
        }
        elseif($typ == "admin") {
            if($_POST["form"] == "login") {
                $q = "SELECT * FROM user WHERE email='$em' && password='$pw' && u_type='$typ';";
                $res = $db -> query($q);
                $rows = mysqli_fetch_array($res);

                if(is_array($rows)) {
                    $_SESSION["admin"]["u_id"] = $rows['u_id'];
                    $_SESSION["admin"]["u_type"] = $typ;
                    
                    $r->op_status = 1;                      // return true if exists
                }
                else {
                    $r->op_status = 0;                      // otherwise false
                    $r->msg = "Invalid credentials.";
                } 
            }
            elseif($_POST["form"] == "signup") {
                $nm = mysqli_real_escape_string($db, $_POST["name"]);
                $num = mysqli_real_escape_string($db, $_POST["c_num"]);
                $loc = mysqli_real_escape_string($db, $_POST["location"]);
                
                // create account in db
                $q = "INSERT INTO user (email, password, u_type) VALUES ('$em', '$pw', '$typ');";
                $res = $db -> query($q);
                
                // create account in db
                $q = "SELECT u_id FROM user WHERE email='$em' && password='$pw' && u_type='$typ';";
                $res = $db -> query($q);

                $rows = mysqli_fetch_array($res);
                $uid = $rows['u_id'];
                
                // create account in db
                $q = "INSERT INTO store_info (u_id, name, c_num, location) VALUES ('$uid','$nm', '$num', '$loc');";
                $res = $db -> query($q);
                
                $_SESSION["admin"]["u_id"] = $uid;
                $_SESSION["admin"]["u_type"] = $typ;
                
                $r->op_status = 1;
            }
        }

        echo json_encode($r);
    }

?>