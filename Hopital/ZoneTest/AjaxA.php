<?php


$tab= $_POST['tabUser'];

$values = "'" . implode("', '", $_POST['tabUser']) . "'";

try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


$req = $bdd->prepare("INSERT INTO tableau (nom,prenom,couleur) VALUES (?)");
$req -> execute(array($values));








?>
