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
            <h1 class="m-0">ADD SENSORS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sensors</a></li>
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
          <h3 class="card-title">Create a new sensor</h3>

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
<link rel="stylesheet" type="text/css" href="esp-style2.css">
<?php
    include_once('esp-database.php');
?>
<div class="form-group">
  <form onsubmit="return createOutput();">
    <label for="room_id">Room Name</label>
    <select id="room_id" name="room_id" required>
      <option>Select room</option>
      <?php
        $sql = "select * from rooms;";
        $result = $con->query( $sql );
        while ($record = $result->fetch_assoc()) {
      ?>
      <option value="<?php echo $record['room_id'];?>"><?php echo $record['room_name'];?></option>
      <?php } ?>
    </select>
    <br>
    <label for="sensor_name">Sensor Name</label>
    <input type="text" name="sensor_name" id="sensor_name"><br>
    <label for="board_id">Board ID</label>
    <input type="number" name="board_id" min="0" id="board_id">
    <label for="gpio">PIN Number</label>
    <input type="number" name="gpio" min="0" id="gpio">
    <label for="sensor_type">Sensor Type</label>
    <select id="sensor_type" name="sensor_type">
      <option value="">Type</option>
      <option value="Temperature">Temperature</option>
      <option value="Humidity">Humidity</option>
      <option value="Hydrogen">Hydrogen</option>
      <option value="LPG">LPG</option>
      <option value="CO">CO</option>
      <option value="Alcohol">Alcohol</option>
      <option value="Propane">Propane</option>
      <option value="Motion">Motion</option>
      <option value="Current">Current</option>
    </select>
    <input type="submit" value="Create Output">
    <!--<p><strong>Note:</strong> in some devices, you might need to refresh the page to see your newly created buttons or to remove deleted buttons.</p>-->
  </form>
</div>

<script>
    function createOutput(element) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "esp-outputs-action.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("Output created");
                setTimeout(function(){ window.location.reload(); });
            }
        }
        var room_id = document.getElementById("room_id").value;
        var sensor_name = document.getElementById("sensor_name").value;
        var sensor_type = document.getElementById("sensor_type").value;
        var board_id = document.getElementById("board_id").value;
        var gpio = document.getElementById("gpio").value;
        var httpRequestData = "action=add_sensor&sensor_name="+sensor_name+"&board_id="+board_id+"&gpio="+gpio+"&sensor_type="+sensor_type+"&room_id="+room_id;
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
