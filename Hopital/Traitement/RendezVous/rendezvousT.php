<?php
session_start ();

require '../../Class/ClassManager/RDVManager.php';
require '../../Class/SetUp/SetUpRDV.php';

$ajout = new SetUpRDV([
    'date' => $_POST['date'],
    'heure' =>$_POST['heure'],
    'motif' => $_POST['motif'],
]); 


$add = new RDVManager($ajout);

$act = $add->AjoutRDV($ajout);



//header("location: ../../index.php");


?>