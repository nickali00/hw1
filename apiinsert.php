<?php
  include"connessione.php";

  $strqry=  "INSERT INTO tbchat (`id`, `fkutente`, `fkevento`, `scritto`)  VALUES (NULL,'".$_GET["ut"]."','".$_GET["id"]."','".stripcslashes($_GET["tx"])."')";
  if (!mysqli_query($conn,$strqry))
  {
    echo("Error description: " . mysqli_error($conn));
  }
  mysqli_close($conn);

?>
