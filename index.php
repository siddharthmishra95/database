<?php 
include('config/dbconfig.php');
include ('shared/header.php');
session_start();
if(!($_SESSION['name']==''))
{
 header('location:recruiter/dashboard.php');
}
?>
<?php 
  if(isset($_POST["btn-login"]))
  {
      $email=$_POST["txt_uname_email"];
      $pass=$_POST["txt_password"];
      
      $sql=mysqli_query($conn,"SELECT * from registration where email='$email' and password='$pass'");
      if(mysqli_num_rows($sql))
      {
          while($row=mysqli_fetch_array($sql))
          {   
              $name=$row["name"];
              $id=$row["usr_id"];
              $empid = $row["empid"];
              session_start();
              $_SESSION["name"]=$name;
              $_SESSION["id"]=$id;
              $_SESSION["email"]=$email;
              $_SESSION["empid"]=$empid;
              $_SESSION['role'] = $row['role'];
              
          }
        header("location:recruiter/dashboard.php");
      }
      else{
         $error="Please inter valid password";
      }

  }

?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="<?php echo BASE_URL; ?>assets/images/logo.svg">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post" id="login-form">
                <div class="form-group">
                  <input type="email" name="txt_uname_email" class="form-control form-control-lg"
                    id="exampleInputEmail1" placeholder="Username" required="">
                </div>
                <div class="form-group">
                  <input type="password" name="txt_password" class="form-control form-control-lg"
                    id="exampleInputPassword1" placeholder="Password" required="">
                </div>
                <div class="mt-3">
                  <button type="submit"
                    class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                    name="btn-login">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include ('shared/footer.php'); ?>