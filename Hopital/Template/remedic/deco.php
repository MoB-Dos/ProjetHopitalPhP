<?php

session_start ();

require 'Class/ClassManager/User/UserManager.php';



$show = new UserManager();

$act = $show->Deconnexion();



header("location: inde.php");


?>

