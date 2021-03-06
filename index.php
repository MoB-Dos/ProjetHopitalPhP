<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <?php require_once('Tools/linkCSS.php') ?>


<!-- <script>
          $(document).ready(function(){
          $("#myTooltips a").tooltip({
        
        template : '<div class="tooltip tooltip-custom"> <div class="title"></div> <div class="tooltip-arrow"> </div> <div class="tooltip-head">  <h6> <i class="fas fa-exclamation-triangle"> </i> <span> Dossier Manquant </span> </h6> </div> </div>'
                });
          });
        </script> -->

  </head>
  <body>
    
    <!-- START nav -->
    <?php  require_once('Tools/NavBar.php') ?>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('Design/images/bg_1.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <h1 class="mb-4">Le plus important c'est votre santé</h1>
            <p>Nous cherchons à prendre soins de vous et ce dans les meilleurs conditions vous pouvez croire en nous </p>
          </div>
        </div>
      </div>
    </div>

   <!--Debut Panel Département-->
    <section class="ftco-services">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link px-4 active" id="v-pills-master-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-master" aria-selected="true"><span class="mr-3 flaticon-cardiogram"></span> Cardiologie</a>

              <a class="nav-link px-4" id="v-pills-buffet-tab" data-toggle="pill" href="#v-pills-buffet" role="tab" aria-controls="v-pills-buffet" aria-selected="false"><span class="mr-3 flaticon-neurology"></span> Neurologie</a>

              <a class="nav-link px-4" id="v-pills-fitness-tab" data-toggle="pill" href="#v-pills-fitness" role="tab" aria-controls="v-pills-fitness" aria-selected="false"><span class="mr-3 flaticon-stethoscope"></span> Diagnostique</a>

              <a class="nav-link px-4" id="v-pills-reception-tab" data-toggle="pill" href="#v-pills-reception" role="tab" aria-controls="v-pills-reception" aria-selected="false"><span class="mr-3 flaticon-tooth"></span> Dentiste</a>

              <a class="nav-link px-4" id="v-pills-sea-tab" data-toggle="pill" href="#v-pills-sea" role="tab" aria-controls="v-pills-sea" aria-selected="false"><span class="mr-3 flaticon-vision"></span> Ophthalmologie</a>

              <a class="nav-link px-4" id="v-pills-spa-tab" data-toggle="pill" href="#v-pills-spa" role="tab" aria-controls="v-pills-spa" aria-selected="false"><span class="mr-3 flaticon-ambulance"></span>Urgence</a>
            </div>
          </div>
          <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">
            
            <div class="tab-content pl-md-5" id="v-pills-tabContent">

              <div class="tab-pane fade show active py-5" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-master-tab">
                <span class="icon mb-3 d-block flaticon-cardiogram"></span>
                <h2 class="mb-4">Département Cardiologie</h2>
                <p>Nous saurons traité votre coeur avec toute la patience qu'il merite</p>
                <p>Pour tout problèmes lié a celui ci cest dans ce département que vous allez pouvoir trouver un docteur qualifié pour vos attentes </p>
                <p><a href="view/Page/departement.php" class="btn btn-primary">En savoir plus</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-buffet" role="tabpanel" aria-labelledby="v-pills-buffet-tab">
                <span class="icon mb-3 d-block flaticon-neurology"></span>
                <h2 class="mb-4">Département Neurogolie</h2>
                <p>Le département de Neurologie regroupe l’ensemble des unités de neurologie du bâtiment Paul Castaigne.
                 Les patients sont accueillis pour des bilans diagnostiques et/ou pour des prises en charge thérapeutiques. 
                 Le département comporte des secteurs de consultation (avec des consultations d’urgence), d’hospitalisation de jour, d’hospitalisation de semaine et d’hospitalisation traditionnelle. </p>
                 <p>Outre l’expertise dans les différents domaines de la neurologie, une des spécificités du département est son secteur de réanimation dédié aux patients neurologiques. </p>
                <p><a href="view/Page/departement.php" class="btn btn-primary">En savoir plus</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-fitness" role="tabpanel" aria-labelledby="v-pills-fitness-tab">
                <span class="icon mb-3 d-block flaticon-stethoscope"></span>
                <h2 class="mb-4">Medecin Généraliste</h2>
                <p>Le médecin généraliste est un médecin qui a choisi la spécialité de médecine générale. Il se consacre donc à toutes les maladies et pathologies humaines dans leur ensemble sans en avoir choisi de particulière.</p>
                <p><a href="view/Page/departement.php" class="btn btn-primary">En savoir plus</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-reception" role="tabpanel" aria-labelledby="v-pills-reception-tab">
                <span class="icon mb-3 d-block flaticon-tooth"></span>
                <h2 class="mb-4">Département Dentition</h2>
                <p>Dentiste désigne un praticien spécialiste des dents et qui donne donc professionnellement des soins dentaires. </p>
                <p><a href="view/Page/departement.php" class="btn btn-primary">En savoir plus</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-sea" role="tabpanel" aria-labelledby="v-pills-sea-tab">
                <span class="icon mb-3 d-block flaticon-vision"></span>
                <h2 class="mb-4">Département Ophthalmologie </h2>
                <p>Médecin chargé de traiter les maladies des yeux, et de leurs annexes. Il réalise généralement un examen ophtalmologique avant d'établir son diagnostic, 
                en interrogeant le patient et en faisant un examen physique de ce dernier. </p>

                <p><a href="view/Page/departement.php" class="btn btn-primary">En savoir plus</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-spa" role="tabpanel" aria-labelledby="v-pills-spa-tab">
                <span class="icon mb-3 d-block flaticon-ambulance"></span>
                <h2 class="mb-4">Département Urgence </h2>
                <p>Les urgences sont assurées à la fois par la médecine libérale et la médecine hospitalière, 
                mais force est de constater que de plus en plus de patients se dirigent vers l’hôpital public en cas d’urgence, avec, 
                comme conséquence fâcheuse, des délais d’attente de plus en plus longs dans les services d'accueil des urgences (SAU).</p>
                <p><a href="view/Page/departement.php" class="btn btn-primary">En savoir plus</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Fin Panel Département-->

    <!--Début Panel Docteur-->
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Nos Docteurs Expérimenter</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url(Design/images/doctor-1.jpg);">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Neurologist</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url(Design/images/doctor-1.jpg);"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Neurologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url(Design/images/doctor-2.jpg);">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Pediatrician</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url(Design/images/doctor-2.jpg);"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Pediatrician</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url(Design/images/doctor-3.jpg);">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Ophthalmologist</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url(Design/images/doctor-3.jpg);"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Ophthalmologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url(Design/images/doctor-4.jpg);">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Pulmonologist</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url(Design/images/doctor-4.jpg);"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Pulmonologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
        </div>
    	</div>
    </section>
    <!--Fin Panel Docteur-->

    <!--Début Panel FunFact-->
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(Design/images/bg_4.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Quelque chiffres amusant</h2>
         
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="60">0</strong>
		                <span>Hopitals</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="200">0</strong>
		                <span>Docteurs</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Clinique</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="200">0</strong>
		                <span>Revues</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
    <!--Fin Panel FunFact-->

    <!--Début Panel Avis-->
    <!-- <section class="ftco-section testimony-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Testimonials</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-12 ftco-animate">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(Design/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Patient</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(Design/images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Patient</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(Design/images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Patient</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(Design/images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Doctor</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!--Fin Panel Avis-->


		
    <!--START footer-->
    <?php  require_once('Tools/Footer.php') ?>
    <!--END footer-->

  <!-- loader
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    -->

    <?php require_once('Tools/linkJS.php') ?>


    
  </body>
</html>