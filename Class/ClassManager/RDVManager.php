<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/ProjethopitalPhP/Class/ClassManager/PdoManager.php");


class RDVManager extends PdoManager

{

    public function AjoutRDV(SetUpRDV $ajout)
    {
        $bdd = parent::connexion_bd();

        //déclaration des variables
        $horaire = $ajout->getHforaire();
        $date = $ajout->getDate();
        $motif = $ajout->getMotif();
        $idMedecin = $ajout->getIdMedecin();


        // //Sélection des données dans la table utilisateur
        // $reponse=$bdd->prepare('SELECT login FROM user WHERE login= ?');
        // $reponse->execute(array($_SESSION['login']));

        // $data=$reponse->fetchall();


        //insertion dans la table rendezvous
        $req = $bdd->prepare('INSERT INTO rendezvous (date,idHoraire,idMedecin,idUser,motif) VALUES (?,?,?,?,?)');
        $req->execute(array($date, $horaire, $idMedecin, $_SESSION['id'], $motif));


    }

    public function affichageRDV()
    {

        $bdd = parent::connexion_bd();

        //Commande sql pour selectionner dans la table utilisateur
        $req = $bdd->prepare('SELECT * FROM rdv WHERE login = :login');
        $req->execute(array('login' => $_SESSION['login']));

        $data = $req->fetchall();


        //Affichage de chacune des donnees selon le profil_id
        foreach ($data as $value) {

            echo "Docteur : " . $value['docteur'] . '<br><br>';
            echo "Date : " . $value['date'] . '<br><br>';
            if ($value['horaire'] == 0) {
                echo "Horaire : Après midi <br><br>";
            } else if ($value['horaire'] == 1) {
                echo "Horaire : Matin <br><br>";
            }
            echo "Motif : " . $value['motif'] . '<br><br>';

            echo "-------------------- <br><br>";


        }

    }

    public function ModificationRDV()
    {

        $bdd = parent::connexion_bd();


//Sélection dans la table utilisateur
        $req = $bdd->prepare('SELECT * FROM rdv WHERE login= ?');
        $req->execute(array($_SESSION['login']));
        $data = $req->fetch();

        ?>

        <!-- Formulaire de modification -->
        <form method="post" action="modificationT.php">

            La date:

            <input type="Date" class="form-control" id="date" name="date" min="2018-01-01" max="2021-12-31"
                   value=<?php echo $data['date']; ?> required>
            <br><br>


            L'horaire :

            <?php
            if ($data['horaire'] == 0) {
                ?>
                <input class="form-check-input" type="radio" name="horaire" id="matin" value="0" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Matin
                </label>

                <input class="form-check-input" type="radio" name="horaire" id="apresmidi" value="1">
                <label class="form-check-label" for="exampleRadios2">
                    Après Midi
                </label>
                <br><br>

                <?php
            } else if ($data['horaire'] == 1) {
                ?>
                <input class="form-check-input" type="radio" name="horaire" id="matin" value="0">
                <label class="form-check-label" for="exampleRadios1">
                    Matin
                </label>

                <input class="form-check-input" type="radio" name="horaire" id="apresmidi" value="1" checked>
                <label class="form-check-label" for="exampleRadios2">
                    Après Midi
                </label>
                <br><br>

                <?php
            }
            ?>


            Le motif :
            <input type="textarea" name="mail" value=<?php echo $data['motif']; ?>>
            <br><br>

            <input type="submit" value="Envoyer"/><br><br>

        </form>

        <?php

    }


}


?>