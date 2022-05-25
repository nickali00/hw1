<?php
 session_start();
if(isset($_SESSION['id']))
  {
    include"connessione.php";
    if($_GET['tipo']==1){
      $strqry="DELETE FROM `tbpreferit` WHERE `tbpreferit`.`fklike` ='".$_GET['id']."' and tbpreferit.fkuser='".$_GET['user']."'";
      $val=$_GET['val']-1;
    }else if($_GET['tipo']==2){
      $strqry="INSERT INTO `tbpreferit` (`id`, `fklike`, `fkuser`) VALUES (null,'".$_GET['id']."', '".$_GET['user']."')";
      $val=$_GET['val']+1;
    }else if($_GET['tipo']==3){
      $strqry="DELETE FROM `tbeventi` WHERE `tbeventi`.`idevento` ='".$_GET['id']."'";
      $strqry2="DELETE FROM `tblike` WHERE `tblike`.`id` ='".$_GET['id']."'";
      if (!mysqli_query($conn,$strqry2))
      {
        echo("Error description1: " . mysqli_error($conn));
      }
    }
    if (!mysqli_query($conn,$strqry))
     {
       echo("Error description1: " . mysqli_error($conn));
     }else {
       if(isset($_GET['val'])){
         $strqry2="UPDATE `tblike` SET numvoti ='".$val."'  WHERE `tblike`.`id` = '".$_GET['id']."'";
         if (!mysqli_query($conn,$strqry2))
         {
           echo("Error description2: " . mysqli_error($conn));
         }
      }
    }
    $ultima=$_SERVER['HTTP_REFERER'];
    header("location:".$ultima);
   }
?>
