<?php

$id = $_POST['id'];

echo $id;

try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


$reponse=$bdd->prepare("DELETE FROM rendezvous WHERE idRDV = ?");
$reponse->execute(array($id)); 


?>
