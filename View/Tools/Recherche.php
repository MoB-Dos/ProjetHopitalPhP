<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php require_once('../../Tools/linkCSS.php') ?>

  </head>
  <body>
    

  	<!-- START nav -->
  	<?php  require_once('../../Tools/NavBar.php') ?>

    <div class="hero-wrap" style="background-image: url('../../Design/images/bg_6.jpg'); background-attachment:fixed;">
	<div class="hero-wrap" style="background-image: url('../../Design/images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span> <span>Docteur</span></p>
            <h1 class="mb-3 bread">Des Docteurs exceptionnel</h1>
			<form action="../Tools/Recherche.php" class="subscribe-form" method="post">
                    <div class="form-group d-flex">
                      <input type="text"name="Recherche" class="form-control" placeholder="Entrer votre recherche">
                      <input type="submit" value="Recherche" class="submit px-3">
          </div>
        </div>
      </div>
    </div>



    <!-- END nav -->
<section class="ftco-section">
  <div class="container">
  <div class="flipper">
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
  </div>
</section>
		

    <!--START footer-->
    <?php  require_once('../../Tools/Footer.php') ?>
    <!--END footer-->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>




    <?php require_once('../../Tools/linkJS.php') ?>

    
  </body>
</html>
