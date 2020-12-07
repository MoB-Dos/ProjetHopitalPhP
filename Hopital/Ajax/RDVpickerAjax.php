<?php

//le fichier sert a envoyer la liste des rdv disponible a l'heure choisie 

$q = $_GET['q'];

try{
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
  }

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }

$reponse=$bdd->prepare('SELECT * FROM horaire WHERE idHoraire not in (SELECT idHoraire FROM rendezvous WHERE idMedecin = "0" AND date = ?)');
$reponse -> execute(array($q));
$data=$reponse->fetchall();


echo "<select class='form-control' name='horaire'>
<option value='0' selected disabled>choissisez votre Horaire</option>";
foreach ($data as $value) {

  echo "<option value=".$value['idHoraire'].">".$value['horaire']."</option>";
  
}
echo "</select>";



?>
