<?php



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




$requ = $bdd->prepare('INSERT INTO tableau (nom,prenom,couleur) VALUES (?,?,?)');
$requ -> execute(array($nom,$prenom,$couleur));


}



?>
