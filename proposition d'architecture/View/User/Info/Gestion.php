<?php

session_start ();

require '../../../Class/ClassManager/User/UserManager.php';
require '../../../Class/SetUp/SetUpGestion.php';

$show = new UserManager();

$act = $show->Gestion();
$act = $show->delete();





?>

<input type="submit" value="retour" onclick="window.location='../../../ndex.php';" />
