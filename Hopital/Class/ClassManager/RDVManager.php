<?php

class RDVManager

{

 public function AjoutRDV(SetUpRDV $ajout)
 {

      $heure = $ajout->getHeure();
      $date =$ajout->getDate();
      $motif = $ajout->getMotif();
      
  
      
      var_dump($motif, $date,$heure);

      //Connexion à la base de données projetweb
      try
      {
      $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
      }
      catch(Exception $e)
      {
        die('Erreur:'.$e->getMessage());
      }
  
      //Sélection des données dans la table utilisateur
      $reponse=$bdd->prepare('SELECT id FROM user WHERE login=?');
      $reponse->execute(array($_SESSION['login'])); 
  
      $data=$reponse->fetchall();


      
      $req = $bdd->prepare('INSERT INTO rdv (idRDV,heure,date,motif) VALUES (?,?,?,?)');
      $req -> execute(array($data['id'],$heure,$date,$motif));
      
 }

}

?>