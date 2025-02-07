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
            <h1 class="m-0">CO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">CO</a></li>
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
          
          
          
            <div class="row">
              <div class="col-12">
                <!-- Line chart -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title"><i class="far fa-chart-bar"></i> Room 1 - CO History</h3>
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
            

        
        
        
        
        
        
        
        



        <!-- /.row -->
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
      url: 'get-data-co.php',
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

            $('#line-chart-tooltip').html('Time: ' + x + ' ' + y + ' PPM')
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
