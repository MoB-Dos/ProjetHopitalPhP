<?php

session_start ();

require '../../Class/ClassManager/UserManager.php';



$show = new UserManager();

$act = $show->Deconnexion();



header("location: ../../index.php");


?>

