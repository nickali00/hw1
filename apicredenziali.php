<?php
  include"connessione.php";

  $strqry=  "UPDATE `user` SET `password` = '".md5($_GET["pass"])."' WHERE user.livello='".$_GET["tk"]."'";
  echo($strqry);
  if (!mysqli_query($conn,$strqry))
  {
    echo("Error description: " . mysqli_error($conn));
  }

  $strqry=  "UPDATE `user` SET `livello` = '0' WHERE user.livello='".$_GET["tk"]."'";
  echo($strqry);
  if (!mysqli_query($conn,$strqry))
  {
    echo("Error description: " . mysqli_error($conn));
  }
  mysqli_close($conn);

?>
