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
<?php require_once('../../Tools/NavBar.php') ?>
<!-- END nav -->

<div class="hero-wrap" style="background-image: url('../../Design/images/bg_6.jpg'); background-attachment:fixed;">
    <div class="hero-wrap" style="background-image: url('../../Design/images/bg_6.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center"
                 data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span>
                        <span>Docteur</span></p>
                    <h1 class="mb-3 bread">Des Docteurs exceptionnels</h1>
                    <form action="../Tools/Recherche.php" class="subscribe-form" method="post">
                        <div class="form-group d-flex">
                            <input type="text" name="Recherche" class="form-control"
                                   placeholder="Entrer votre recherche">
                            <input type="submit" value="Recherche" class="submit px-3">
                        </div>
                </div>
            </div>
        </div>

        <section class="ftco-section">
            <div class="container">
                <div class="row">

                    <!-- Début carte -->
                    <?php


                    require '../../Class/ClassManager/DocManager.php';

                    $docManager = new DocManager();

                    $dataDoc = $docManager->getDoc();




                    if (isset($dataDoc)) {


                        foreach ($dataDoc as $value) {

                            echo
                                '<div class="col-md-6 col-lg-3 ftco-animate">
                      <div class="block-2">
                
                        <div class="front" href="../index.php" style="background-image: url(' . $value['photo'] . ');">
                          <div class="box" >
                            <h3>' . $value['nom'] . " " . $value['prenom'] . '</h3>
                            <p>' . $value['spe'] . '</p>
                            <a href="' . $value['lien'] . '">
                              Voir le Profil
                            </a> 
                          </div>
                        </div>
                        <div class="back">
                        <!-- back content -->
                        
                        <div class="author d-flex">
                          <div class="image mr-3 align-self-center">
                            <div class="img" style="background-image: url(' . $value['photo'] . ');"></div>
                          </div>
                          
                        </div>
                      </div>
                    </div></div>
                  ';
                        }
                    } else {

                        echo "pas de commentaire";

                    }

                    ?>


                    <!-- Fin Carte -->

        </section>


        <!--START footer-->
        <?php require_once('../../Tools/Footer.php') ?>
        <!--END footer-->


        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen">
            <svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                        stroke="#F96D00"/>
            </svg>
        </div>


        <?php require_once('../../Tools/linkJS.php') ?>

</body>
</html>