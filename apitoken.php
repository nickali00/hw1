<?php
  include"connessione.php";
  $strqry=  "UPDATE `user` SET `livello` = '".$_GET["tk"]."' WHERE user.email='".$_GET["email"]."'";
  if (!mysqli_query($conn,$strqry))
  {
    echo("Error description: " . mysqli_error($conn));
  }
  mysqli_close($conn);
?>
