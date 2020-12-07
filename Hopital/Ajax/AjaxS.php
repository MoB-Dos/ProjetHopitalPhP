<?php

$id = $_POST['id'];
$type = $_POST['type'];



try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}

if($type == 'rdv'){
  $reponse=$bdd->prepare("DELETE FROM rendezvous WHERE idRDV = ?");
  $reponse->execute(array($id)); 
}else if ($type == 'admin')
{
  $reponse=$bdd->prepare("DELETE FROM user WHERE idUser = ?");
  $reponse->execute(array($id)); 
}

?>
