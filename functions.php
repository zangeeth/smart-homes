<?php
date_default_timezone_set('Europe/Vienna');

//Default room
function default_room($con){
    $sql = "SELECT * FROM rooms WHERE default_room = 1;";
    $result = $con->query($sql);
    $recordz = $result->fetch_assoc();
    //$_SESSION['default_room'] = $recordz['room_id'];
    return $recordz['room_id'];
}

$room_id = default_room($con);

//Sensor
function sensor_id($con, $room_id, $sensor_type){
    $sql = "SELECT * FROM sensors WHERE room_id = $room_id and sensor_type = '$sensor_type';";
    $result = $con->query($sql);
    $recordz = $result->fetch_assoc();
    return $recordz['sensor_id'];
}

function sensor_id2($con, $room_id, $sensor_type){
    $sql = "SELECT * FROM sensors WHERE room_id = $room_id and sensor_type = '$sensor_type';";
    $result = $con->query($sql);
    $recordz_1 = $result->fetch_assoc();
    $recordz_2 = $result->fetch_assoc();
    return $recordz_2['sensor_id'];
}








?>