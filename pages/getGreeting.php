<?php

$greeting = "";
$name = $_POST['name'];

switch ($_POST['greeting']) {
  case 'gm':
    $greeting = "Good Morning";
    break;
  case 'hello':
    $greeting = "Hello";
    break;
  case 'hi':
   $greeting = "Hi";
    break;
  case 'ge':
    $greeting = "Good Evening";
    break;
  default:
    $greeting = "Hello";
    break;
}

echo $greeting . " " . $name;

 ?>
