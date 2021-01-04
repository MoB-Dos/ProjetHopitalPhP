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
  
  $req=$bdd->prepare(" SELECT * FROM infouser INNER JOIN user ON infouser.idUser = user.idUser WHERE user.sessionId = ? ");
  $req->execute(array( $_SESSION['sessionId']));
  $data = $req->fetch();
  
  ?>
    

  
  <div class="container" style="margin-top: 100px;margin-bottom: 100px;font-size:20px;">
    <!-- Formulaire de modification -->
  
  <form method="post" action="../../Traitement/User/ModifT.php">
                    
    <div class="row">
    <div class="col-lg-6">

      <div class="form-group">
        <label for="appointment_name" class="text-black" name="prenom"><b>Prénom</b></label>
        <input type="text" class="form-control" id="prenom" name="prenom" value=<?php echo $data['prenom'];?> required>
      </div>

      <div class="form-group">
        <label for="appointment_name" class="text-black" name="nom"><b>Nom</b></label>
        <input type="text" class="form-control" id="nom"  value=<?php echo $data['nom'];?> name="nom" required>
      </div>

      <div class="form-group">
        <label for="appointment_name" class="text-black" name="date"><b>Date de naissance</b></label>
        <input type="Date" class="form-control" id="birthday"   value=<?php echo $data['date'];?> name="birthday" >
      </div>

      <div class="form-group">
        <label for="appointment_name" class="text-black" name="adresse"><b>Adresse</b></label>
        <input type="text" class="form-control" id="adresse"   value=<?php echo $data['adresse'];?> name="adresse" required>
      </div>

    </div>

    <div class="col-lg-6" >

      <div class="form-group">
        <label for="appointment_name" class="text-black" name="sq"><b>Sécurité sociale</b></label>
        <input type="text" class="form-control" id="sq" value=<?php echo $data['secusocial'];?>  name="sq" required>
      </div>

      <div class="form-group">
        <label for="appointment_name" class="text-black" name="mutuel"><b>Mutuel</b></label>
        <input type="text" class="form-control" id="mutuel" value=<?php echo $data['mutuel'];?>  name="mutuel" required>
      </div>

      <div class="form-group">
        <div class="row" style="margin-left: 0px;margin-bottom: -50px;">

          <!-- Option Tv -->
          <div class="form-group">
            <label for="appointment_name" class="text-black" name="tvradio"><b>Option TV</b></label>

          <div class="form-group">
            <label  for="tvOui">Oui</label>
            <input type="radio"  value="1" id="tvOui" name="tvradio" <?php echo ($data['optionTV'] == 'oui') ? 'checked': '';?>> </br>

            <label  class="text-black" for="tvNon">Non</label>
            <input type="radio"  value="0" id="tvNon" name="tvradio" <?php echo ($data['optionTV'] == 'non') ? 'checked': '';?> >
          </div>
          </div>


          <!-- Option Wifi -->
          <div class="form-group" style="margin-left: 50px;">
            <label for="appointment_name" class="text-black" name="wifiradio"><b>Option Wifi</b></label>

          <div class="form-group">
            <label  for="wifiOui">Oui</label>
            <input type="radio"  value="1" id="wifiOui" name="wifiradio" <?php echo ($data['optionWifi'] == 'oui') ? 'checked': '';?> > </br>

            <label  class="text-black" for="wifiNon">Non</label>
            <input type="radio" value="0" id="wifiNon" name="wifiradio" <?php echo ($data['optionWifi'] == 'non') ? 'checked': '';?> >
          </div>
          </div>


        </div> 
      </div> 


      <div class="form-group">
        <label for="appointment_email" class="text-black" name="regime"><b>Régime</b></label>
        <select  class="form-control" id="regime" name="regime" required>
            <option value="" disabled selected>Choissisez votre régime</option>
            <option value="1" <?php echo ($data['regime'] == 'vegetarien') ? 'selected': '';?>>Végétarien</option>
            <option value="2" <?php echo ($data['regime'] == 'vegan') ? 'selected': '';?>>Vegan</option>
            <option value="3" <?php echo ($data['regime'] == 'halal') ? 'selected': '';?>>Halal</option>
            <option value="3" <?php echo ($data['regime'] == 'kacher') ? 'selected': '';?>>Kacher</option>
        </select>
      </div>

    </div>

    </div>
    <div class="row">

    <div class="col-md-2 ml-auto">
      <div class="form-group">
        <input type="submit" value="Continuer" class="btn btn-primary">
      </div>
      </div>
    </div>



    </form>
    </div>
    
    </div>
    
    </div>
</div>

    














<!--

          <form action="Traitement/Dossier/dossierPatienT.php" method="post">
          <div class="champ">
          <section class="ftco-section-parallax">
    <div class="container">
      <div  class="row">
            <img src="/ProjethopitalPHP/Hopital/Design/images/doctor-1.jpg" width="400" height="500">
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