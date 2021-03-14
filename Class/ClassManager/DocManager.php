<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/ProjethopitalPhP/Class/ClassManager/PdoManager.php");


class DocManager extends PdoManager

{

    public function getDoc(){

        $req = parent::connexionBDD()->query("SELECT * FROM infomedecin");
        $dataDoc = $req->fetchall();

        return $dataDoc;


    }





}


?>