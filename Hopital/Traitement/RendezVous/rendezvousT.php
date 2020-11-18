<?php
session_start ();

require '../../Class/ClassManager/RDVManager.php';
require '../../Class/SetUp/SetUpRDV.php';

var_dump($_POST['date']);


$ajout = new SetUpRDV([
    'date' => $_POST['date'],
    'horaire' =>$_POST['horaire'],
    'motif' => $_POST['motif'],
    'idMedecin' => $_POST['idMedecin'],
]); 


$add = new RDVManager($ajout);

$act = $add->AjoutRDV($ajout);



header("location: ../../index.php");


?>