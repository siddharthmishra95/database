<?php

include '../../../config/dbconfig.php';

if(isset($_POST['add']))
{
  $dat = $_POST['dat'];
  $data = $_POST['data'];
  $jobid = $_POST['jobid'];
  $reqdate = $_POST['reqdate'];
  $month = $_POST['month'];
  $uploaded = $_POST['uploaded'];
  $companyname = $_POST['companyname'];
  $dept = $_POST['dept'];
  $sal = $_POST['sal'];
  if ($_FILES['req']['name'])
  {
      move_uploaded_file($_FILES['req']['tmp_name'], "uploads/" . $_FILES['req']['name']);
      $req_des = "uploads/" . $_FILES['req']['name'];
  }
  $isrepeat = $_POST['isrepeat'];
  $status = $_POST['status'];
  $nop = $_POST['nop'];


  
    $query = "INSERT INTO requirement ( `dat`,`data`,`jobid`,`reqdate`,`month`,`uploaded`,`companyname`,`dept`,`sal`,`isrepeat`,`status`,`nop`,`req`)VALUES('$dat', '$data', '$jobid', '$reqdate', '$month',' $uploaded', '$companyname', '$dept', '$sal','$isrepeat', '$status', '$nop','$req_des')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../../addrequirement.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>