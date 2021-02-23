<?php

class lolManager {
    
    function connexion_bd(){
        try
        {
          $bdd = new PDO( 'mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
     
        }
        catch(Exception $e)
        {
          die('ERREUR:'.$e->getMessage());
        }
        return $bdd;
    }
    

    




}   


?>