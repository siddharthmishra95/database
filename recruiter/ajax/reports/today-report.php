<?php

//fetch.php

include '../../../config/dbconfig.php';

if(isset($_POST["uploaded"]))
{
$currentDateTime = date('d-M-Y');
 $query = "
 SELECT status, count(*) as number FROM `crud`   
 WHERE data='$currentDateTime' AND uploaded = '".$_POST["uploaded"]."' 
 GROUP By status
 ";

 $result = mysqli_query($conn, $query);
 foreach($result as $row)
 {
  $output[] = array(
   'status'   => $row["status"],
   'number'  => floatval($row["number"])
  );
 }
 echo json_encode($output);
}

?>