<?php
//MySQL Object-Oriented
$servername = "localhost:3306";
$username = "sangeeth_esp_user";
$password = "&-2A4IsKSTC{XA5ZB[{mLQR]";
$dbname = "sangeeth_esp";

// Create connection
global $con;
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";
?>
