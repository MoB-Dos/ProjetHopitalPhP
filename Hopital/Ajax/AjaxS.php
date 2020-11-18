<?php

$id = $_POST['id'];

try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


$reponse=$bdd->prepare("DELETE FROM tableau WHERE id = ?");
$reponse->execute(array($id)); 





?>
