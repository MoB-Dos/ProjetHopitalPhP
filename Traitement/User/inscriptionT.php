<?php
session_start ();

require '../../Class/ClassManager/UserManager.php';
require '../../Class/SetUp/SetUpUser.php';

$ajout = new SetUpUser([
    'login' => $_POST['login'],
    'mail' =>$_POST['mail'],
    'mdp' => $_POST['mdp'],
    'mdp2' => $_POST['mdp2'],
]); 


$add = new UserManager($ajout);

$act = $add->Inscription($ajout);

header("location: ../../index.php");


?>