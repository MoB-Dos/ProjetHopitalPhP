<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php require_once('../../Tools/linkCSS.php') ?>

    <!-- START nav -->
    <?php require_once('../../Tools/NavBar.php') ?>
    <!-- END nav -->

</head>
<body>

<?php

require '../../Class/ClassManager/RDVManager.php';

$rdvManager = new RDVManager();

$dataRdv = $rdvManager->getRdv();


if ($dataRdv) {
    ?>
    <div class="Rdv">
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Vos <b>Rendez-Vous</b></h2></div>
                            <div class="col-sm-4">
                                <a href="../Page/docteur.php">
                                    <button type="button" class="btn btn-info takeRDV"><i class="fa fa-plus"></i>
                                        Prendre un nouveau rendez-vous
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <table id="table1" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Medecin</th>
                            <th>Date</th>
                            <th>Horaire</th>
                            <th>Motif</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php


                        foreach ($dataRdv as $value) {

                            echo
                                '<tr  id="' . $value['idRdv'] . '">
              <td>' . $value['nom'] . ' ' . $value['prenom'] . '</td>
              <td>' . $value['date'] . '</td>
              <td>' . $value['horaire'] . '</td>
              <td>' . $value['motif'] . '</td>
              
              <td>
                   <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                   <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                   <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
              </td>
              </tr>';
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>


    </div>

    <?php
} else {
    ?>

    <div id="txtHint" class="noRdv">
        <b>Pas de Rendez-Vous pris pour l'instant...</b><br>
        <a href="http://localhost/ProjetHopitalPhP/View/Page/docteur.php">cliquez ici pour prendre rendez-vous</a>

    </div>

    <?php
}
?>


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

<!--START footer-->
<?php require_once('../../Tools/Footer.php') ?>
<!--END footer-->

</html>

