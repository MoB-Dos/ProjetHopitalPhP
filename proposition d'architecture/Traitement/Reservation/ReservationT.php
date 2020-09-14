<?php
session_start ();

require '../../Class/ClassManager/reservation/reservationManager.php';
require '../../Class/SetUp/SetUpReservationPlace.php';

$prix = ((7.50*$_POST['etudiant'])+(5*$_POST['enfant'])+(8*$_POST['navigo'])+(11*$_POST['normal']));




$ajoutReserv = new SetUpReservationPlace([
  'login' => $_SESSION['login'],
  'place' => $_POST['NbmPlace'],
  'date' => $_POST['date'],
  'heure' => $_POST['heure'],
  'film' => $_POST['film'],
  'prix' => $prix
]);

$add = new reservationManager($ajoutReserv);

$act = $add->reservationM($ajoutReserv);

header("location: ../../template/EndGam/HTML/Paiment.php");


?>
