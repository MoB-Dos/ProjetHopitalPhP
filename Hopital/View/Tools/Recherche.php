<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php  require_once('../../Tools/linkCSS.html') ?>

  </head>
  <body>
    

  	<!-- START nav -->
  	<?php  require_once('../../Tools/NavBar.php') ?>
    <!-- END nav -->
<section class="ftco-section">
  <div class="container">
    <div class="row">
	  
          <?php

            require '../../Class/ClassManager/User/UserManager.php';
            require '../../Class/SetUp/SetUpGestion.php';

            $rd = new SetUpGestion([
              'Recherche' => $_POST['Recherche'],
            ]);

            $try = new UserManager($rd);

            $act = $try->Recherche($rd);
          ?>
    </div>
  </div>
</section>
		

    <!--START footer-->
    <?php  require_once('../../Tools/Footer.php') ?>
    <!--END footer-->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>




    <?php  require_once('../../Tools/linkJS.html') ?>

    
  </body>
</html>
