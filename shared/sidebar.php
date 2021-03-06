<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <?php 
    $conn=mysqli_connect("localhost","root","","phpcrud");   
    $_SESSION['name'];
    $query = mysqli_query($conn,"SELECT * FROM registration WHERE name='".$_SESSION['name']."'");
    while($row = mysqli_fetch_array($query)) {
      $role = $row['role'];
    }
    if($role == 'SuperAdmin') { ?>
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="<?php echo BASE_URL; ?>assets/images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2"><?php echo $_SESSION['name'] ?></span>
          <span class="text-secondary text-small">Employee Id: <?php echo $_SESSION['empid'] ?></span>
          <span class="text-secondary text-small">UserType: <?php echo $_SESSION['role'] ?></span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/dashboard.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Candidates</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/addcandidate.php">Add
              Candidate</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/allcandidate.php">Candidate
              Database</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-new" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Employee</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic-new">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/Employee.php">Employee</a>
          </li>
          <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/allcandidate.php">Candidate
              Database</a></li> -->
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/addrequirement.php">
        <span class="menu-title">Requirement</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/clients.php">
        <span class="menu-title">Clients</span>
        <i class="mdi mdi-car menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo BASE_URL; ?>recruiter/reports.php">
        <span class="menu-title">Reports</span>
        <i class="mdi mdi-chart-bar menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/tables/basic-table.html">
        <span class="menu-title">Tables</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
        aria-controls="general-pages">
        <span class="menu-title">Sample Pages</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-medical-bag menu-icon"></i>
      </a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <div class="border-bottom">
          <h6 class="font-weight-normal mb-3">Projects</h6>
        </div>
        <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
        <div class="mt-4">
          <div class="border-bottom">
            <p class="text-secondary">Categories</p>
          </div>
          <ul class="gradient-bullet-list mt-4">
            <li>Free</li>
            <li>Pro</li>
          </ul>
        </div>
      </span>
    </li>
  </ul>
  <?php } elseif($role == "Admin") { ?>
  Admin
  <?php  } elseif($role == "users") { ?>
  Users
  <?php  } elseif($role == "tempusers") { ?>
  temp Users
  <?php } ?>
</nav>