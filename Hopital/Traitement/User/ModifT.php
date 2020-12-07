<?php
session_start ();

require '../../Class/ClassManager/DossierManager.php';
require '../../Class/SetUp/SetUpDossier.php';

$modif = new SetUpDossier([
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


$add = new DossierManager($modif);

$act = $add->AffichageModification2($modif);


header("location: ../../index.php");


?>