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
            <h1 class="m-0">SYSTEM CONFIGURATIONS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Configurations</a></li>
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
          <h3 class="card-title">Select defalt room for show on the dashboard</h3>

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
    //include_once('esp-database.php');
?>
<div class="form-group">
    <form onsubmit="return createOutput();" role="form" id="form">
        <label for="room_id">Default Room</label>
        <select id="room_id" name="room_id" required>
        <option>Select default room</option>
        <?php
            $sql = "select * from rooms;";
            $result = $con->query( $sql );
            while ($record = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $record['room_id'];?>" <?php if($record['default_room']==1){echo "selected";}?>><?php echo $record['room_name'];?></option>
        <?php } ?>
        </select>

        <input type="submit" value="Submit">
    </form>
</div>

<script>
    function createOutput(element) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "esp-outputs-action.php", true);

        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                //alert("Room selected!");
                setTimeout(function(){ window.location.reload(); });
            }
        }
        var room_id = document.getElementById("room_id").value;

        var httpRequestData = "action=default_room&room_id="+room_id;
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
