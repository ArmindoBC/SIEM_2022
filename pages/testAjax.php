<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AJAX TEST</title>
    <script type="text/javascript" src="../js/utils.js"></script>
  </head>
  <body>
    <form action="#" name="greeting">
      <label>Name</label>
      <input type="text" name="name">
      <select name="greeting">
        <option value="gm">Good morning!</option>
        <option value="hello">Hello</option>
        <option value="hi">Hi</option>
        <option value="ge">Good Evening</option>
      </select>
    </form>
    <h2 id="greeting-section"></h2>
    <button type="button" onclick="serverRequest()">GET YOUR GREETING!</button>
  </body>
</html>
