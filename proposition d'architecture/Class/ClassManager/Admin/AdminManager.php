<?php


class AdminManager

{


public function AjoutAdmin($login)
{

  //avec cette fonction on change juste la valeur bool dans la bdd en 1 pour le passer en admin 
    var_dump($login);

    try
    {
    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
    }
    catch(Exception $e)
    {
      die('Erreur:'.$e->getMessage());
    }

    //Sélection des données dans la table utilisateur
    $reponse=$bdd->prepare('UPDATE user SET admin = 1 WHERE login = :login');
    $reponse->execute(array('login' => $login,));

    //header("location: ../../ndex.php");

}


}




?>