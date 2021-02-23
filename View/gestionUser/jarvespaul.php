<!DOCTYPE html>
<html lang="en">
<head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php require_once('../../../Tools/linkCSS.php') ?>

    <!-- START nav -->
    <?php require_once('../../../Tools/NavBar.php') ?>
    <!-- END nav -->

</head>
<body>


<section class="ftco-section-parallax">
    <div class="container">
        <div class="row">
            <img src="/ProjethopitalPHP/Design/images/doctor-1.jpg" width="400" height="500">
            <div class="col-md-9 p-t-2">

                <?php
                if (isset($_SESSION['login'])) {
                    ?>
                    <h2 class="h2-responsive">Jarves Paul
                        <button type="button" class="btn btn-info-outline waves-effect" data-toggle="modal"
                                data-target="#RendezVouss">Prendre RDV
                        </button>
                    </h2>
                    <?php
                } else {
                    ?>
                    <h2 class="h2-responsive">Jarves Paul
                        <button type="button" class="btn btn-info-outline waves-effect" data-toggle="modal"
                                data-target="#RendezVoussErreur">Prendre RDV
                        </button>
                    </h2>

                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</section>


<!--Rendez vous -->
<div class="modal fade" id="RendezVouss" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">Prendre Rendez vous avec Paul Jarves</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/ProjethopitalPHP/Traitement/RendezVous/rendezvousT.php" method="post">


                    <div class="form-group">

                        <label for="appointment_name" class="text-black" name="Prenom">Date</label>
                        <input type="Date" class="form-control" id="date" name="date" min="2018-01-01" max="2021-12-31"
                               required>
                    </div>

                    <div class="form-group">

                        <label for="appointment_name" class="text-black" name="Nom">Heure</label>
                        <!-- <input type="Time" class="form-control" id="heure" name="heure">  -->

                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="horaire" id="matin" value="0" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Matin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="horaire" id="apresmidi" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Après Midi
                        </label>
                    </div>


                    <div class="form-group">
                        <label for="appointment_name" class="text-black" name="Adresse">Motif</label>
                        <textarea class="form-control" id="motif" name="motif" rows="3"></textarea>
                    </div>

                    <div class="form-group">

                        <input type="submit" value="Continuer" class="btn btn-primary">
                    </div>


                    <input id="prodId" name="docteurName" type="hidden" value="Jarves">

                </form>
            </div>

        </div>
    </div>
</div>
<!--Rendez vous Fin-->


<!-- Rendez-vous erreur  -->
<div class="modal fade" id="RendezVoussErreur" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label for="appointment_name" class="text-black" name="Adresse">Veuillez vous connecter avant de prendre
                    un rendez-vous.</label>s
            </div>

        </div>
    </div>
</div>

<!-- Rendez-vous erreur Fin -->


<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    dd += 3;
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("min", today);


</script>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<?php require_once('../../../Tools/linkJS.php') ?>

</body>

<!--START footer-->
<?php require_once('../../../Tools/Footer.php') ?>
<!--END footer-->

</html>