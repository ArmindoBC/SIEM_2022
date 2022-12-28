<?php
session_start();
include "../includes/connect_db.php";
include "../database/employee.php";
$email = "";
$password = "";

if(isset($_POST['email']) && !empty($_POST['email'])){
  $email = $_POST['email'];
}

if(isset($_POST['password']) && !empty($_POST['password'])){
  $password = $_POST['password'];
}

$result = login($email, $password);

$num_rows = pg_numrows($result);

if($num_rows > 0){
  //login
  $row = pg_fetch_assoc($result);
  $_SESSION["email"] = $email;
  $_SESSION["name"] = $row['name'];
  header("Location: ../pages/list_departments.php");
}
else {
    //the login was successfull
    $_SESSION['login-error']  = "true";
    header("Location: ../pages/login.php");
    }
 ?>
