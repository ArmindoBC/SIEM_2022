<?php
include "../includes/connect_db.php";
include "../database/department.php";

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Department</title>
    <?php
    $department_id ="";

    if(isset($_GET["department_id"])){
      $department_id = $_GET["department_id"];

      $result = getDepartmentById($department_id);

      $row = pg_fetch_assoc($result);
     ?>
  </head>
  <body>
    <?php include "components/nav-bar.php"; ?>
    
    <h1>Edit Department</h1>

    <form action="../actions/action_edit_department.php" method="post">
      <label>Name</label><br>
      <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>

      <label>Address</label><br>
      <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>

      <label>Phone Number</label><br>
      <input type="text" name="n_phone"  value="<?php echo $row['n_phone']; ?>"><br>
      <input type="hidden" name="department_id" value="<?php echo $row['departament_id']; ?>">

      <input type="submit" value="Create Department"><br>

    </form>
  <?php }else {
    echo "Invalid URL or DepartmentID";
  } ?>
  </body>
</html>
