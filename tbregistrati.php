<html>
  <body>
    <?php
      include"connessione.php";

      //verifico che tutti i campi sono stati riempiti
      if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["pas"]))
      {
        //verifico email esistente
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        if (preg_match($pattern, trim($_POST["email"])))
        {
          //verifico se email esiste
          $strqry="SELECT * FROM `user`where email='".$_POST["email"]."'";
          $dati=mysqli_query($conn,$strqry);
          if(mysqli_num_rows($dati)!=0){
            echo "<h1>email esistente</h1>";
            $newpage="index.php";
            header('Refresh: 2; url=' . $newpage);
          }
          //verifico password
          echo(strlen($_POST["pas"]));
          if(strlen($_POST["pas"])>4 && strlen($_POST["pas"])<16)
          {

          }else{
            echo "<h1>password non valida</h1>";
            		 $newpage="index.php";
            	 header('Refresh: 2; url=' . $newpage);
          }
        }else{
          echo "<h1>formato email non valido</h1>";
               $newpage="index.php";
             header('Refresh: 2; url=' . $newpage);
        }
      }else{
        echo "<h1>riempi tutti i campi</h1>";
        		 $newpage="index.php";
        	 header('Refresh: 2; url=' . $newpage);

      }
      $nome=str($_POST["nome"]);
      $cognome=str($_POST["cognome"]);
      $pas=str($_POST['pas']);
      $strqry= "INSERT INTO `user` (`id`, `Nome`, `Cognome`, `email`, `password`, `livello`) VALUES (NULL, '".$nome."' ,'".$cognome."' , '".$_POST['email']."','".MD5($pas)."','0')";
      if (!mysqli_query($conn,$strqry))
      {
        echo("Error description: " . mysqli_error($conn));
      }
      mysqli_close($conn);
      header("location: index.html");

    function str($s)
    {
      $cerca = array("'",'"');
      $sostituisci = array("\'",'\"');
      return str_replace($cerca, $sostituisci, $s);
    }
    ?>
  </body>
</html>
