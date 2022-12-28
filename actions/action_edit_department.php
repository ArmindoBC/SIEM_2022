<?php
include "../includes/connect_db.php";
include "../database/departament.php";

$name ="";
$address = "";
$n_phone ="";
$department_id ="";
if(isset($_POST['department_id'])){
  $department_id = $_POST['department_id'];
}
if(isset($_POST['name'])){
  $name = $_POST['name'];
}
if(isset($_POST['address'])){
  $address = $_POST['address'];
}
if(isset($_POST['n_phone'])){
  $n_phone = $_POST['n_phone'];
}

updateDepartment($name, $address, $n_phone, $department_id);

header("Location: ../pages/list_departments.php");

 ?>
