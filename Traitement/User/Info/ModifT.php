<?php

session_start();

require '../../../Class/ClassManager/User/UserManager.php';
require '../../../Class/SetUp/SetUpUser.php';

var_dump($_POST);

$Setup = new SetUpUser([
    'login' => $_POST['login'],
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'mail' =>$_POST['mail'],
]);

$modif = new UserManager($Setup);


$act = $modif->Modification($Setup);


header("location: ../../../View/User/Connexion.html");

/*?>
<input type="button" value="Deconnexion" onclick="window.location.href='../View/accueil.php'">
<?php*/

 ?>