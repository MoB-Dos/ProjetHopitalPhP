<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/ProjethopitalPhP/Class/ClassManager/PdoManager.php");

$add = new PdoManager();

$id = $_POST['id'];
$login= $_POST['login'];
$mail = $_POST['mail'];
$dossier = $_POST['dossier'];
$sessionId = $_POST['sessionId'];
$profil =  $_POST['profil'];

$mdp = 'Azertyu1';
$mdpc = md5($mdp);




//On select les donées pour voir si elle existe déja 
$reponse=$add->connexionBDD()->prepare('SELECT * FROM user WHERE idUser = ?');
$reponse->execute(array($id)); 
$data=$reponse->fetch();





if($data)
{

//Update car les donées existe    
$req = $add->connexionBDD()->prepare('UPDATE user SET login= ?,mail = ?, dossier = ?,sessionId = ? WHERE idUser = ?');
$a = $req -> execute(array( $login,$mail,$dossier,$sessionId, $id));




}else 
{

//Insert si les donées n'existe pas     
$requ = $add->connexionBDD()->prepare('INSERT INTO user (login,mdpc,mail,profil,dossier,sessionId) VALUES (?,?,?,?,?,?)');
$requ -> execute(array($login,$mdpc,$mail,$profil,$dossier,$sessionId));
$id_nouveau = bdd->lastInsertId();
echo $id_nouveau;

}




?>