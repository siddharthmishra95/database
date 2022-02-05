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
          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Automobile database</button>
            <!-- <button class="tablinks" onclick="openCity(event, 'Paris')">2021 Data</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">2020 Data</button> -->
          </div>
          <div id="London" class="tabcontent">
            <div class="card">
              <div class="card-body">

                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div>
                        <!-- Custom Filter -->
                        <table>
                          <tr>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type='text' id='searchByName' placeholder='Candidate Name'>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type='text' id='searchByWorkingDept'
                                  placeholder='Working Dept.'>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <select class="form-control btn btn-secondary btn-block" id='searchByGender'>
                                  <option value="">EMPLOYEE CODE</option>
                                  <option value="Admin">Admin</option>
                                  <option value="001">001</option>
                                  <option value="010">010</option>
                                  <option value="012">012</option>
                                  <option value="191">191</option>
                                  <option value="039">039</option>
                                  <option value="251">251</option>
                                  <option value="252">252</option>
                                  <option value="256">256</option>
                                  <option value="259">259</option>
                                  <option value="260">260</option>
                                  <option value="261">261</option>
                                  <option value="262">262</option>
                                  <option value="263">263</option>
                                  <option value="264">264</option>
                                  <option value="265">265</option>
                                  <option value="270">270</option>
                                  <option value="271">271</option>
                                  <option value="272">272</option>
                                  <option value="273">273</option>
                                  <option value="274">274</option>
                                  <option value="276">276</option>
                                  <option value="278">278</option>
                                  <option value="280">280</option>
                                  <option value="282">282</option>
                                  <option value="283">283</option>
                                  <option value="284">284</option>
                                  <option value="285">285</option>
                                  <option value="286">286</option>
                                  <option value="288">288</option>
                                  <option value="292">292</option>
                                  <option value="293">293</option>
                                  <option value="294">294</option>
                                  <option value="306">306</option>
                                  <option value="Innovation1">Innovation1</option>
                                  <option value="Innovation2">Innovation2</option>
                                  <option value="Innovation3">Innovation3</option>
                                  <option value="Innovation4">Innovation4</option>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <select class="form-control btn btn-secondary btn-block" id='searchByClient'>
                                  <option value="">Select Client</option>
                                  <?php
                                                                            include "dbconfig.php";  // Using database connection file here
                                                                            $records = mysqli_query($conn, "SELECT client_name From clients");  // Use select query here 
                                                                    
                                                                            while($data = mysqli_fetch_array($records))
                                                                            {
                                                                                echo "<option value='". $data['client_name'] ."'>" .$data['client_name'] ."</option>";  // displaying data in option menu
                                                                            }	
                                                                        ?>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type='text' id='searchByPresentCompany'
                                  placeholder='Candidate Comp.'>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <select class="form-control btn btn-secondary btn-block" id='searchByDepartment'>

                                  <option value="">Select Dept.</option>
                                  <?php
                                                                        include "dbconfig.php";  // Using database connection file here
                                                                        $records = mysqli_query($conn, "SELECT dept_name From dept");  // Use select query here 
                                                                        while($data = mysqli_fetch_array($records))
                                                                        {
                                                                            echo "<option value='". $data['dept_name'] ."'>" .$data['dept_name'] ."</option>";  // displaying data in option menu
                                                                        }	
                                                                    ?>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type='text' id='searchByEmail'
                                  placeholder='Candidate Email'>
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type='text' id='searchByContact'
                                  placeholder='Candidate Contact'>
                              </div>
                            </td>

                          </tr>
                        </table>
                        <!-- Table -->
                        <table id='empTable' class='table table-striped table-bordered display dataTable'>
                          <thead>
                            <tr>

                              <th>ID</th>
                              <th>DateCreated</th>
                              <th>Date</th>
                              <th>Employee Name </th>
                              <th>Client Name</th>
                              <th>Working Department </th>
                              <th>Candidate Name</th>
                              <th>Present Company</th>
                              <th>Designation</th>
                              <th>Qualification</th>
                              <th>Total Experience</th>
                              <th>Current Salary</th>
                              <th>Expected Salary</th>
                              <th>Notice Period</th>
                              <th>Current Location</th>
                              <th>Permanent Location</th>
                              <th>Contact No.</th>
                              <th>E-mail</th>
                              <th>Shortlisting Status</th>
                              <th>Reason for Rejection</th>
                              <th>Date Of Interview First Round</th>
                              <th>Status for First Round</th>
                              <th>Date Of Interview Final Round</th>
                              <th>Selected</th>
                              <th>Joined</th>
                              <th>Status</th>
                              <th>Remarks</th>
                              <th>Candidate Department</th>
                              <th>Action</th>
                              <th>Edit</th>
                              <th>Shortlist</th>
                              <th>Duplicate</th>
                            </tr>
                            <hr>
                            </hr>
                          </thead>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script>
            $(document).ready(function() {
              var dataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                "scrollX": true,
                "order": [
                  [0, "desc"]
                ],
                'searching': false,
                'ajax': {
                  'url': 'ajax/fetch-candidate.php',
                  'data': function(data) {
                    var gender = $('#searchByGender').val();
                    var name = $('#searchByName').val();
                    var workingdept = $('#searchByWorkingDept').val();
                    var client = $('#searchByClient').val();
                    var presentcompany = $('#searchByPresentCompany').val();
                    var department = $('#searchByDepartment').val();
                    var email = $('#searchByEmail').val();
                    var phone = $('#searchByContact').val();
                    data.searchByGender = gender;
                    data.searchByName = name;
                    data.searchByWorkingDept = workingdept;
                    data.searchByClient = client;
                    data.searchByPresentCompany = presentcompany;
                    data.searchByDepartment = department;
                    data.searchByEmail = email;
                    data.searchByContact = phone;
                  }
                },
                'columns': [{
                    data: 'id'
                  }, {
                    data: 'dat'
                  }, {
                    data: 'data'
                  }, {
                    data: 'uploaded'
                  }, {
                    data: 'clientname'
                  },
                  {
                    data: 'workingdept'
                  }, {
                    data: 'name'
                  }, {
                    data: 'companyname'
                  }, {
                    data: 'designation'
                  },
                  {
                    data: 'qualification'
                  }, {
                    data: 'experience'
                  }, {
                    data: 'currentsal'
                  }, {
                    data: 'expectedsal'
                  },
                  {
                    data: 'noticeperiod'
                  }, {
                    data: 'address'
                  }, {
                    data: 'peraddress'
                  }, {
                    data: 'phone'
                  }, {
                    data: 'email'
                  },
                  {
                    data: 'short'
                  }, {
                    data: 'ror'
                  }, {
                    data: 'dof'
                  }, {
                    data: 'shortfinal'
                  }, {
                    data: 'dos'
                  }, {
                    data: 'selected'
                  },
                  {
                    data: 'joined'
                  }, {
                    data: 'status'
                  }, {
                    data: 'remarks'
                  }, {
                    data: 'department'
                  }, {
                    data: 'resume'
                  },
                  {
                    data: 'edit'
                  }, {
                    data: 'shortlist'
                  }, {
                    data: 'duplicate'
                  },
                ]
              });

              $('#searchByName').keyup(function() {
                dataTable.draw();
              });
              $('#searchByGender').change(function() {
                dataTable.draw();
              });
              $('#searchByClient').change(function() {
                dataTable.draw();
              });
              $('#searchByPresentCompany').keyup(function() {
                dataTable.draw();
              });
              $('#searchByWorkingDept').keyup(function() {
                dataTable.draw();
              });
              $('#searchByDepartment').change(function() {
                dataTable.draw();
              });
              $('#searchByEmail').keyup(function() {
                dataTable.draw();
              });
              $('#searchByContact').keyup(function() {
                dataTable.draw();
              });

            });
            </script>
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
  <?php
    include('../shared/footer.php')
  ?>