<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "updiet";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname); // connecting 
// Check connection
if($db->connect_error) {       //checking connection to DB	
    die("Connection failed: ".$db->connect_error);
}

?>