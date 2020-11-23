<?php


$id = $_POST['id'];
$medecin = $_POST['medecin'];
$date = $_POST['date'];
$horaire = $_POST['horaire'];
$motif = $_POST['motif'];


try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


//On select les donées pour voir si elle existe déja 
$reponse=$bdd->prepare('SELECT * FROM rendezvous WHERE idRdv = ?');
$reponse->execute(array($id)); 
$data=$reponse->fetchall();




if($data)
{

//Update car les donées existe    
$req = $bdd->prepare('UPDATE rendezvous SET date = ? ,idHoraire = ? ,idMedecin = ? ,motif = ? WHERE id = ?');
$req -> execute(array($motif,$id);
echo $id;

}else 
{

//Insert si les donées n'existe pas     
$requ = $bdd->prepare('INSERT INTO rendezvousv (date,idHoraire,idMedecin,motif) VALUES (?,?,?,?)');
$requ -> execute(array($date,$horaire,$medecin,$motif));
$id_nouveau = $bdd->lastInsertId();
echo $id_nouveau;

}




?>