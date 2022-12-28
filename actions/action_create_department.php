<?php
include "../includes/connect_db.php";
include "../database/department.php";

$name ="";
$address = "";
$n_phone ="";

if(isset($_POST['name'])){
  $name = $_POST['name'];
}
if(isset($_POST['address'])){
  $address = $_POST['address'];
}
if(isset($_POST['n_phone'])){
  $n_phone = $_POST['n_phone'];
}

createDepartment($name, $address, $n_phone);

header("Location: ../pages/list_departments.php");

 ?>
