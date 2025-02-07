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
            <h1 class="m-0">Dashboard - Room <?php echo $room_id;?> Statistics</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php include("temperaturehumidity.php");echo $temperature;?> &#176;C</h3>

                <p>TEMPERATURE</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="temperature.php" class="small-box-footer">Go to history <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $humidity;?> %<sup style="font-size: 20px"></sup></h3>

                <p>HUMIDITY</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="humidity.php" class="small-box-footer">Go to history <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php include("gas.php");echo $h2;?> PPM</h3>

                <p>Hydrogen Particles Per Million</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="hydrogen.php" class="small-box-footer">Go to history <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $lpg;?> PPM</h3>

                <p>LPG Particles Per Million</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="lpg.php" class="small-box-footer">Go to history <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3><?php echo $co;?> PPM</h3>

                <p>CO Particles Per Million</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="co.php" class="small-box-footer">Go to history <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $alcohol;?> PPM</h3>

                <p>Alcohol Particles Per Million</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="alcohol.php" class="small-box-footer">Go to history <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $propane;?> PPM</h3>

                <p>Propane Particles Per Million</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="propane.php" class="small-box-footer">Go to history <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <div id="motion-status"></div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script>
                $(document).ready(function(){
                  refreshMotionStatus();
                });

                function refreshMotionStatus() {
                  $.ajax({
                    url: "motion-check.php",
                    success: function(data) {
                      $("#motion-status").html(data); // Update the div content
                    },
                    error: function(xhr, status, error) {
                      console.error("Error: " + error); // Log errors for debugging
                      $("#motion-status").html("Error loading motion status."); // Display error
                    }
                  });
                  setTimeout(refreshMotionStatus, 5000); // Call again after 5 seconds
                }
                </script>

              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="motion.php" class="small-box-footer">Go to history <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          
          
          
        </div>
        <!-- /.row -->

        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-9 connectedSortable">
          
            <div class="row">
              <div class="col-12">
                <!-- Line chart -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title"><i class="far fa-chart-bar"></i> Appliance 1 - Current Consumption</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="line-chart" style="height: 300px;"></div>
                  </div>
                  <!-- /.card-body-->
                </div>
                <!-- /.card -->
    
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row --> 
            
            <div class="row">
              <div class="col-12">
                <!-- Line chart -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title"><i class="far fa-chart-bar"></i> Appliance 2 - Current Consumption</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="line-chart2" style="height: 300px;"></div>
                  </div>
                  <!-- /.card-body-->
                </div>
                <!-- /.card -->
    
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row --> 
            
  
            
            
          </section>
          
          
   
          <!-- /.Left col -->
          
          
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-3 connectedSortable">
              
              <!-- Default box -->
              <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title"><i class="far fa-chart-bar"></i> Living Room - Light Control</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <div class="card-body" id="lights-status">
                    <?php //include("lights-check.php");?>

                    <script>
                      $(document).ready(function(){
                        refreshLightsStatus();
                      });

                      function refreshLightsStatus() {
                        $.ajax({
                          url: "lights-check.php",
                          success: function(data) {
                            $("#lights-status").html(data); // Update the div content
                          },
                          error: function(xhr, status, error) {
                            console.error("Error: " + error); // Log errors for debugging
                            $("#lights-status").html("Error loading motion status."); // Display error
                          }
                        });
                        setTimeout(refreshLightsStatus, 5000); // Call again after 5 seconds
                      }
                    </script>


                  </div>
              </div>            
              
              
              
              
              
              
              
              
              
              
              
              


            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Footer -->
  <?php include('footer.php');?>
  <!-- /.Footer -->


<script>
  $(function () {
    /** LINE CHART - Load 1**/

    // Fetch data from the PHP script
    $.ajax({
      url: 'get-data-ampere.php',
      method: 'GET',
      dataType: 'json',
      success: function (response) {
        var data = response.map(function (item) {
          return [item[0], item[1]];
        });

        var line_data = {
          data: data,
          color: '#3c8dbc'
        };

        $.plot('#line-chart', [line_data], {
          grid: {
            hoverable: true,
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor: '#f3f3f3'
          },
          series: {
            shadowSize: 0,
            lines: {
              show: true
            },
            points: {
              show: true
            }
          },
          lines: {
            fill: false,
            color: ['#3c8dbc', '#f56954']
          },
          yaxis: {
            show: true
          },
          xaxis: {
                mode: "time", // Set the mode to time to handle timestamps
                timeformat: "%Y-%m-%d %H:%M:%S", // Set the format to display time
                timezone: "browser", // Use the browser's timezone
                tickFormatter: function (val, axis) {
                  var date = new Date(val);
                  return date.toLocaleTimeString(); // Display time in a readable format
                }
          }
        });

        // Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
          position: 'absolute',
          display: 'none',
          opacity: 0.8
        }).appendTo('body');

        $('#line-chart').bind('plothover', function (event, pos, item) {
          if (item) {
            var x = new Date(item.datapoint[0]).toLocaleString(),
                y = item.datapoint[1].toFixed(2);

            $('#line-chart-tooltip').html('Time: ' + x + ' Current: ' + y + ' A')
              .css({
                top: item.pageY + 5,
                left: item.pageX + 5
              })
              .fadeIn(200);
          } else {
            $('#line-chart-tooltip').hide();
          }
        });
      },
      error: function (error) {
        console.error("Error fetching data: ", error);
      }
    });
    /* END LINE CHART */
    
    
    /** LINE CHART - Load 2**/

    // Fetch data from the PHP script
    $.ajax({
      url: 'get-data-ampere-load2.php',
      method: 'GET',
      dataType: 'json',
      success: function (response) {
        var data = response.map(function (item) {
          return [item[0], item[1]];
        });

        var line_data = {
          data: data,
          color: '#3c8dbc'
        };

        $.plot('#line-chart2', [line_data], {
          grid: {
            hoverable: true,
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor: '#f3f3f3'
          },
          series: {
            shadowSize: 0,
            lines: {
              show: true
            },
            points: {
              show: true
            }
          },
          lines: {
            fill: false,
            color: ['#3c8dbc', '#f56954']
          },
          yaxis: {
            show: true
          },
          xaxis: {
                mode: "time", // Set the mode to time to handle timestamps
                timeformat: "%Y-%m-%d %H:%M:%S", // Set the format to display time
                timezone: "browser", // Use the browser's timezone
                tickFormatter: function (val, axis) {
                  var date = new Date(val);
                  return date.toLocaleTimeString(); // Display time in a readable format
                }
          }
        });

        // Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart2-tooltip"></div>').css({
          position: 'absolute',
          display: 'none',
          opacity: 0.8
        }).appendTo('body');

        $('#line-chart2').bind('plothover', function (event, pos, item) {
          if (item) {
            var x = new Date(item.datapoint[0]).toLocaleString(),
                y = item.datapoint[1].toFixed(2);

            $('#line-chart2-tooltip').html('Time: ' + x + ' Current: ' + y + ' A')
              .css({
                top: item.pageY + 5,
                left: item.pageX + 5
              })
              .fadeIn(200);
          } else {
            $('#line-chart2-tooltip').hide();
          }
        });
      },
      error: function (error) {
        console.error("Error fetching data: ", error);
      }
    });
    /* END LINE CHART */








  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>


</body>
</html>
