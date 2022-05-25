<?php
  include"connessione.php";

  $strqry=" SELECT * FROM tbchat,user where tbchat.fkutente=user.id and tbchat.fkevento='".$_GET["num"]."'ORDER BY `tbchat`.`id` ASC";
  $dati=mysqli_query($conn,$strqry);
  $js=array();
  while($res=mysqli_fetch_array($dati))
  {
    array_push($js,array(
      'evento'=>	$res["fkevento"],
      'nome'=>$res["Nome"],
      'cognome'=>$res["Cognome"],
      'scritta'=>$res["scritto"],
      'ut'=>$res["fkutente"]
      ));
    }
    echo json_encode(array('mhw4'=>$js));
    mysqli_close($conn);

?>
