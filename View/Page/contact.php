<?php session_start(); ?>
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
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('../../Design/images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Accueil</a></span> <span>Blog</span></p>
            <h1 class="mb-3 bread">Contactez Nous</h1>
          </div>
        </div>
      </div>
    </div>

   <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>adresse :</span> 1 Avenue Claude Vellefaux</p>
          </div>
          <div class="col-md-3">
            <p><span>téléphone :</span> <a href="tel://1234567920">01 65 45 23 09</a></p>
          </div>
          <div class="col-md-3">
            <p><span>mail:</span> <a href="mailto:info@yoursite.com">non public</a></p>
          </div>
          <div class="col-md-3">
            <p><span>site : </span> <a href="#">hopitalbariller.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
          <form action="/ProjethopitalPHP/Traitement/User/mailT.php" method="post">
              <div class="form-group">
                <input type="text" name="nom" class="form-control" placeholder="Votre Nom">
              </div>
              <div class="form-group">
                <input type="text" name="mail" class="form-control" placeholder="Votre mail">
              </div>
              <div class="form-group">
                <input type="text" name="sujet" class="form-control" placeholder="Sujet">
              </div>
              <div class="form-group">
                <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Envoyez le Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6" ><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d84005.97058279111!2d2.278611058203122!3d48.854652400000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671e176247a45%3A0x3a0d831c032bbc67!2sH%C3%B4pital%20H%C3%B4tel-Dieu%20AP-HP!5e0!3m2!1sfr!2sfr!4v1606751705106!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
        </div>
      </div>
    </section>
		

    <!--START footer-->
    <?php  require_once('../../Tools/Footer.php') ?>
    <!--END footer-->

    <?php require_once('../../Tools/linkJS.php') ?>
    
  </body>
</html>