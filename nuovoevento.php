<?php
	include "connessione.php";
	session_start();
?>
<html>
	<head>
		<title>Nuovo evento</title>
		<link rel="stylesheet"  type="text/css" href="index.css"/>
  	<link rel="stylesheet" href="login.css" />
		<script src="compila.js" defer="true"></script>
	</head>
	<body>
  	<header>
			<nav id = "flex2">
				<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
					<div class="menu"><input type="submit" value="PREFERITI" name='submit'></div>
				</form>
				<div class="menu"><a href="home.php">TUTTI</a></div>
 				<?php if($_SESSION['livello']==1){?>
					<div class="menu"><a href="nuovoevento.php">NUOVO EVENTO</a></div>
				<?php }?>
				<div class="menu"><a href="logout.php">LOGOUT</a></div>
			</nav>
    </header>
		<?php if(isset($_SESSION['id'])){?>
  	<section>
  		<div class="inserisci">
				<form action ="tbevento.php" method ="post" enctype="multipart/form-data"  onsubmit="submitForm(event)">
					<h1>REGISTRAZIONE</h1>
        	<section class="credenziali">
      			<h4 class="in">Immagine</h4> <input name="image" id="imgfile" type="file" class="inputheader"/>
    			</section>

  				<section class="credenziali">
   					<h4 class="in">Titolo</h4> <input class="inputheader" type="text" name="titolo" >
   				</section>
     			<section class="credenziali">
    				<h4 class="in">Descrizione</h4> <input class="inputheader" type="text" name="descrizione" >
    			</section>
          <section class="credenziali">
    				<h4 class="in">Data</h4> <input class="inputheader" type="date" name="data" >
    			</section>
					<div class="nascosto" name=" sem" >0</div>
    			<div class="divin">
    				<div class="menu"><a href="home.php">indietro</a></div>
						<div class="menu"><input type="submit" value="Aggiungi" ></div>
		 			</div>
				</form>
			</div>
			<div class="errore"></div>
		</section>
		<?php
	}?>
	</body>
</html>
