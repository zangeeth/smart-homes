<?php
//MySQL Object-Oriented
$servername = "localhost:3306";
$username = "user_name";
$password = "password";
$dbname = "database_name";

// Create connection
global $con;
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";
?>
