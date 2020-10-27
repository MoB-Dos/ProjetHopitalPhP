<?php

session_start();

require '../Class/ClassManager/User/UserManager.php';
require '../Class/SetUp/SetUpGestion.php';


$Setup = new SetUpGestion([

    'login' => $_POST['login'],
    'mail' =>$_POST['mail'],
    

]);

$modif = new UserManager($Setup);


$act = $modif->ModificationGestion($Setup);


header("location: ../index.php");

/*?>
<input type="button" value="Deconnexion" onclick="window.location.href='../View/accueil.php'">
<?php*/

 ?>