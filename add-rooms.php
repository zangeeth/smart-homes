<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SMART HOMES</title>
<?php
include("meta-head.php");
include("connection.php");
error_reporting(0);
include("functions.php");
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('preloader.php');?>
  <!-- /.navbar -->

  <!-- Navbar -->
  <?php include('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('main-sidebar.php');?>
  <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ADD ROOMS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Rooms</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="col-lg-4 content ui-sortable">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add Rooms</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <!--<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>-->
          </div>
        </div>
        <div class="card-body">
<link rel="stylesheet" type="text/css" href="css/esp-style2.css">
<?php
    include_once('esp-database.php');

    /*$result = getAllOutputs();
    $html_buttons = null;
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            if ($row["state"] == "1"){
                $button_checked = "checked";
            }
            else {
                $button_checked = "";
            }
            $html_buttons .= '<h3>' . $row["name"] . ' - Device '. $row["board"] . ' - PIN ' . $row["gpio"] . ' (<i><a onclick="deleteOutput(this)" href="javascript:void(0);" id="' . $row["id"] . '">Delete</a></i>)</h3><label class="switch"><input type="checkbox" onchange="updateOutput(this)" id="' . $row["id"] . '" ' . $button_checked . '><span class="slider"></span></label>';
        }
    }

    $result2 = getAllBoards();
    $html_boards = null;
    if ($result2) {
        $html_boards .= '<h3>Boards</h3>';
        while ($row = $result2->fetch_assoc()) {
            $row_reading_time = $row["last_request"];
            // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
            //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));

            // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
            //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 7 hours"));
            $html_boards .= '<p><strong>Board ' . $row["board"] . '</strong> - Last Request Time: '. $row_reading_time . '</p>';
        }
    }*/
?>
<?php //echo $html_buttons; ?>
<?php //echo $html_boards; ?>
<div class="form-group"><form onsubmit="return createOutput();">
    <h3>Create New Room</h3>
    <label for="room_name">Room Name</label>
    <input type="text" name="room_name" id="room_name"><br>
    <label for="description">Description</label>
    <input type="text" name="description" id="description"><br>
    <input type="submit" value="Create Output">
    <!--<p><strong>Note:</strong> in some devices, you might need to refresh the page to see your newly created buttons or to remove deleted buttons.</p>-->
</form></div>

<script>
    /*function updateOutput(element) {
        var xhr = new XMLHttpRequest();
        if(element.checked){
            xhr.open("GET", "esp-outputs-action.php?action=output_update&id="+element.id+"&state=1", true);
        }
        else {
            xhr.open("GET", "esp-outputs-action.php?action=output_update&id="+element.id+"&state=0", true);
        }
        xhr.send();
    }

    function deleteOutput(element) {
        var result = confirm("Want to delete this output?");
        if (result) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "esp-outputs-action.php?action=output_delete&id="+element.id, true);
            xhr.send();
            alert("Output deleted");
            setTimeout(function(){ window.location.reload(); });
        }
    }*/

    function createOutput(element) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "esp-outputs-action.php", true);

        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("Room created!");
                setTimeout(function(){ window.location.reload(); });
            }
        }
        var room_name = document.getElementById("room_name").value;
        var description = document.getElementById("description").value;

        var httpRequestData = "action=add_room&room_name="+room_name+"&description="+description;
        xhr.send(httpRequestData);
    }
</script>
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          You can add your sensor here.
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Footer -->
  <?php include('footer.php');?>
  <!-- /.Footer -->

</body>
</html>
