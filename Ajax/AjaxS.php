<?php


//fichier qui supprime les donnés de la bdd
$id = $_POST['id'];

//le type indique si il aut supprimer un rdv ou un admin
$type = $_POST['type'];

try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}

//si la demande est un RDV
if($type == 'rdv'){
  $reponse=$bdd->prepare("DELETE FROM rendezvous WHERE idRDV = ?");
  $reponse->execute(array($id));
//si la demande est admin  
}else if ($type == 'admin')
{
  $reponse=$bdd->prepare("DELETE FROM user WHERE idUser = ?");
  $reponse->execute(array($id)); 
}

?>
