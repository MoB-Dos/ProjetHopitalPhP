<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/ProjethopitalPhP/Class/ClassManager/PdoManager.php");

class DossierManager extends PdoManager
{


    public function AjoutDossier(SetUpDossier $ajout) //en cours
    {
        $bdd = parent::connexion_bd();

        $prenom = $ajout->getPrenom();
        $nom = $ajout->getNom();
        $date = $ajout->getDate();
        $adresse = $ajout->getAdresse();
        $mutuel = $ajout->getMutuel();
        $sq = $ajout->getSq();
        $optionTv = $ajout->getOptionTv();
        $optionWifi = $ajout->getOptionWifi();
        $regime = $ajout->getRegime();
        $profil = "user";

        $optionTv = ($optionTv == '1') ? 'oui' : 'non';
        $optionWifi = ($optionTv == '1') ? 'oui' : 'non';


        //Sélection des données dans la table utilisateur
        $reponseSel = $bdd->prepare('SELECT idUser FROM user WHERE sessionId = ?');
        $reponseSel->execute(array($_SESSION['sessionId']));
        $result = $reponseSel->fetch();
        $id = $result[0];


        $reponseIns = $bdd->prepare('INSERT INTO infouser (idUser, nom, prenom, date, adresse, mutuel, secusocial, optionTV, optionWifi, regime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)');
        $reponseIns->execute(array($id, $nom, $prenom, $date, $adresse, $mutuel, $sq, $optionTv, $optionWifi, $regime));


        $data = $reponseIns->fetch();

        //on modifie la valeur dossier pour pouvoir indiquer qu'il a bien été realiser
        $reponse = $bdd->prepare('UPDATE user SET dossier = 1 WHERE sessionId = ?');
        $reponse->execute(array($_SESSION['sessionId']));
        $_SESSION['dossier'] = 1;

    }

    public function modification()
    {
        {


            $bdd = parent::connexion_bd();

            //Sélection dans la table utilisateur
            $req = $bdd->prepare('SELECT * FROM infouser WHERE login= ?');
            $req->execute(array($_SESSION['login']));
            $data = $req->fetch();

            ?>

            <!-- affichage du Formulaire de modification -->
            <form method="post" action="../../../Traitement/User/Info/ModifT.php">

                Votre nom:
                <input type="text" name="nom" value=<?php echo $data['nom']; ?>>
                <br><br>

                Votre prenom:
                <input type="text" name="prenom" value=<?php echo $data['prenom']; ?>>
                <br><br>

                Votre date:
                <input type="text" name="date de naissance" value=<?php echo $data['date']; ?>>
                <br><br>

                Votre adresse:
                <input type="text" name="adresse" value=<?php echo $data['adresse']; ?>>
                <br><br>

                Votre mutuel:
                <input type="text" name="mutuel" value=<?php echo $data['mutuel']; ?>>
                <br><br>

                Votre sécurité sociale:
                <input type="text" name="sq" value=<?php echo $data['sq']; ?>>
                <br><br>

                Votre Option Télé:
                <input type="text" name="optionTele" value=<?php echo $data['optionTele']; ?>>
                <br><br>

                Votre régime:
                <input type="text" name="regime" value=<?php echo $data['regime']; ?>>
                <br><br>

                <input type="submit" value="Envoyer"/><br><br>

            </form>

            <?php

        }
    }

    public function AffichageModification2(SetUpDossier $modif)
    {


        $bdd = parent::connexion_bd();

        //initialisation des variables
        $prenom = $modif->getPrenom();
        $nom = $modif->getNom();
        $date = $modif->getDate();
        $adresse = $modif->getAdresse();
        $mutuel = $modif->getMutuel();
        $sq = $modif->getSq();
        $optionTv = $modif->getOptionTv();
        $optionWifi = $modif->getOptionWifi();
        $regime = $modif->getRegime();


        //connexion à la basse de données


        //on récupére l'idUser avec le sessionId
        $reponseSel = $bdd->prepare('SELECT idUser FROM user WHERE sessionId = ?');
        $reponseSel->execute(array($_SESSION['sessionId']));
        $result = $reponseSel->fetch();
        $id = $result[0];

        //Modification dans la table utilisateur
        $req2 = $bdd->prepare('UPDATE infouser SET nom = ?, prenom = ?, date = ?, adresse = ?, mutuel = ?, secusocial= ?, optionTV = ?,optionWifi = ?, regime = ? WHERE idUser = ?');
        $reponse79 = $req2->execute(array($nom, $prenom, $date, $adresse, $mutuel, $sq, $optionTv, $optionWifi, $regime, $id));


    }


}

?>