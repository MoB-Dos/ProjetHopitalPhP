<?php
session_start ();
//en cours
require '../../Class/ClassManager/DossierManager.php';
require '../../Class/SetUp/SetUpDossier.php';

$ajout = new SetUpDossier([
    'prenom' => $_POST['prenom'],
    'nom' =>$_POST['nom'],
    'date' => $_POST['birthday'],
    'adresse' => $_POST['adresse'],
    'sq' => $_POST['sq'],
    'mutuel' => $_POST['mutuel'],
    'optionTv' => $_POST['tvradio'],
    'optionWifi' => $_POST['wifiradio'],
    'regime' => $_POST['regime'],
]); 


echo ("test :".$_POST["regime"]);

$add = new DossierManager($ajout);

$act = $add->AjoutDossier($ajout);

//header("location: ../../index.php");


?>