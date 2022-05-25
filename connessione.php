<?php
  $dbhost="localhost";
  $dbuser="root";
  $dbpassword="";
  $dbname="dbevento";
  $conn=mysqli_connect($dbhost,$dbuser,$dbpassword) or
  die("connessione fallita");
  mysqli_select_db($conn,$dbname) or
  die("selezione del DB fallita");
?>
