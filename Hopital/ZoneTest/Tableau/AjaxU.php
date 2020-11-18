<?php


$id = $_POST['id'];
$couleur= $_POST['couleur'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];


try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


$req = $bdd->prepare('UPDATE tableau SET nom= ? ,prenom = ?,couleur = ? WHERE id = ?');
$req -> execute(array($nom,$prenom,$couleur,$id));

?>