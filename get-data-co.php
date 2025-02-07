<?php
header('Content-Type: application/json');

// Database connection parameters
include("connection.php");
include("functions.php");

$sensor_id = sensor_id($con, $room_id, 'LPG');

// Fetch data - load 1
$sql = "SELECT h2, lpg, co, alcohol, propane, timestamp FROM gas WHERE sensor_id=$sensor_id ORDER BY id DESC LIMIT 50";
$result = $con->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      
        $time = strtotime($row['timestamp']) * 1000;
        $data[] = [$time, ($row['co'])];
    }
} else {
    echo "0 results";
}


$con->close();

echo json_encode($data);
?>
