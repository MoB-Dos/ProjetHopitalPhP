<?php

session_start ();

require '../Class/ClassManager/User/UserManager.php';
require '../Class/ClassManager/RDVManager.php';




$show = new UserManager();
$showRDV = new RDVManager();


$act = $show->AffichageModification();

$act = $showRDV->ModificationRDV();





?>

<input type="submit" value="retour" onclick="window.location='../index.php';" />