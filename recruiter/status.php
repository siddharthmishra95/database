<?php

/******************************************ENABLE AND DISABLE USER*********************************************/ 
include '../config/dbconfig.php';
$usr_id = $_GET['usr_id'];
$usr_status = $_GET['usr_status'];

$query = "UPDATE registration set usr_status = $usr_status where usr_id = $usr_id";
mysqli_query($conn, $query);
header('location:Employee.php');

/******************************************ENABLE AND DISABLE USER*********************************************/ 

?>