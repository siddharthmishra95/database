<?php

include '../../../config/dbconfig.php';

if(isset($_POST['add']))
{
    
    $dat = $_POST['dat'];
    $client_name = $_POST['client_name'];


    $query = "INSERT INTO clients (`dat`,`client_name`) VALUES ('$dat','$client_name')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../../clients.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>