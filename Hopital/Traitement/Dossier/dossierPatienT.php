<?php
session_start ();
//en cours
require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpDossier.php';

$ajout = new SetUpDossier([
    'Prenom' => $_POST['prenom'],
    'Nom' =>$_POST['nom'],
    'Date' => $_POST['date'],
    'Adresse' => $_POST['adresse'],
    'Sq' => $_POST['sq'],
    'OptionTv' => $_POST['optionTv'],
    'Regime' => $_POST['regime'],
]); 
var_dump($_POST['regime']);

$add = new UserManager($ajout);

$act = $add->creeDossier($ajout);

header("location: ../../inde.php");


?>