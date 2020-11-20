<?php

class DossierManager

{

    public function AjoutDossier(SetUpDossier $ajout) //en cours
    {
    
      $prenom = $ajout->getPrenom();
      $nom =$ajout->getNom();
      $date = $ajout->getDate();
      $adresse = $ajout->getAdresse();
      $mutuel = $ajout->getMutuel();
      $sq = $ajout->getSq();
      $optionTv = $ajout->getOptionTv();
      $regime = $ajout->getRegime();
      $profil="user";
      //var_dump($mail, $login, $mdp, $mdpc);
    
      //Connexion à la base de données projetweb
      
      try
      {
      $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
      }
      catch(Exception $e)
      {
        die('Erreur:'.$e->getMessage());
      }
    
      $login=$_SESSION['login'];
      
      //Sélection des données dans la table utilisateur
      $reponse=$bdd->prepare('SELECT id FROM user WHERE login=?');
      $reponse->execute(array($login));
      $result=$reponse->fetch();
      $id=$result[0];
      

      $reponse2=$bdd->prepare('INSERT INTO infouser (idInfo, nom, prenom, date, adresse, mutuel, sq, optionTele, regime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
      $reponse2->execute(array($id, $prenom, $nom, $date, $adresse, $mutuel, $sq, $optionTv, $regime)); 
      //INSERT INTO infouser (idInfo, nom, prenom, date, adresse, mutuel, sq, optionTele, regime) VALUES (42, "Michel", "Bernard", "10-03-1990", "Paris", "123234", "9904930", "non", "viande");
                                                                                                      
      $data=$reponse2->fetch();
      var_dump($mutuel);
    
        $reponse=$bdd->prepare('UPDATE user SET dossier=1 WHERE id=?');
        $reponse->execute(array($id));
        $_SESSION['dossier']=1;
    
    }

    public function modification(){
        {
      
      
          try{
            $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
          }
          
          catch(Exception $e){
            die('Erreur:'.$e->getMessage());
          }
          
          
          //Sélection dans la table utilisateur
          $req=$bdd->prepare('SELECT * FROM infouser WHERE login= ?');
          $req->execute(array( $_SESSION['login']));
          $data = $req->fetch();
          
          ?>
          
          <!-- Formulaire de modification -->
          <form method="post" action="../../../Traitement/User/Info/ModifT.php">
          
            Votre nom:
            <input type="text" name="nom" value=<?php echo $data['nom'];?>>
            <br><br>
          
            Votre prenom:
            <input type="text" name="prenom" value=<?php echo $data['prenom'];?>>
            <br><br>
          
            Votre date:
            <input type="text" name="date de naissance" value=<?php echo $data['date'];?>>
            <br><br>
          
            Votre adresse:
            <input type="text" name="adresse" value=<?php echo $data['adresse'];?>>
            <br><br>
      
            Votre mutuel:
            <input type="text" name="mutuel" value=<?php echo $data['mutuel'];?>>
            <br><br>
      
            Votre sécurité sociale:
            <input type="text" name="sq" value=<?php echo $data['sq'];?>>
            <br><br>
      
            Votre Option Télé:
            <input type="text" name="optionTele" value=<?php echo $data['optionTele'];?>>
            <br><br>
      
            Votre régime:
            <input type="text" name="regime" value=<?php echo $data['regime'];?>>
            <br><br>
          
          <input type="submit" value="Envoyer"/><br><br>
          
          </form>
          
            <?php
          
          }
      }
      
      public function AffichageModification2(SetUpDossier $ajout)
      {
      //initialisation du cookie login
       // setcookie('login',$_SESSION['login'], time() + 365*24*3600, null, null, false, true);
      
      //initialisation des variables
        $nom = $ajout->getNom();
        $prenom = $ajout->getPrenom();
        $date = $ajout->getDate();
        $adresse = $ajout->getAdresse();
        $mutuel = $ajout->getMutuel();
        $sq = $ajout->getSq();
        $optionTele = $ajout->getOptionTele();  
        $regime = $ajout->getRegime();
      
      
      
      //connexiob à la basse de données
        try{
          $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
        }
      
        catch(Exception $e){
          die('Erreur:'.$e->getMessage());
        }
      
      
        $req=$bdd->prepare('SELECT * FROM user WHERE login= ?');
        $req->execute(array( $_SESSION['login']));
        $data007 = $req->fetch();
      
        var_dump($nom, $prenom, $date, $adresse, $adresse, $mutuel, $sq, $optionTele, $regime, $data007[0]);
        //Modification dans la table utilisateur
          $req2 = $bdd->prepare('UPDATE infouser SET nom = ?, prenom = ?, date = ?, adresse = ?, mutuel = ?, sq= ?, optionTele = ?, regime = ? WHERE idInfo = ?');
          $reponse79 = $req2 -> execute(array($nom, $prenom, $date, $adresse, $mutuel, $sq, $optionTele, $regime, $data007[0] ));
      
      
      }
      



}

?>