<?php session_start();?>
<html>
  <head>
    <link rel="stylesheet"  type="text/css" href="index.css"/>
    <script src="chat.js" defer="true"></script>
  </head>
  <body>
    <header>
      <nav id = "flex2">
        <?php if($_SESSION['livello']==0){?>
          <div class="menu">
          <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'  class="froh">
              <input type="submit" value="PREFERITI" name='submit'>
			    </form>
          </div>
        <?php }?>
        <div class="menu"><a href="home.php">TUTTI</a></div>
        <?php if($_SESSION['livello']==1){?>
          <div class="menu"><a href="nuovoevento.php">NUOVO EVENTO</a></div>
        <?php }?>
        <div class="menu"><a href="logout.php">LOGOUT</a></div>
      </nav>
    </header>
    <?php if(isset($_SESSION['id'])){?>
      <section>
        <h1> EVENTI ACIREALE </h1>
        <?php if(!isset($_POST['submit'])){
		        $curl= curl_init();
		        curl_setopt($curl, CURLOPT_URL,"http://127.0.0.1/homework1/apihome.php?var1=".date("Y-m-d"));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result= curl_exec($curl);
            curl_close($curl);
        }else{
          $dati = array("var1" => $_SESSION['id']);
          $dati = http_build_query($dati);
          $curl= curl_init();
          curl_setopt($curl, CURLOPT_URL, "http://127.0.0.1/homework1/apipreferiti.php");
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $dati);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          $result= curl_exec($curl);
          curl_close($curl);
        }
      //  echo($result);
		    $map = json_decode($result, true);
        foreach($map['mhw4']  as $mydata){?>
          <div class="cont">
        	   <h1>
               <?php echo("titolo: ".$mydata['titolo']) ;?>
        	   </h1>
             <h1>
               <?php echo ("data: ".$mydata['data']);?>
             </h1>
          </div>
          <div class="cont">
        	   <div class="cont2">
        		     <h1>
                	descrizione:
        		     </h1>
                 <p>
                   <?php echo($mydata['descrizione']) ;?>
                </p>
              </div>
              <div class="cont2">
        		      <img src="<?php echo("immagini/".$mydata['img']);?>" class="logo">
              </div>
          </div>

          <?php if($_SESSION['livello']==0){?>
   		       <div class="cont">
        	      <div>
                  <?php
                    include"connessione.php";
			              $strqry="SELECT * FROM tbpreferit,user where tbpreferit.fkuser=user.id and  tbpreferit.fklike='".$mydata['Id']."' and user.id='".$_SESSION['id']."'";
                    $dati=mysqli_query($conn,$strqry);
                    $res=mysqli_fetch_array($dati);
                    if(mysqli_num_rows($dati)!=0){
                  ?>
                    <a href="modifica.php?id=<?php echo ($mydata['Id']);?>&tipo=1&user=<?php echo ($_SESSION['id']);?>&val=<?php echo ($mydata['like']);?>">
      	               <img src="<?php echo("http://nicolaaliuni.altervista.org/mhw4/immagini/heart.png");?>">
                    </a>
                    <?php }else{?>
                       <a href="modifica.php?id=<?php echo ($mydata['Id']);?>&tipo=2&user=<?php echo ($_SESSION['id']);?>&val=<?php echo ($mydata['like']);?>">
                         <img src="<?php echo("http://nicolaaliuni.altervista.org/mhw4/immagini/hearts.png");?>">
                       </a>
                     <?php }mysqli_close($conn);?>
                     <h1>
            	          <?php echo($mydata['like']) ;?>
                    </h1>
              </div>
            <div>
              <img src="<?php echo("http://nicolaaliuni.altervista.org/mhw4/immagini/chat.png");?>" class="chat" num="<?php echo ($mydata['Id']);?>" user="<?php echo ($_SESSION['id']);?>">
            </div>
          </div>
          <?php }else if($_SESSION['livello']==1){?>
            <div class="cont">
              <a  href="modifica.php?id=<?php echo ($mydata['Id']);?>&tipo=3">
                <img src="<?php echo("http://nicolaaliuni.altervista.org/mhw4/immagini/trash2.png");?>">
             </a>
           </div>
             <?php
          }
        ?>
      <div class="spazio"> </div>
      <?php }?>
    </section>
  <?php }?>
  <section id="modal-view" class="hidden"></section>
 </body>
</html>
