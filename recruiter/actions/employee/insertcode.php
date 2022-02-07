<?php

include '../../../config/dbconfig.php';

if(isset($_POST['insertdata']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $empid = $_POST['empid'];
    $role = $_POST['role'];

    $query = "INSERT INTO registration (`name`,`email`,`password`,`empid`,`role`) VALUES ('$name','$email','$password','$empid','$role')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../../Employee.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>