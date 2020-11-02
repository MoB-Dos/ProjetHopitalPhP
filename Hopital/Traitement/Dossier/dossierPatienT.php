<?php
session_start ();
//en cours
require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpDossier.php';

$ajout = new SetUpDossier([
    'prenom' => $_POST['prenom'],
    'nom' =>$_POST['nom'],
    'date' => $_POST['date'],
    'adresse' => $_POST['adresse'],
    'sq' => $_POST['sq'],
    'mutuel' => $_POST['mutuel'],
    'optionTv' => $_POST['optionTv'],
    'regime' => $_POST['regime'],
]); 
var_dump($_POST['date']);
echo ("test :".$_POST["regime"]);

$add = new UserManager($ajout);

$act = $add->creeDossier($ajout);

header("location: ../../inde.php");


?>