<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Class Javascript</title>
    <style >
  #out-div{
    margin-top: 10px;
    background-color: grey;
    width: 200px;
    height: 20px;
    display: none;
  }
  #in-div{
    height: 100%;

  }
</style>
<script type="text/javascript" src="../js/utils.js"></script>
</head>
  <body>
  <form name="date-form" action="#" onsubmit="return validateDate()" method="post" >
    <label>From</label>
    <input type="date" name="date-ini" ><br>
    <label>To</label>
    <input type="date" name="date-end" ><br>
    <!-- Example of the password strenght -->
    <input type="password" name="password" onkeydown="validatePassword(this.value)"><br>
    <div id="out-div">
        <div id="in-div">

        </div>
    </div>

    <span id="msg"></span>
    <br>
    <input type="submit">
  </form>
  <span id="error-message" style="color:red"></span>
  </body>
</html>
