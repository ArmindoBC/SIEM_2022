<?php
session_start();
include "../includes/connect_db.php";
include "../database/department.php";

if(!isset($_SESSION['email'])) {
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Department List</title>
    <?php

      $result = getAllDepartments();

      $row = pg_fetch_assoc($result);

     ?>
  </head>
  <body>
    <?php include "components/nav-bar.php"; ?>
    <h1>Department List</h1>

    <?php if(isset($_SESSION['email'])) {?>
    <h3>Hello <?php echo $_SESSION['name'];  ?>  <a href="logout.php"> Logout</a></h3>
    <?php  } ?>

    <h4 style="color:green">
      <?php if(isset( $_SESSION['form-success'])) {
      echo "Department updated/created with success!";
      $_SESSION['form-success']= "";
    } ?></h4>

    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone Number</th>
      </tr>
      <?php

        while(isset($row["departament_id"])){

        echo "<tr>";
            echo "<td>".$row["departament_id"]."</td>";
            echo "<td>".$row['name'] ."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['n_phone']."</td>";
            echo "<td><img height='50px' src='../images/".$row['image']."'></td>";
            echo "<td><a href='form_create_edit_department.php?department_id=".$row["departament_id"]."'>Edit Department</a></td>";

        echo "</tr>";
        $row = pg_fetch_assoc($result);
      }
       ?>
    </table><br>
    <a href="form_create_edit_department.php">Create Department</a>
  </body>
  <?php
  //unset the variables
  $_SESSION['name-form'] ="";
  $_SESSION['address-form'] ="";
  $_SESSION['n_phone-form'] ="";

  $_SESSION['error-name'] ="";
  $_SESSION['error-address'] ="";
  $_SESSION['error-n_phone'] ="";
   ?>
</html>
