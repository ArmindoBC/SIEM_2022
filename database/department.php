<?php

function getAllDepartments(){
  global $conn;
  $query="SELECT * FROM departament";
  $result = pg_exec($conn, $query);
  return $result;
}

function getDepartmentById($department_id){
  global $conn;
  $query="SELECT * FROM departament WHERE departament_id = $department_id";
  $result = pg_exec($conn, $query);
  return $result;
}

function createDepartment($name, $address, $n_phone, $image){
  global $conn;
  $query = "INSERT INTO departament (name, address, n_phone, image) VALUES ('$name','$address','$n_phone', '$image')";
  pg_exec($query);
}

function updateDepartment($name, $address, $n_phone, $department_id,$image){
  global $conn;
  $query = "UPDATE departament SET name='$name', address='$address', n_phone='$n_phone', image='$image' WHERE departament_id=$department_id";
  pg_exec($conn, $query);
}



 ?>
