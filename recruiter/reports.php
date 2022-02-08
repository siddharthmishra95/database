<?php
include('../shared/header.php')
?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include('../shared/topbar.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include('../shared/sidebar.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-9">
                    <h3 class="panel-title">Year Wise Data</h3>
                  </div>

                  <div class="col-md-3">
                    <select name='created_at' class="form-control" id='created_at'>
                      <option value="">Select Year</option>
                      <?php
                      
                        $records = mysqli_query($conn, "SELECT created_at FROM crud GROUP BY created_at DESC");  // Use select query here        
                        while($data = mysqli_fetch_array($records))
                        {
                            echo "<option value='". $data['created_at'] ."'>" .$data['created_at'] ."</option>";  // displaying data in option menu
                        }	
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="panel-body">
                <div id="chart_area" style=" height: auto; width:auto"></div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
              innovationtriggers.com
              2021</span>
            <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a
                href="https://www.innovationtriggers.com" target="_blank">Bootstrap admin
                template</a> Innovationtriggers.com</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <?php
include('../shared/footer.php')
?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  google.charts.load('current', {
    packages: ['corechart', 'bar']
  });
  google.charts.setOnLoadCallback();

  function load_monthwise_data(created_at, title) {
    var temp_title = title + ' ' + created_at + '';
    $.ajax({
      url: "ajax/reports/report.php",
      method: "POST",
      data: {
        created_at: created_at
      },
      dataType: "JSON",
      success: function(data) {
        drawMonthwiseChart(data, temp_title);
      }
    });
  }

  function drawMonthwiseChart(chart_data, chart_main_title) {
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'status');
    data.addColumn('number', 'number');
    $.each(jsonData, function(i, jsonData) {
      var status = jsonData.status;
      var number = parseFloat($.trim(jsonData.number));
      data.addRows([
        [status, number]
      ]);
    });
    var options = {
      title: chart_main_title,
      hAxis: {
        title: "STATUS"
      },
      vAxis: {
        title: 'TOTAL NUMBERS'
      }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));
    chart.draw(data, options);
  }
  </script>
  <script>
  $(document).ready(function() {

    $('#created_at').change(function() {
      var created_at = $(this).val();
      if (created_at != '') {
        load_monthwise_data(created_at, 'Status Wise Data For');
      }
    });

  });
  </script>