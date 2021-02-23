
    <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Formulaire de demande de modification de mot de passe -->
	
    <?php require_once('../../Tools/linkCSS.php') ?>
    
  	<!-- START nav -->
  	<?php  require_once('../../Tools/NavBar.php') ?>
    <!-- END nav -->

  </head>
  <body>

  
  <form  action="../../Traitement/User/MdpOublierT.php" method="post">


<input type="email" id="mail" name="mail" placeholder="Entrer votre mail" required /></br> </br>


<button class="primary-btn text-uppercase" onclick="window.location='MdpOublier2';">confirmation !</button>

</br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br>


    
  
    
    <input type="submit" value="retour"/><br><br>

    </form>
    














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

--!>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	
  <?php require_once('../../Tools/linkJS.php') ?>
    
  </body>    
  
  <!--START footer-->
    <?php  require_once('../../Tools/Footer.php') ?>
  <!--END footer-->

</html>