<?php
require_once("../config/dbconfig.php");
//code check email
if(!empty($_POST["emailid"])) {
$result = mysqli_query($conn,"SELECT count(*) FROM crud WHERE email='" . $_POST["emailid"] . "'");
$row = mysqli_fetch_row($result);
$email_count = $row[0];
if($email_count>0) echo "<span style='color:red'>Email Already Exist. Check your Database.</span>";
else echo "<span style='color:green'>Email Available. Please Fill up the Form</span>";
}
?>