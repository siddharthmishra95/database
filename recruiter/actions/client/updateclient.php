<?php
include '../../../config/dbconfig.php';

    if(isset($_POST['updateclient']))
    {   
        $id = $_POST['update_id'];
        
        $dat = $_POST['dat'];
        $client_name = $_POST['client_name'];
        

        $query = "UPDATE clients SET dat='$dat', client_name='$client_name' WHERE id='$id'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:../../clients.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>