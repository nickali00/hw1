<?php
  session_start();
  include"connessione.php";
  $percorso='immagini/';
  echo($_POST['punto']);
  if($_POST['punto']=="punto")
  {
    $nomeDef="logo.png";
  }else{

function file_extension($filename)
  {
    $ext = explode(".", $filename);
    return $ext[count($ext)-1];
  }
  $msg="Nessun file selezionato !!";
  if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $msg="File caricato con successo !!";
    // Controllo che il file non superi i 800 KB
    if ($_FILES['image']['size'] > 11807200) {
      $msg = "<p>Il file non deve superare gli 800 KB!!</p>";
      die($msg);
    }
 $tipo=file_extension($_FILES['image']['name']);
    //echo $_FILES['image']['tmp_name'];
    // Ottengo le informazioni sull'immagine
    list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
    // Controllo che le dimensioni (in pixel) non superino 960x1080
    if (($width > 9960) || ($height > 91080)) {
        $msg = "<p>Dimensioni non corrette!!</p>";
       die($msg);
    }
    $tipo=file_extension($_FILES['image']['name']);
    // Restituisce: l'estensione passando il nome completo del file

    // Controllo che il file sia in uno dei formati GIF, JPG o PNG
    // Senza questo controllo posso caricare tutti i file

    if (($tipo!="png") && ($tipo!="jpg") && ($tipo!="gif")) {
      $msg = "<p>Formato non corretto!!</p>";
      die($msg);
    }

    // Verifico che sul sul server non esista già un file con lo stesso nome
    if (file_exists($percorso.$_FILES['image']['name'])) {
      $msg = "<p>File gia' esistente sul server. Rinominarlo e riprovare.</p>";
      die($msg);
    }

    $tempidn="data".date("d-m-y")."ora".date("H-i-s");
	  $nomeDef="foto".$tempidn.".".$tipo;
      // Sposto il file nella cartella da me desiderata
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $percorso.$nomeDef)) {
      $msg = "<p>Errore nel caricamento dell'immagine!!</p>";
	     die($msg);
    }
  }
  echo $msg;
  $per=$percorso.$_FILES['image']['name'];
 }

 $strqry="INSERT INTO `tblike` (`id`, `numvoti`) VALUES (NULL, '0')";
 if (!mysqli_query($conn,$strqry))
 {
   echo("Error description: " . mysqli_error($conn));
 }

 $ultimo_id=mysqli_insert_id($conn);

 $time = strtotime($_POST['data']);
 if ($time) {
   $new_date = date('Y-m-d', $time);
 }
 $cerca = array("'",'"');
 $sostituisci = array("\'",'\"');
 $tit=str_replace($cerca, $sostituisci, $_POST['titolo']);
 $descrizione=str_replace($cerca, $sostituisci, $_POST['titolo']);
 $strqry="INSERT INTO `tbeventi` (`idevento`, `titolo`, `descrizione`, `data`, `fklike`, `img`) VALUES (NULL,'".$tit."','".$descrizione."' ,'".$new_date."','".$ultimo_id."','".$nomeDef."')";
 if (!mysqli_query($conn,$strqry))
 {
  echo("Error description: " . mysqli_error($conn));
 }
 header("location: home.php");
 mysqli_close($conn);
?>
