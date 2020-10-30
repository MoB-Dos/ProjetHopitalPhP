<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	
    <?php  require_once('../../../Tools/linkCSS.html') ?>
    
  	<!-- START nav -->
  	<?php  require_once('../../../Tools/NavBar.php') ?>
    <!-- END nav -->

  </head>
  <body>



  
  <section class="ftco-section-parallax">
    <div class="container">
      <div  class="row">
            <img src="/Slam2/ProjethopitalPHP/Hopital/Design/images/doctor-1.jpg" width="400" height="500">
				<div class="col-md-9 p-t-2">
					<h2 class="h2-responsive">Jarves Paul <button type="button" class="btn btn-info-outline waves-effect" data-toggle="modal" data-target="#RendezVouss" >Prendre RDV</button></h2>
                    
                </div>
      </div>
    </div>
  </section>


  

<!--Rendez vous -->
<div class="modal fade" id="RendezVouss" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Prendre Rendez vous avec Paul Jarves</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <form action="/Slam2/ProjethopitalPHP/Hopital/Traitement/RendezVous/rendezvousT.php" method="post">



              <div class="form-group">

                <label for="appointment_name" class="text-black" name="Prenom">Date</label>
                <input type="Date" class="form-control" id="date" name="date">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="Nom">Heure</label>
                <input type="Time" class="form-control" id="heure" name="heure">
              </div>

   




              <div class="form-group">
                <label for="appointment_name" class="text-black" name="Adresse">Motif</label>
                <input type="text" class="form-control" id="motif" name="motif">
              </div>

            <div class="form-group">

                <input type="submit" value="Continuer" class="btn btn-primary">
              </div>
              
            </form>
          </div>
          
        </div>
      </div>
    </div>
<!--Rendez vous Fin-->





		


    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	
  <?php  require_once('../../../Tools/linkJS.html') ?>
    
  </body>    
  
  <!--START footer-->
    <?php  require_once('../../../Tools/Footer.php') ?>
  <!--END footer-->

</html>