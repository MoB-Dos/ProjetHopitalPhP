<?php


$id = $_POST['id'];
$couleur= $_POST['couleur'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$id;

try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


//On select les donées pour voir si elle existe déja 
$reponse=$bdd->prepare('SELECT * FROM tableaufinal WHERE id = ?');
$reponse->execute(array($id)); 
$data=$reponse->fetchall();


if($data)
{

//Update car les donées existe    
$req = $bdd->prepare('UPDATE tableaufinal SET nom= ? ,prenom = ?,couleur = ? WHERE id = ?');
$req -> execute(array($nom,$prenom,$couleur,$id));

}else 
{

//Insert si les donées n'existe pas     
$requ = $bdd->prepare('INSERT INTO tableaufinal (id,nom,prenom,couleur) VALUES (?,?,?,?)');
$requ -> execute(array($id,$nom,$prenom,$couleur));

}




?>