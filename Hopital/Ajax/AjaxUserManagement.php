<?php


$id = $_POST['id'];
$login= $_POST['child'];
$mail = $_POST['child1'];
$dossier = $_POST['child2'];
$sessionId = $_POST['child3'];
$profil =  $_POST['child4'];


try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


//On select les donées pour voir si elle existe déja 
$reponse=$bdd->prepare('SELECT * FROM user WHERE idUser = ?');
$reponse->execute(array($id)); 
$data=$reponse->fetchall();



if($data)
{

//Update car les donées existe    
$req = $bdd->prepare('UPDATE user SET login= ?,mail = ?, dossier = ?,sessionId = ? WHERE idUser = ?');
$req -> execute(array( $login,$mail, $dossier,$sessionId, $idUser));
$dataa=$req->fetchall();

}else 
{

//Insert si les donées n'existe pas     
$requ = $bdd->prepare('INSERT INTO user (login,mail,mdpc,dossier,sessionId,profil) VALUES (?,?,?,?,?,?)');
$requ -> execute(array($login,$mail,0,$dossier,$sessionId,$profil));
$id_nouveau = $bdd->lastInsertId();
echo $id_nouveau;

}




?>