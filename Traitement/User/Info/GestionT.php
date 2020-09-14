<?php

session_start();

require '../../../Class/ClassManager/User/UserManager.php';
require '../../../Class/SetUp/SetUpGestion.php';

var_dump($_POST);

$Setup = new SetUpGestion([

    'login' => $_POST['login'],
    'id' =>$_POST['id'],
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'mail' =>$_POST['mail'],
    'mdp' =>$_POST['mdp'],
    'admin' =>$_POST['admin'],

]);

$modif = new UserManager($Setup);


$act = $modif->ModificationGestion($Setup);


header("location: ../../../View/User/Connexion.html");

/*?>
<input type="button" value="Deconnexion" onclick="window.location.href='../View/accueil.php'">
<?php*/

 ?>
