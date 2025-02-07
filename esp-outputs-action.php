<?php
    include_once('esp-database.php');

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $action = $id = $name = $gpio = $state = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = test_input($_POST["action"]);
        if ($action == "output_create") {
            $name = test_input($_POST["name"]);
            $board = test_input($_POST["board"]);
            $gpio = test_input($_POST["gpio"]);
            $state = test_input($_POST["state"]);
            $result = createOutput($name, $board, $gpio, $state);

            $result2 = getBoard($board);
            if(!$result2->fetch_assoc()) {
                createBoard($board);
            }
            echo $result;
        }
        elseif ($action == "add_sensor") {

            $room_id = test_input($_POST["room_id"]);
            $sensor_type = test_input($_POST["sensor_type"]);
            $sensor_name = test_input($_POST["sensor_name"]);
            $board_id = test_input($_POST["board_id"]);
            $gpio = test_input($_POST["gpio"]);
            
            $sql = "INSERT INTO `sensors`(`room_id`, `sensor_type`, `sensor_name`, `board_id`, `gpio`) VALUES ('$room_id', '$sensor_type', '$sensor_name', $board_id, $gpio);";

            /*if ($sensor_type == "Temperature") {
                $sql = "INSERT INTO `sensors`(`room_id`, `sensor_type`, `sensor_name`, `board_id`, `gpio`) VALUES ('$room_id', '$sensor_type', '$sensor_name', $board_id, $gpio);";
            }
            elseif ($sensor_type == "Humidity"){
                $sql = "INSERT INTO `sensors`(`room_id`, `sensor_type`, `sensor_name`, `board_id`, `gpio`) VALUES ('$room_id', '$sensor_type', '$sensor_name', $board_id, $gpio);";
            }*/

        }
        elseif ($action == "add_room") {
            $room_name = test_input($_POST["room_name"]);
            $description = test_input($_POST["description"]);
            $sql = "INSERT INTO `rooms`(`room_name`, `description`) VALUES ('$room_name', '$description');";


        }
        elseif ($action == "default_room") {
            $room_id = test_input($_POST["room_id"]);
            $sql_reset = "UPDATE `rooms` SET `default_room`=0;";
            if ($conn->query($sql_reset) === TRUE) {echo "Successfully!";}
            $sql = "UPDATE `rooms` SET `default_room`=1 WHERE room_id=$room_id;";














        }
        else {
            echo "No data posted with HTTP POST.";
        }

        //Execute all SQLs
        if ($conn->query($sql) === TRUE) {return "New output created successfully"; }
        else {return "Error: " . $sql . "<br>" . $conn->error; }
        $conn->close();

    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $action = test_input($_GET["action"]);
        if ($action == "outputs_state") {
            $board = test_input($_GET["board"]);
            $result = getAllOutputStates($board);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $rows[$row["gpio"]] = $row["state"];
                }
            }
            echo json_encode($rows);
            $result = getBoard($board);
            if($result->fetch_assoc()) {
                updateLastBoardTime($board);
            }
        }
        else if ($action == "output_update") {
            $id = test_input($_GET["id"]);
            $state = test_input($_GET["state"]);
            $result = updateOutput($id, $state);
            echo $result;
        }
        else if ($action == "output_delete") {
            $id = test_input($_GET["id"]);
            $board = getOutputBoardById($id);
            if ($row = $board->fetch_assoc()) {
                $board_id = $row["board"];
            }
            $result = deleteOutput($id);
            $result2 = getAllOutputStates($board_id);
            if(!$result2->fetch_assoc()) {
                deleteBoard($board_id);
            }
            echo $result;
        }
        else {
            echo "Invalid HTTP request.";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>