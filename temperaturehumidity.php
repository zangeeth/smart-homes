<?php
// Database connection parameters
include("connection.php");

$sensor_id = sensor_id($con, $room_id, 'Temperature');

// Fetch data
$sql = "SELECT temperature, humidity FROM temperaturehumidity WHERE sensor_id=$sensor_id ORDER BY id DESC LIMIT 1";
//echo $sql;
$result = $con->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Extract and echo the last values
  $temperature = $row['temperature'];
  $humidity = $row['humidity'];
} else {
  echo "No data found";
}

// Close the connection
$con->close();

?>