<?php
session_start();
if(isset($_SESSION['email'])) {
  header("Location: list_departments.php");
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php include "components/nav-bar.php"; ?>

    <h1>Login page</h1>
    <form action="../actions/action_login.php" method="post">
      <labele>Email</label>
      <input type="email" name="email"> <br><br>
      <labele>Password</label>
      <input type="password" name="password"> <br><br>
      <input type="submit"  value="Enter">
    </form>
    <h3>Email: joao.cunha@s.pt Pass: 12345</h3>
    <h3 style="color:red">
      <?php
      if(isset($_SESSION['login-error'])  && $_SESSION['login-error'] =="true") {
        echo "Your email and password do not match";
        $_SESSION['login-error']  = "";
      }

       ?>

    </h3>

  </body>
</html>
