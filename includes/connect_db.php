<?php

$conn = pg_connect("host=db.fe.up.pt dbname=asi2223 user=asi2223 password=vczHKdDO");

if(!$conn){
  echo "the connection was not done";
}

$query = "SET SCHEMA 'asi'";
pg_exec($query);

 ?>
