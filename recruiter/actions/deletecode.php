<?php
include '../../config/dbconfig.php';

if(isset($_POST['deletedata']))
{
    $usr_id = $_POST['delete_id'];

    $query = "DELETE FROM registration WHERE usr_id='$usr_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:../Employee.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>