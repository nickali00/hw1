<html>
	<body>
		<?php
			include"connessione.php";
			if(isset($_POST["email"]) && isset($_POST["pas"]) )
			{							
			}else {
					echo "<h1>email esistente</h1>";
					$newpage="index.php";
					header('Refresh: 2; url=' . $newpage);
				}


			session_start();
			$strqry="SELECT * FROM `user` where email='".stripcslashes($_POST['email'])."' and password ='".MD5(stripcslashes($_POST['pas']))."'";
			$dati=mysqli_query($conn,$strqry);
			$res=mysqli_fetch_array($dati);
			if(mysqli_num_rows($dati)!=0)
			{
				$_SESSION['autorizzato']=1;
				$_SESSION['id']=$res["id"];
    		$_SESSION['livello']=$res["livello"];
				mysqli_close($conn);
				header("location: home.php");
			}else{
				mysqli_close($conn);
				header("location: index.html");
			}

		?>
	</body>
</html>
