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

}


?>