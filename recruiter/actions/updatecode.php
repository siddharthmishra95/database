<?php
include '../../config/dbconfig.php';

    if(isset($_POST['updatedata']))
    {   
        $usr_id = $_POST['update_id'];
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $empid = $_POST['empid'];
        $role = $_POST['role'];

        $query = "UPDATE registration SET name='$name', email='$email', password='$password', empid=' $empid', role=' $role' WHERE usr_id='$usr_id'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:../Employee.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>