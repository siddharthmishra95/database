<?php

//fetch.php

include '../../../config/dbconfig.php';

if(isset($_POST["created_at"]))
{
 $query = "
 SELECT status, count(*) as number FROM `crud`   
 WHERE created_at = '".$_POST["created_at"]."' 
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