<?php

/******************************************ENABLE AND DISABLE EMPLOYEE*********************************************/ 
include '../config/dbconfig.php';
$usr_id = $_GET['usr_id'];
$usr_status = $_GET['usr_status'];

$query = "UPDATE registration set usr_status = $usr_status where usr_id = $usr_id";
mysqli_query($conn, $query);
header('location:Employee.php');

/******************************************ENABLE AND DISABLE EMPLOYEE*********************************************/ 

/******************************************ENABLE AND DISABLE CLIENTS*********************************************/ 
$id = $_GET['id'];
$client_status = $_GET['client_status'];

$query = "UPDATE clients set client_status = $client_status where id = $id";
mysqli_query($conn, $query);
header('location:clients.php');

/******************************************ENABLE AND DISABLE CLIENTS*********************************************/ 

?>