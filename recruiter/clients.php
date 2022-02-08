<?php
include('../shared/header.php');
session_start();
if($_SESSION['name']=='')
  {
     header('location:../index.php');
  }
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
      <!-- Modal -->
      <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Clients Detail </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="actions/client/insertclient.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">DAT</label>
                      <div class="col-sm-8">
                        <input name="dat" value="<?php date_default_timezone_set('Asia/Kolkata');
                                $currentDateTime = date('d-M-Y H:i:s a');
                                echo $currentDateTime; ?>" readonly="readonly" class="form-group form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Client Name</label>
                      <div class="col-sm-8">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="text" name="client_name" value="<?= $client_name;  ?>" class="form-control"
                          placeholder="Company Name" required="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-primary">Save Data</button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
      <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Edit Client Data </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="actions/client/updateclient.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="update_id" id="update_id">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">DAT</label>
                      <div class="col-sm-8">
                        <input name="dat" id="dat" value="<?php $dat ?>" readonly="readonly"
                          class="form-group form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Client Name</label>
                      <div class="col-sm-8">

                        <input type="text" name="client_name" id="client_name" value="<?= $client_name;  ?>"
                          class="form-control" placeholder="Company Name" required="">
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updateclient" class="btn btn-primary">Update Data</button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
      <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="actions/client/deleteclient.php" method="POST">

              <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4> Do you want to Delete this Data ??</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                <button type="submit" name="deleteclient" class="btn btn-primary"> Yes !! Delete it. </button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-block btn-lg btn-gradient-primary mt-4 float-right"
                data-toggle="modal" data-target="#studentaddmodal">
                <i class="mdi mdi-car text-white mr-0 mr-sm-4 icon-lg"></i>
                ADD CLIENTS
              </button>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Requirement</h4>
                <div class="table-responsive">
                  <?php 
                     
                      $limit = 10;
                      
                      if(isset($_GET['page'])){
                        $page = $_GET['page'];
                      }else{
                        $page = 1;
                      }
                      $offset = ($page - 1) * $limit;
                      $sql = "SELECT * FROM clients ORDER BY id DESC LIMIT {$offset},{$limit}";
                      $cnt=1;
                      $result = mysqli_query($conn, $sql ) or die("Query failed");
                      if(mysqli_num_rows($result) > 0){
                    ?>
                  <table id="example" class="table table-striped table-bordered display responsive nowrap"
                    cellspacing="0" style="width:100%">

                    <thead>
                      <tr>

                        <th>ID</th>
                        <th>DATE</th>
                        <th>Client name</th>
                        <th>Enable / Disable</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php while ($row = $result->fetch_assoc()) {?>

                      <tr>

                        <td><?= $row['id']; ?></td>
                        <td><?= $row['dat']; ?></td>
                        <td><?= $row['client_name']; ?></td>
                        <td class="text-center">
                          <?php
                          if($row['client_status']==1){
                            echo '<span class="btn btn-gradient-success"><a href="status.php?id='.$row['id'].'&client_status=0" style="text-decoration:none;color:white">ACTIVE</a></span>';
                          }else{
                            echo '<span class="btn btn-gradient-danger"><a href="status.php?id='.$row['id'].'&client_status=1" style="text-decoration:none;color:white">INACTIVE</a></span>';
                          }
                          ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger deletebtn"> DELETE </button>|
                          <button type="button" class="btn btn-success editbtn"> EDIT </button>
                        </td>
                      </tr>
                      <?php  } ?>
                    </tbody>
                  </table>
                  <?php } 
                    $sql1 = "SELECT * FROM clients";
                    $result1 = mysqli_query($conn, $sql1 ) or die("Query failed");
                    if(mysqli_num_rows($result1) > 0) {
                      $total_records = mysqli_num_rows($result1);
                      $total_page = ceil($total_records / $limit);
                      echo '<nav>
                      <ul class="pagination rounded-flat pagination-success">';
                      if($page > 1){
                        echo '<li class="page-item"><a class="page-link" href="clients.php?page='.($page -1 ).'"><i class="mdi mdi-chevron-left"></i></a></li>';
                      }
                     
                      for($i = 1; $i <= $total_page; $i++) {
                        if($i == $page){
                          $active = "active";
                        }else{
                          $active = "";
                        }
                        echo '<li class="page-item '.$active.' "><a class="page-link" href="clients.php?page='.$i.'">'.$i.'</a></li>';
                      }
                      if($total_page > $page){
                        echo '<li class="page-item"><a class="page-link" href="clients.php?page='.($page + 1 ).'"><i class="mdi mdi-chevron-right"></i></a></li>';
                      }
                     
                      echo '</ul>
                      </nav>';
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <?php
include('../shared/footer.php')
?>
  <script>
  $(document).ready(function() {

    $('.deletebtn').on('click', function() {

      $('#deletemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);

    });
  });
  </script>
  <script>
  $(document).ready(function() {

    $('.editbtn').on('click', function() {

      $('#editmodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#update_id').val(data[0]);
      $('#dat').val(data[1]);
      $('#client_name').val(data[2]);


    });
  });
  </script>