<?php
include '../../../config/dbconfig.php';

if(isset($_POST['deleterequirement']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM requirement WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:../../addrequirement.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>