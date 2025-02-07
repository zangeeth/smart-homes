<?php
// Database connection parameters
include("connection.php");
include("functions.php");

$sensor_id = sensor_id($con, $room_id, 'Motion');

// Fetch data
$sql = "SELECT * FROM motion WHERE sensor_id=$sensor_id ORDER BY id DESC LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Extract and echo the last values
  $motion = $row['value'];
  $timestamp_motion = $row['timestamp'];
  
  

} else {
  //echo "No data found";
}

if($motion==1 && strtotime($timestamp_motion) > strtotime('-120 seconds')){echo "<h3>Motion Detected!</h3>";}else{echo "<h3>No Motion!</h3>";}

if($motion==1 && strtotime($timestamp_motion) < strtotime('-300 seconds')){

    $sql_lights_off = "UPDATE `Outputs` SET `state` = 0;";
    $con->query($sql_lights_off);

}

echo "<p>Last motion detected time: $timestamp_motion</p>";

// Close the connection
$con->close();

?>
