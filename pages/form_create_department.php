<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Department</title>
  </head>
  <body>
    <?php include "components/nav-bar.php"; ?>
    
    <h1>Create Department</h1>

    <form action="../actions/action_create_department.php" method="post">
      <label>Name</label><br>
      <input type="text" name="name"><br>

      <label>Address</label><br>
      <input type="text" name="address" ><br>

      <label>Phone Number</label><br>
      <input type="text" name="n_phone" ><br>

      <input type="submit" value="Create Department"><br>

    </form>
  </body>
</html>
