<?php
session_start();

require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpUser.php';

$deco = new UserManager;

$act = $deco->Deconnexion();

header("location: ../../template/EndGam/HTML/home.php");


?>
