<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	
    <?php  require_once('../../Tools/linkCSS.html') ?>
    
  	<!-- START nav -->
  	<?php  require_once('../../Tools/NavBar.php') ?>
    <!-- END nav -->

  </head>
  <body>

  

<?php

  try{
      $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
    }
    
    catch(Exception $e){
      die('Erreur:'.$e->getMessage());
    }
    
    // $req=$bdd->prepare('SELECT * FROM user WHERE login= ?');
    // $req->execute(array( $_SESSION['login']));
    // $data1 = $req->fetch();
    // //Sélection dans la table utilisateur
    // $req=$bdd->prepare('SELECT * FROM infouser WHERE idInfo= ?');
    // $req->execute(array( $data1[0]));
    // $data = $req->fetch();

    $req=$bdd->prepare('SELECT * FROM infouser WHERE idInfo= ?');
    $req->execute(array( $_SESSION['id']));
    $data = $req->fetch();
    
    ?>
    
    <!-- Formulaire de modification -->
    <form method="post" action="../../Traitement/User/ModifT.php">
    
    Votre nom:
      <input type="text" name="nom" value=<?php echo $data['nom'];?>>
      <br><br>
    
      Votre prenom:
      <input type="text" name="prenom" value=<?php echo $data['prenom'];?>>
      <br><br>
    
      Votre date de naissance:
      <input type="text" name="date" value=<?php echo $data['date'];?>>
      <br><br>
    
      Votre adresse:
      <input type="text" name="adresse" value=<?php echo $data['adresse'];?>>
      <br><br>

      Votre mutuel:
      <input type="text" name="mutuel" value=<?php echo $data['mutuel'];?>>
      <br><br>

      Votre sécurité sociale:
      <input type="text" name="sq" value=<?php echo $data['sq'];?>>
      <br><br>

      Votre Option Télé:
      <input type="text" name="optionTele" value=<?php echo $data['optionTele'];?>>
      <br><br>

      Votre régime:
      <input type="text" name="regime" value=<?php echo $data['regime'];?>>
      <br><br>
    
    <input type="submit" value="Envoyer"/><br><br>
    
    </form>
    














<!--

          <form action="Traitement/Dossier/dossierPatienT.php" method="post">
          <div class="champ">
          <section class="ftco-section-parallax">
    <div class="container">
      <div  class="row">
            <img src="/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-1.jpg" width="400" height="500">
				<div class="col-md-9 p-t-2">
</div>
</div>
</div>



              <div class="form-group">
                <label for="appointment_name" class="text-black" name="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" style="width:550px; height:200px;">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom"style="width:550px; height:200px;">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="date">Date de naissance</label>
                <input type="Date" class="form-control" id="date" name="date"style="width:550px; height:200px;">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse"style="width:550px; height:200px;">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="sq">"sq"</label>
                <input type="text" class="form-control" id="sq" name="sq"style="width:550px; height:200px;">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="mutuel">"Mutuel"</label>
                <input type="text" class="form-control" id="mutuel" name="mutuel"style="width:550px; height:200px;">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="OptionTV">Option TV</label>
                <input type="text" class="form-control" id="optionTv" name="optionTv"style="width:550px; height:200px;">
              </div>

              <div class="form-group">
                <label for="appointment_email" class="text-black" name="regime">Regime</label>
                <input type="text" class="form-control" id="regime" name="regime"style="width:550px; height:200px;">
              </div>
          
                
              
              <div class="form-group">
                <input type="submit" value="Continuer" class="btn btn-primary">
              </div>
              
            </form>
          </div>
          
        </div>
      </div>
    </div>

    
  

   loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	
  <?php  require_once('../../Tools/linkJS.html') ?>
    
  </body>    
  
  <!--START footer-->
    <?php  require_once('../../Tools/Footer.php') ?>
  <!--END footer-->

</html>