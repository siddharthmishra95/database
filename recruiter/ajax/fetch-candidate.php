<?php
include '../../config/dbconfig.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
$searchByName = $_POST['searchByName'];
$searchByWorkingDept = $_POST['searchByWorkingDept'];
$searchByGender = $_POST['searchByGender'];
$searchByClient = $_POST['searchByClient'];
$searchByPresentCompany = $_POST['searchByPresentCompany'];
$searchByDepartment = $_POST['searchByDepartment'];
$searchByEmail = $_POST['searchByEmail'];
$searchByContact = $_POST['searchByContact'];


## Search 
$searchQuery = " ";
if($searchByName != ''){
    $searchQuery .= " and (name like '%".$searchByName."%' ) ";
}
if($searchByWorkingDept != ''){
    $searchQuery .= " and (workingdept like '%".$searchByWorkingDept."%') ";
}
if($searchByGender != ''){
    $searchQuery .= " and (uploaded='".$searchByGender."') ";
}
if($searchByClient != ''){
    $searchQuery .= " and (clientname='".$searchByClient."') ";
}
if($searchByPresentCompany != ''){
    $searchQuery .= " and (companyname like '%".$searchByPresentCompany."%') ";
}

if($searchByDepartment != ''){
    $searchQuery .= " and (department like '%".$searchByDepartment."%') ";
}
if($searchByEmail != ''){
    $searchQuery .= " and (email like '%".$searchByEmail."%') ";
}
if($searchByContact != ''){
    $searchQuery .= " and (phone like '%".$searchByContact."%') ";
}
if($searchValue != ''){
	$searchQuery .= " and (
        email like '%".$searchValue."%' or 
        phone like'%".$searchValue."%' or) ";
}






## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from crud ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from crud WHERE 1  ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from crud WHERE 1  ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    		"id"=>$row['id'],
            "dat"=>$row['dat'],
            "data"=> $row["data"],
            "uploaded"=>$row['uploaded'],
            "clientname"=>$row['clientname'],
            "workingdept"=>$row["workingdept"],
            "name"=>$row['name'],
            "companyname"=>$row['companyname'],
            "designation"=> $row["designation"],
            "qualification"=>$row['qualification'],
            "experience"=>$row['experience'],
            "currentsal"=>$row['currentsal'],
            "expectedsal"=>$row['expectedsal'],
            "noticeperiod"=>$row['noticeperiod'],
            "address"=>$row['address'],
            "peraddress"=>$row['peraddress'],
            "phone"=>$row['phone'],
            "email"=>$row['email'],
            "short"=>$row['short'],
            "ror"=>$row['ror'],
            "doi"=>$row['doi'],
            "shortfirst"=>$row['shortfirst'],
            "dof"=>$row['dof'],
            "shortfinal"=>$row['shortfinal'],
            "dos"=>$row['dos'],
            "selected"=>$row['selected'],
            "joined"=>$row['joined'],
            "status"=>$row['status'],
            "remarks"=>$row['remarks'],
            "department"=>$row['department'],
    		"resume"=>'<a target="_blank" href="'.$row['resume'].'" height="60" width="75" class="btn btn-warning bt-xs update" />Download</a>',
            "edit"=>'<a href="editauto.php?edit='.$row['id'].'" height="60" width="75" class="btn btn-warning bt-xs update" />Edit</a>',
            "shortlist"=>'<a href="shortlist.php?shortlist='.$row['id'].'" height="60" width="75" class="btn btn-info bt-xs update" />Shortlist</a>',
    		"duplicate"=>'<a  href="duplicate.php?duplicate='.$row['id'].'" height="60" width="75" class="btn btn-danger bt-xs update" />Duplicate</a>',
    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);