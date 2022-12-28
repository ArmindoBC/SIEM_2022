<?php
session_start();
include "../includes/connect_db.php";
include "../database/department.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <?php  if(isset($_GET["department_id"])){ ?>
    <title>Edit Department</title>
    <?php }
    else {?>
      <title>Create Department</title>
    <?php }

    $department_id ="";

    if(isset($_GET["department_id"])){
      $department_id = $_GET["department_id"];

      $result = getDepartmentById($department_id);

      $row = pg_fetch_assoc($result);
    }
     ?>
  </head>
  <body>
    <?php include "components/nav-bar.php"; ?>

    <?php  if(isset($_GET["department_id"])){ ?>
        <h1>Edit Department</h1>
    <?php }
            else {?>
        <h1>Create Department</h1>
          <?php } ?>

    <form action="../actions/action_create_edit_department.php" method="post" enctype="multipart/form-data">
      <label>Name</label><br>
      <input type="text" name="name" value="<?php
          if(isset($_GET["department_id"]) && (!isset($_SESSION['error-name']) || $_SESSION['error-name'] != "true"))
            {
              echo $row['name'];
            }
          elseif(isset($_SESSION["name-form"]) )
          {
            echo $_SESSION["name-form"];
          }
             ?>"><br>
      <?php if(isset($_SESSION['error-name']) && $_SESSION['error-name']=="true") {?>
        <span style="color:red">ERROR! You must insert a valid name</span><br>
      <?php } ?>

      <label>Address</label><br>
      <input type="text" name="address" value="<?php
        if(isset($_GET["department_id"]) && (!isset($_SESSION['error-address']) || $_SESSION['error-address'] != "true"))
          {
            echo $row['address'];
          }
        elseif(isset($_SESSION["address-form"]) )
        {
          echo $_SESSION["address-form"];
        }
      ?>"><br>
      <?php if(isset($_SESSION['error-address']) && $_SESSION['error-address']=="true") {?>
        <span style="color:red">ERROR! You must insert a valid address</span><br>
      <?php } ?>

      <label>Phone Number</label><br>
      <input type="text" name="n_phone"  value="<?php
        if(isset($_GET["department_id"]) && (!isset($_SESSION['error-n_phone']) || $_SESSION['error-n_phone'] != "true"))
          {
            echo $row['n_phone'];
          }
        elseif(isset($_SESSION["n_phone-form"]) )
        {
          echo $_SESSION["n_phone-form"];
        }?>"><br>
      <?php if(isset($_SESSION['error-n_phone']) && $_SESSION['error-n_phone']=="true") {?>
        <span style="color:red">ERROR! You must insert a valid phone number</span><br>
      <?php } ?>
      <?php  if(isset($_GET["department_id"])){ ?>
              <input type="hidden" name="department_id" value="<?php echo $row['departament_id']; ?>">
      <?php } ?>
      <br>
      <input type="file" name="image">
      <br>
      <br>
      <input type="submit" value="Create Department"><br>

    </form>
    <?php
        //unset the variables
        $_SESSION['name-form'] ="";
        $_SESSION['address-form'] ="";
        $_SESSION['n_phone-form'] ="";

        $_SESSION['error-name'] ="";
        $_SESSION['error-address'] ="";
        $_SESSION['error-n_phone'] ="";
    ?>

  </body>
</html>
