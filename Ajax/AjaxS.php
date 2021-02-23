<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/ProjethopitalPhP/Class/ClassManager/PdoManager.php");

$add = new PdoManager();

//fichier qui supprime les donnés de la bdd
$id = $_POST['id'];

//le type indique si il aut supprimer un rdv ou un admin
$type = $_POST['type'];



//si la demande est un RDV
if($type == 'rdv'){
  $reponse=$add->connexionBDD()->prepare("DELETE FROM rendezvous WHERE idRDV = ?");
  $reponse->execute(array($id));
//si la demande est admin  
}else if ($type == 'admin')
{
  $reponse=$add->connexionBDD()->prepare("DELETE FROM user WHERE idUser = ?");
  $reponse->execute(array($id)); 
}

?>
