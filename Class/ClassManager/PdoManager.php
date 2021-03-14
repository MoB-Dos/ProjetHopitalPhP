<?php

class PdoManager

{
    public function connexionBDD()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }

        return $bdd;
    }


    public function getIdUser()
    {
        $reponse=$this->connexionBDD()->prepare('SELECT idUser FROM user WHERE sessionId = ?');
        $reponse->execute(array($_SESSION['sessionId']));
        $dataId=$reponse->fetch();

        return $dataId;
    }
}


?>