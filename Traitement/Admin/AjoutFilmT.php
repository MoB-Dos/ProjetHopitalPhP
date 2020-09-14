<?php
require '../../Class/ClassManager/Admin/AjoutFilmManager.php';
require '../../Class/SetUp/SetUpSalleFilm.php';


$ajout = new SetUpSalleFilm([
    'salle' => $_POST['salle'],
    'synopsis' => $_POST['synopsis'],
]);


$nametrue = $_POST['nom'];
$Synopsis = $_POST['synopsis'];
$Date = $_POST['date'];


$add = new AjoutFilmManager();

$act = $add->AjoutImage($nametrue, $_FILES['photo']);

$act3 = $add->AjoutBDD($nametrue,$Synopsis,$Date);

$act2 = $add->AjoutPage($nametrue,$Synopsis,$Date);



?>