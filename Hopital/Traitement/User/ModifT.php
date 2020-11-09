<?php
session_start ();

require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpDossier.php';

$ajout = new SetUpDossier([
    'nom' => $_POST['nom'],
    'prenom' =>$_POST['prenom'],
    'date' => $_POST['date'],
    'adresse' => $_POST['adresse'],
    'mutuel' => $_POST['mutuel'],
    'sq' => $_POST['sq'],
    'optionTele' => $_POST['optionTele'],
    'regime' => $_POST['regime'],

]); 


$add = new UserManager($ajout);

$act = $add->AffichageModification2($ajout);

var_dump($_SESSION['login']);

header("location: ../../index.php");


?>