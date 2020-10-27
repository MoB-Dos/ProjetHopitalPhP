<?php
session_start ();
//en cours
require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpUser.php';

$ajout = new SetUpDossier([
    'prenom' => $_POST['prenom'],
    'nom' =>$_POST['nom'],
    'date' => $_POST['date'],
    'adresse' => $_POST['adresse'],
    'sq' => $_POST['sq'],
    'optionTv' => $_POST['optionTv'],
    'regime' => $_POST['regime'],


]); 


$add = new UserManager($ajout);

$act = $add->Inscription($ajout);

header("location: ../../inde.php");


?>