<?php
session_start();
include "../includes/connect_db.php";
include "../database/department.php";

$name ="";
$address = "";
$n_phone ="";
$department_id ="";

$error_name = false;
$error_address = false;
$error_n_phone =  false;

// data validation for the name
if(!isset($_POST['name']) || empty($_POST['name'])){
  $error_name = true;
  $_SESSION["error-name"] = "true";
  $_SESSION["name-form"] = "";
}
else {
  $_SESSION["name-form"] = $_POST['name'];
}

//data validation for the address
if(!isset($_POST['address']) || empty($_POST['address'])){
  $error_address = true;
  $_SESSION["error-address"] = "true";
  $_SESSION["address-form"] = "";
}
else {
  $_SESSION["address-form"] = $_POST['address'];
}

//data validation for the phone number
if(!isset($_POST['n_phone']) || empty($_POST['n_phone'])){
  $error_n_phone = true;
  $_SESSION["error-n_phone"] = "true";
  $_SESSION["n_phone-form"] = "";
}
else {
  $_SESSION["n_phone-form"] = $_POST['n_phone'];
}

if(isset($_POST['department_id']) && !$error_name && !$error_address && !$error_n_phone){
  $department_id = $_POST['department_id'];
  $name =$_POST['name'];
  $address = $_POST['address'];
  $n_phone =$_POST['n_phone'];

  $fileName ="";
  // Upload Image Code
  if (isset($_FILES["image"]["error"]) && $_FILES["image"]["error"] > 0)
  {
  //handling the image upload error
  }
  else
  {
  $prefix = 'uploaded_image' . date('Y-m-d H:i:s', time()); //create a prefix to add to filename to ensure that we don't have two files in the same folder with the same name
  $fileName = $prefix . $_FILES["image"]["name"]; // creating the filename on the server
  $fileName = str_replace(' ', '', $fileName); //removing spaces
  $fileName = str_replace(':', '', $fileName);
  $fileName = str_replace('-', '', $fileName);
  $location = '../images/' . $fileName; // defining the final destination of the file
  move_uploaded_file($_FILES["image"]["tmp_name"], $location);
  }

  updateDepartment($name, $address, $n_phone, $department_id, $fileName);
  $_SESSION['form-success'] = "true";
  header("Location: ../pages/list_departments.php");

}
elseif(!$error_name && !$error_address && !$error_n_phone){
  $name =$_POST['name'];
  $address = $_POST['address'];
  $n_phone =$_POST['n_phone'];

  $fileName ="";
  // Upload Image Code
  if (isset($_FILES["image"]["error"]) && $_FILES["image"]["error"] > 0)
  {
  //handling the image upload error
  }
  else
  {
  $prefix = 'uploaded_image' . date('Y-m-d H:i:s', time()); //create a prefix to add to filename to ensure that we don't have two files in the same folder with the same name
  $fileName = $prefix . $_FILES["image"]["name"]; // creating the filename on the server
  $fileName = str_replace(' ', '', $fileName); //removing spaces
  $fileName = str_replace(':', '', $fileName);
  $fileName = str_replace('-', '', $fileName);
  $location = '../images/' . $fileName; // defining the final destination of the file
  move_uploaded_file($_FILES["image"]["tmp_name"], $location);
  }

  createDepartment($name, $address, $n_phone, $fileName);
  $_SESSION['form-success'] = "true";
  header("Location: ../pages/list_departments.php");

}
elseif(isset($_POST['department_id']) && ($error_name || $error_address || $error_n_phone)){
  $department_id=$_POST['department_id'];
  header("Location: ../pages/form_create_edit_department.php?department_id=" .$department_id );
}
else{
  header("Location: ../pages/form_create_edit_department.php");
}



 ?>
