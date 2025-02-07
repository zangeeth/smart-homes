<?php
// Database connection parameters
include("connection.php");

$sensor_id = sensor_id($con, $room_id, 'Hydrogen');

// Fetch data
$sql = "SELECT * FROM gas WHERE sensor_id=$sensor_id ORDER BY id DESC LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Extract and echo the last values
    $h2 = $row['h2'];
    $lpg = $row['lpg'];
    $co = $row['co'];
    $alcohol = $row['alcohol'];
    $propane = $row['propane'];
  
} else {
  echo "No data found";
}

// Close the connection
$con->close();

?>