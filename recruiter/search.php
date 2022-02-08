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

          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
          <div class="searchResults">
            <h4>Search results for <?php echo $_GET['search'] ?></h4>
            <?php
            $noresults = true;
            $query = $_GET["search"];
            $limit = 30;
            if(isset($_GET['page'])){
            $page = $_GET['page'];
            }else{
            $page = 1;
            }
            $offset = ($page - 1) * $limit;
            $sql = "SELECT * FROM crud where email like '%$query%' 
                    or phone like '%$query%' or name like '%$query%' 
                    or clientname like '%$query%' or uploaded like '%$query%'
                    or designation like '%$query%' or qualification like '%$query%'
                    or address like '%$query%' or peraddress like '%$query%'
                    or status like '%$query%' or workingdept like '%$query%'
                    ORDER BY id DESC LIMIT {$offset},{$limit} ";
                   
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)){
              $data = $row['data'];
              $uploaded = $row['uploaded'];
              $clientname = $row['clientname'];
              $workingdept = $row['workingdept'];
              $name = $row['name'];
              $companyname = $row['companyname'];
              $designation = $row['designation'];
              $qualification = $row['qualification'];
              $experience = $row['experience'];
              $currentsal = $row['currentsal$currentsal'];
              $address = $row['address'];
              $peraddress = $row['peraddress'];
              $email = $row['email'];
              $phone = $row['phone'];
              $status = $row['status'];
              $resume = $row['resume'];
              $noresults = false;
              
              

              echo '<div class="result">
                      <div class="container profile-page">
                     
                        <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card profile-header">
                              <div class="body">
                                <div class="row">
                                  <div class="col-lg-4 col-md-4 col-12">
                                    <div class="profile-image float-md-right"> <img src="../assets/images/faces/avatar7.png" alt=""></div>
                                  </div>
                                  <div class="col-lg-8 col-md-8 col-12">
                                    <h4 class="m-t-0 m-b-0">Name :<strong> '. $name .'</strong></h4>
                                    <span class="job_post">Email: '.$email .'</span>
                                    <p>Permanent Address: '. $peraddress.',  <br> Current Address: '. $address.'</p>
                                    <span class="job_post">Client Name: '. $clientname.'</span><br>
                                    <span class="job_post">Status:  '. $status.'</span><br>
                                    <span class="job_post">Phone:  '. $phone.'</span>
                                    <div>
                                      <button class="btn btn-primary btn-round">Follow</button>
                                      <button class="btn btn-primary btn-round btn-simple">Message</button>
                                    </div>
                                    <p class="social-icon m-t-5 m-b-0">
                                      <a title="Twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                      <a title="Facebook" href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                                      <a title="Google-plus" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                      <a title="Behance" href="javascript:void(0);"><i class="fa fa-behance"></i></a>
                                      <a title="Instagram" href="javascript:void(0);"><i class="fa fa-instagram "></i></a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>';
                }
                if($noresults){
                    echo '<div class="jumbotron">
                            <h1>No Results Found</h1>      
                            <p>Try Searching With Phone Number, Email, Client Name, Candidate Name , Status</p>
                          </div>';
                }
            ?>

          </div>
          <?php 
           $query = $_GET["search"];
                    $sql1 = "SELECT * FROM crud where email like '%{$query}%' 
                    or phone like '%{$query}%' or name like '%{$query}%' 
                    or clientname like '%{$query}%' or uploaded like '%{$query}%'
                    or designation like '%{$query}%' or qualification like '%{$query}%'
                    or address like '%{$query}%' or peraddress like '%{$query}%'
                    or status like '%{$query}%' or workingdept like '%{$query}%'";
                    $result1 = mysqli_query($conn, $sql1 ) or die("Query failed");
                    if(mysqli_num_rows($result1) > 0) {
                      $total_records = mysqli_num_rows($result1);
                      $total_page = ceil($total_records / $limit);
                      echo '<nav>
                      <ul class="pagination rounded-flat pagination-success">';
                      if($page > 1){
                        echo '<li class="page-item"><a class="page-link" href="search.php?search='.$query.'&page='.($page -1 ).'"><i class="mdi mdi-chevron-left"></i></a></li>';
                      }
                     
                      for($i = 1; $i <= $total_page; $i++) {
                        if($i == $page){
                          $active = "active";
                        }else{
                          $active = "";
                        }
                        echo '<li class="page-item '.$active.' "><a class="page-link" href="search.php?search='.$query.'&page='.$i.'">'.$i.'</a></li>';
                      }
                      if($total_page > $page){
                        echo '<li class="page-item"><a class="page-link" href="search.php?search='.$query.'&page='.($page + 1 ).'"><i class="mdi mdi-chevron-right"></i></a></li>';
                      }
                     
                      echo '</ul>
                      </nav>';
                    }
                  ?>
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
  <style>
  .m-t-5 {
    margin-top: 5px;
  }

  .searchResults {
    min-height: 100vh;
  }

  .card {
    background: #fff;
    margin-bottom: 30px;
    transition: .5s;
    border: 0;
    border-radius: .1875rem;
    display: inline-block;
    position: relative;
    width: 100%;
    box-shadow: none;
  }

  .card .body {
    font-size: 14px;
    color: #424242;
    padding: 20px;
    font-weight: 400;
  }

  .profile-page .profile-header {
    position: relative
  }

  .profile-page .profile-header .profile-image img {
    border-radius: 50%;
    width: 140px;
    border: 3px solid #fff;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23)
  }

  .profile-page .profile-header .social-icon a {
    margin: 0 5px
  }

  .profile-page .profile-sub-header {
    min-height: 60px;
    width: 100%
  }

  .profile-page .profile-sub-header ul.box-list {
    display: inline-table;
    table-layout: fixed;
    width: 100%;
    background: #eee
  }

  .profile-page .profile-sub-header ul.box-list li {
    border-right: 1px solid #e0e0e0;
    display: table-cell;
    list-style: none
  }

  .profile-page .profile-sub-header ul.box-list li:last-child {
    border-right: none
  }

  .profile-page .profile-sub-header ul.box-list li a {
    display: block;
    padding: 15px 0;
    color: #424242
  }
  </style>
  <?php
include('../shared/footer.php')
?>