<?php
 include"connessione.php";


$strqry="SELECT * FROM `user` ";
 $dati=mysqli_query($conn,$strqry);
 $js=array();
 while($res=mysqli_fetch_array($dati))
 {
 array_push($js,array(
           'esiste'=>	$res["email"],
           'livello'=>	$res["livello"]
          ));
}
echo json_encode(array('mhw4'=>$js));


?>
