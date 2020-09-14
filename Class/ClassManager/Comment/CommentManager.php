<?php




class CommentManager

{

    

    public function CommentAff($film)
    {
      //on affiche les commentaire pour un film en particulier comme ca chaque page possede ses porpre films 
        
        try
        {
        $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
        }
        catch(Exception $e)
        {
          die('Erreur:'.$e->getMessage());
        }
      
    $req = $bdd->query("SELECT * FROM comment Where film = '$film' ");
    
    
    $data=$req->fetchall();
    
    if(isset($data))
    {
      
    
    
      foreach ($data as $value) {
        
        echo $value['login']." "."note ".$value['note']."/5".'<br/><br/>';
        echo $value['message'].'<br/><br/>';
        
      }
    
    
    }else
    {
      echo "pas de commentaire";
    }
   
   }

   public function ajoutCommentaire(SetUpComment $ajout)
   {

    //un ajout simple de commentaire dans la BDD

    $message = $ajout->getMessage();
    $note = $ajout->getNote();
    $login = $_SESSION['login'];
    $film = $ajout->getFilm();
    try
    {
    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
    }
    catch(Exception $e)
    {
      die('Erreur:'.$e->getMessage());
    }

    $req = $bdd->prepare('INSERT INTO comment (message,login,note,film) VALUES (?,?,?,?)');
        $req -> execute(array($message,$login,$note,$film));


   }

}



?>