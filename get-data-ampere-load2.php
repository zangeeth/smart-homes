<?php
header('Content-Type: application/json');

// Database connection parameters
include("connection.php");
include("functions.php");

$sensor_id = sensor_id2($con, $room_id, 'Current');

// Fetch data
$sql = "SELECT value, timestamp FROM current WHERE sensor_id=$sensor_id ORDER BY id DESC LIMIT 50;";
$result = $con->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      
        $time = strtotime($row['timestamp']) * 1000;
        $data[] = [$time, ($row['value'])];
    }
} else {
    echo "0 results";
}


$con->close();

echo json_encode($data);
?>
