<?php
include "../includes/connect_db.php";

$query = "SELECT extract(month from date) as month, sum(amount) as total from sales GROUP BY month ORDER BY month";
$result = pg_exec($conn, $query);

$myObject = [];

$row =pg_fetch_assoc($result);
$i =0;
while(isset($row['month'])){

  $myObject['labels'][$i] = $row['month'];
  $myObject['data'][$i] =  $row['total'];
  $i++;
  $row =pg_fetch_assoc($result);

}
$jsObject = json_encode($myObject);
echo $jsObject;

 ?>
