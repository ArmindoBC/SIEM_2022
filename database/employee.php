<?php

function login($email, $password){
  global $conn;
  $query = "SELECT * FROM employee WHERE email='$email' AND password='$password'";
  $result = pg_exec($conn,  $query);
  return $result; 
}
 ?>
