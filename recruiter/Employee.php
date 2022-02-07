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
              <h5 class="modal-title" id="exampleModalLabel">Add Employee Data </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="actions/employee/insertcode.php" method="POST">

              <div class="modal-body">
                <div class="form-group">
                  <label> Employee Name </label>
                  <input type="text" name="name" class="form-control" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                  <label> Email </label>
                  <input type="text" name="email" class="form-control" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                  <label> Password </label>
                  <input type="text" name="password" class="form-control" placeholder="Enter Course">
                </div>

                <div class="form-group">
                  <label> Employee Id </label>
                  <input type="number" name="empid" class="form-control" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                  <label> Role </label>
                  <select name="role" id="role">
                    <option value="users">Users</option>
                    <option value="Admin">Admin</option>
                    <option value="SuperAdmin">SuperAdmin</option>
                    <option value="tempusers">Temp Users</option>
                    <option value="account">Account</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
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
              <h5 class="modal-title" id="exampleModalLabel"> Edit Employee Data </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="actions/employee/updatecode.php" method="POST">

              <div class="modal-body">

                <input type="hidden" name="update_id" id="update_id">

                <div class="form-group">
                  <label> Employee Name </label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Employee Name">
                </div>

                <div class="form-group">
                  <label> Email </label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                </div>

                <div class="form-group">
                  <label> Password </label>
                  <input type="text" name="password" id="password" class="form-control" placeholder="Enter Password">
                </div>

                <div class="form-group">
                  <label> Employee Id </label>
                  <input type="number" name="empid" id="empid" class="form-control" placeholder="Enter Employee Id">
                </div>
                <div class="form-group">
                  <label> Role </label>
                  <select name="role" id="role">
                    <option value="users">Users</option>
                    <option value="Admin">Admin</option>
                    <option value="SuperAdmin">SuperAdmin</option>
                    <option value="tempusers">Temp Users</option>
                    <option value="account">Account</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
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

            <form action="actions/employee/deletecode.php" method="POST">

              <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4> Do you want to Delete this Data ??</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
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
                <i class="mdi mdi-account-plus text-white mr-0 mr-sm-4 icon-lg"></i>
                ADD EMPLOYEE
              </button>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Employee</h4>
                <div class="table-responsive">
                  <?php 
                      $limit = 10;
                      if(isset($_GET['page'])){
                        $page = $_GET['page'];
                      }else{
                        $page = 1;
                      }
                      $offset = ($page - 1) * $limit;
                      $sql = "SELECT * FROM registration ORDER BY usr_id DESC LIMIT {$offset},{$limit}";
                      $result = mysqli_query($conn, $sql ) or die("Query failed");
                      if(mysqli_num_rows($result) > 0){
                    ?>
                  <table id="example" class="table table-striped table-bordered display responsive nowrap"
                    cellspacing="0" style="width:100%">

                    <thead>
                      <tr>
                        <th>S.NO</th>
                        <th>Employee Name</th>
                        <th>E-mail</th>
                        <th>Password</th>
                        <th>Employee Id</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php while ($row = $result->fetch_assoc()) {?>

                      <tr>
                        <td><?= $row['usr_id']; ?> </td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['password']; ?></td>
                        <td><?= $row['empid']; ?></td>
                        <td><?= $row['role']; ?></td>
                        <td class="text-center">
                          <?php
                          if($row['usr_status']==1){
                            echo '<span class="badge badge-gradient-success"><a href="status.php?usr_id='.$row['usr_id'].'&usr_status=0" style="text-decoration:none">Active</a></span>';
                          }else{
                            echo '<span class="badge badge-gradient-danger"><a href="status.php?usr_id='.$row['usr_id'].'&usr_status=1" style="text-decoration:none">InActive</a></span>';
                          }
                          ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger deletebtn"> DELETE </button>|
                          <button type="button" class="btn btn-success editbtn"> EDIT </button>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php } 
                    $sql1 = "SELECT * FROM registration";
                    $result1 = mysqli_query($conn, $sql1 ) or die("Query failed");
                    if(mysqli_num_rows($result1) > 0) {
                      $total_records = mysqli_num_rows($result1);
                      $total_page = ceil($total_records / $limit);
                      echo '<nav>
                      <ul class="pagination rounded-flat pagination-success">';
                      if($page > 1){
                        echo '<li class="page-item"><a class="page-link" href="Employee.php?page='.($page -1 ).'"><i class="mdi mdi-chevron-left"></i></a></li>';
                      }
                     
                      for($i = 1; $i <= $total_page; $i++) {
                        if($i == $page){
                          $active = "active";
                        }else{
                          $active = "";
                        }
                        echo '<li class="page-item '.$active.' "><a class="page-link" href="Employee.php?page='.$i.'">'.$i.'</a></li>';
                      }
                      if($total_page > $page){
                        echo '<li class="page-item"><a class="page-link" href="Employee.php?page='.($page + 1 ).'"><i class="mdi mdi-chevron-right"></i></a></li>';
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
      $('#name').val(data[1]);
      $('#email').val(data[2]);
      $('#password').val(data[3]);
      $('#empid').val(data[4]);
      $('#role').val(data[5]);
    });
  });
  </script>