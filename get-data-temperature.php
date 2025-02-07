<?php
header('Content-Type: application/json');

// Database connection parameters
include("connection.php");

// Fetch data - load 1
$sql = "SELECT temperature, humidity, timestamp FROM temperaturehumidity WHERE name='load1' ORDER BY id DESC LIMIT 50";
$result = $con->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      
        $time = strtotime($row['timestamp']) * 1000;
        $data[] = [$time, ($row['temperature'])];
    }
} else {
    echo "0 results";
}


$con->close();

echo json_encode($data);
?>
