<?php

require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpUser.php';

$connexion = new SetUpUser([
    'login' => $_POST['login'],
    'mdp' => $_POST['mdp'],
]);

$try = new UserManager($connexion);

$act = $try->Connexion($connexion);

header("location: ../../inde.php"); 
?>  