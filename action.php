<?php

include 'config/dbconfig.php';

	$update=false;
		$id="";
		$dat="";
		$data="";
		$uploaded="";
		$clientname="";
		$workingdept="";
		$name="";
		$companyname="";
		$designation="";
		$qualification="";
		$experience="";
		$currentsal="";
		$expectedsal="";
		$noticeperiod="";
		$address="";
		$peraddress="";
		$phone="";
		$email="";
		$status="";
		$remarks="";
		$department="";
		$resume="";
		


	if(isset($_POST['add'])){
		$dat=$_POST['dat'];
		$data=$_POST['data'];
		$uploaded=$_POST['uploaded'];
		$clientname=$_POST['clientname'];
		$workingdept=$_POST['workingdept'];
		$name=$_POST['name'];
		$companyname=$_POST['companyname'];
		$designation=$_POST['designation'];
		$qualification=$_POST['qualification'];
		$experience=$_POST['experience'];
		$currentsal=$_POST['currentsal'];
		$expectedsal=$_POST['expectedsal'];
		$noticeperiod=$_POST['noticeperiod'];
		$address=$_POST['address'];
		$peraddress=$_POST['peraddress'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		
		$status=$_POST['status'];
		$remarks=$_POST['remarks'];
		$department=$_POST['department'];
		$resume=$_FILES['resume']['name'];
		$upload="../uploads/".$resume;
		
    $sql_e = "SELECT * FROM crud WHERE email='$email'";
    $res_e = mysqli_query($conn, $sql_e);
    if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already Exists In Database"; 	
  	}else{
		$query="INSERT INTO crud(dat,data,uploaded,clientname,workingdept,name,companyname,designation,qualification,experience,currentsal,expectedsal,noticeperiod,address,peraddress,phone,email,status,remarks,department,resume)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssssssssssssssssss",$dat,$data,$uploaded,$clientname,$workingdept,$name,$companyname,$designation,$qualification,$experience,$currentsal,$expectedsal,$noticeperiod,$address,$peraddress,$phone,$email,$status,$remarks,$department,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['resume']['tmp_name'], $upload);

		header('location:dashboard.php');
		$_SESSION['response']="Candidate Added Successfully!";
		$_SESSION['res_type']="success";
	}
}	



// EDIT AND UPDATE CODE
if(isset($_GET['edit'])){
  function bindAll($stmt) {
$meta = $stmt->result_metadata();
$fields = array();
$fieldRefs = array();
while ($field = $meta->fetch_field())
{
$fields[$field->name] = "";
$fieldRefs[] = &$fields[$field->name];
}

call_user_func_array(array($stmt, 'bind_result'), $fieldRefs);
$stmt->store_result();
//var_dump($fields);
return $fields;
}

function fetchRowAssoc($stmt, &$fields) {
if ($stmt->fetch()) {
return $fields;
}
return false;
}
$id=$_GET['edit'];

$query="SELECT * FROM crud WHERE id=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute();
$fields = bindAll($stmt);
$row = fetchRowAssoc($stmt, $fields);

$id=$row['id'];
$dat=$row['dat'];
$data=$row['data'];
$uploaded=$row['uploaded'];
$clientname=$row['clientname'];
$workingdept=$row['workingdept'];
$name=$row['name'];
$companyname=$row['companyname'];
$designation=$row['designation'];
$qualification=$row['qualification'];
$experience=$row['experience'];
$currentsal=$row['currentsal'];
$expectedsal=$row['expectedsal'];
$noticeperiod=$row['noticeperiod'];
$address=$row['address'];
$peraddress=$row['peraddress'];
$phone=$row['phone'];
$email=$row['email'];
$short=$row['short'];
$ror=$row['ror'];
$doi=$row['doi'];
$shortfirst=$row['shortfirst'];
$dof=$row['dof'];
$shortfinal=$row['shortfinal'];
$dos=$row['dos'];
$selected=$row['selected'];
$joined=$row['joined'];
$status=$row['status'];
$remarks=$row['remarks'];
$department=$row['department'];								
$resume=$row['resume'];
$update=true;
}


if(isset($_POST['update'])){
$id=$_POST['id'];
$dat=$_POST['dat'];
$data=$_POST['data'];
$uploaded=$_POST['uploaded'];
$clientname=$_POST['clientname'];

$workingdept=$_POST['workingdept'];
$name=$_POST['name'];
$companyname=$_POST['companyname'];
$designation=$_POST['designation'];
$qualification=$_POST['qualification'];
$experience=$_POST['experience'];
$currentsal=$_POST['currentsal'];
$expectedsal=$_POST['expectedsal'];
$noticeperiod=$_POST['noticeperiod'];
$address=$_POST['address'];
$peraddress=$_POST['peraddress'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$short=$_POST['short'];
$ror=$_POST['ror'];
$doi=$_POST['doi'];
$shortfirst=$_POST['shortfirst'];
$dof=$_POST['dof'];
$shortfinal=$_POST['shortfinal'];
$dos=$_POST['dos'];
$selected=$_POST['selected'];
$joined=$_POST['joined'];
$status=$_POST['status'];
$remarks=$_POST['remarks'];
$department=$_POST['department'];
$oldresume=$_POST['oldresume'];

if(isset($_FILES['resume']['name'])&&($_FILES['resume']['name']!="")){
$newresume="uploads/".$_FILES['resume']['name'];
unlink($oldresume);
move_uploaded_file($_FILES['resume']['tmp_name'], $newresume);
}
else {
$newresume=$oldresume;
}
$query="UPDATE crud SET dat=?, data=?, uploaded=?, clientname=?, workingdept=?, name=?, companyname=?, designation=?, qualification=?, experience=?, currentsal=?, expectedsal=?, noticeperiod=?, address=?, peraddress=?, phone=?, email=?, short=?, ror=?, doi=?, shortfirst=?, dof=?, shortfinal=?, dos=?, selected=?, joined=?, status=?, remarks=?, department=?, resume=? WHERE id=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("ssssssssssssssssssssssssssssssi",$dat,$data,$uploaded,$clientname,$workingdept,$name,$companyname,$designation,$qualification,$experience,$currentsal,$expectedsal,$noticeperiod,$address,$peraddress,$phone,$email,$short,$ror,$doi,$shortfirst,$dof,$shortfinal,$dos,$selected,$joined,$status,$remarks,$department,$newresume,$id);
$stmt->execute();

$_SESSION['response']="Profile Updated Successfully!!";
$_SESSION['res_type']="primary";
header("location:dashboard.php");
}


?>