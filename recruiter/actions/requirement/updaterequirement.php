<?php
include '../../../config/dbconfig.php';

    if(isset($_POST['updaterequirement']))
    {   
        $id = $_POST['update_id'];
        $dat = $_POST['dat'];
        $data = $_POST['data'];
        $jobid = $_POST['jobid'];
        $reqdate = $_POST['reqdate'];
        $month = $_POST['month'];
        $uploaded = $_POST['uploaded'];
        $companyname = $_POST['companyname'];
        $dept = $_POST['dept'];
        $sal = $_POST['sal'];
        $oldreq=$_POST['oldreq'];
		    if(isset($_FILES['req']['name'])&&($_FILES['req']['name']!="")){
        $newreq="uploads/".$_FILES['req']['name'];
        unlink($oldreq);
        move_uploaded_file($_FILES['req']['tmp_name'], $newreq);
        }
        else {
        $newreq=$oldreq;
        }
        $isrepeat = $_POST['isrepeat'];
        $status = $_POST['status'];
        $nop = $_POST['nop'];
        

        $query = "UPDATE requirement SET dat='$dat', data='$data', jobid='$jobid', reqdate='$reqdate', month='$month', uploaded='$uploaded', companyname='$companyname', dept='$dept',sal='$sal',req='$newreq', isrepeat='$isrepeat',status='$status',nop='$nop' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:../../addrequirement.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>