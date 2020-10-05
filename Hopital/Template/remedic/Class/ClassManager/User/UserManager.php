<?php
 //en création.


 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\SMTP;

 require 'Mail/vendor/phpmailer/phpmailer/src/Exception.php';
 require 'Mail/vendor/phpmailer/phpmailer/src/PHPMailer.php';
 require 'Mail/vendor/phpmailer/phpmailer/src/SMTP.php';
 require 'Mail/vendor/autoload.php';


 class UserManager

 {

  public function inscription(SetUpUser $ajout)
  {
  

      $mail = $ajout->getMail();
      $login =$ajout->getLogin();
      $mdp = $ajout->getMdp();
      $mdpc = $ajout->getMdp2();
  
      $profil="user";
      var_dump($mail, $login, $mdp, $mdpc);

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
      $reponse=$bdd->prepare('SELECT * FROM user WHERE login=? OR mail=?');
      $reponse->execute(array($login,$mail)); 
  
      $data=$reponse->fetchall();
  
      //Si l'utilisateur existe déjà, on affiche une boite de dialogue d'alerte
      if ($data)
      {
        echo '<body onLoad="alert(\'Utilisateur déjà existant\')">';
  
        echo '<meta http-equiv="refresh" content="0;URL=../../../View/User/Inscription.php">';
      }
  
      //Sinon si les mots de passe sont bien rentrés, on enregistre dans la tabe utilisateur
      else
      {
        if ($mdp == $mdpc)
        {
          
          

          $mdpc = md5($mdpc);
          
          $req = $bdd->prepare('INSERT INTO user (login,mdpc,mdp,mail,profil) VALUES (?,?,?,?,?)');
          $req -> execute(array($login,$mdpc,$mdp,$mail,$profil));
          var_dump($req);
          //Envoi du mail de confirmation
          $objet = "Bienvenue dans le club !";
          $sujet = "Vous pourrez recevoir ici toutes les nouvauté ou encore les promotions sur nos fabuleux Hamburger.";
          $email = $mail;
  
  
          $this-> Mail($objet,$sujet,$email);
          ?>
            <script type="text/javascript">
  
                  var msg="Inscription reussie !"
  
  
                alert(msg);
  
                header("location: ../../template/EndGam/HTML/home.php");
  
            </script>
          <?php
  
  
        }
  
        //Sinon, on affiche une boite de dialogue d'erreur
        else
        {
          echo '<body onLoad="alert(\'Veuillez entrer deux mots de passe identiques\')">';
  
          echo '<meta http-equiv="refresh" content="0;URL=Inscription.php">';
        }
       }
  
  
  
  }

  public function connexion(SetUpUser $connexion)
  {
    //Démarrage de la session
    session_start ();
  
    $mdp = $connexion->getMdp();
    $login = $connexion->getLogin();
  
    //Connexion à la base de données projetweb
    try
    {
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
    }
    catch(Exception $e)
    {
      die('Erreur:'.$e->getMessage());
    }
  
  
    //Sélection dans la table utilisateur
    $reponse=$bdd->prepare('SELECT * FROM user WHERE login = :login AND mdp = :mdp');
    $reponse->execute(array(
      'login' => $login,
      'mdp' => $mdp,
    ));
  
    $data =$reponse->fetch();
  
    //Pour chaque donnée
  
      //Si les zones login et mdp sont entrées
      if (isset($login) && isset($mdp))
      {
  
        //Si les données correspondent au données de la base de données
        if ($data['login'] == $login && $data['mdp'] == $mdp)
        {
          //On enregistre login et prénom dans la session
  
          $_SESSION['login'] = $login;
  
          if ($data['profil'] == 'user')
          {
            //Renvoi vers la page Classique
  
            setcookie('profil','user', time() + 365*24*3600, null, null, false, true);
            $_SESSION['profil'] = user;
            header("location: ../../inde.php");
  
          }
  
          if ($data['profil'] == 'admin')
          {
            //Renvoi vers la page Admin
            setcookie('profil', 'admin', time() + 365*24*3600, null, null, false, true);
            $_SESSION['profil'] = admin;
            header("location: ../../inde.php");
  
  
          }
          if ($data['profil'] == 'medecin')
          {
            //Renvoi vers la page Admin
            setcookie('profil', 'admin', time() + 365*24*3600, null, null, false, true);
            $_SESSION['profil'] = admin;
            header("location: ../../inde.php");
  
  
          }
        }
        //Sinon on affiche une boite de dialogue d'alerte
        else
        {
          echo '<body onLoad="alert(\'Acces refuse\')">';
  
          echo '<meta http-equiv="refresh" content="0;URL=../../ndex.php">';
        }
      }
      //Sinon on demande à remplir les champs vides
      else
      {
        echo 'Veuillez remplir les champs vides';
      }
  
  }
  
  
  
  
public function MdpOublier(SetUpGestion $connexion)
{
  try{
    //connexion à la base de données
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
  }

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }
//initialisation des variables mail et verif
  $mail = $connexion->getMail();
  $verif=rand(4000, 9999);
  // initialisation des varaibles verif et mail
  setcookie('verif',$verif, time() + 365*24*3600, null, null, false, true);
  setcookie('mail',$mail, time() + 365*24*3600, null, null, false, true);
  //modification de la table utilisateur
  $req = $bdd->prepare('SELECT id FROM user WHERE mail= ?');
  $req -> execute(array($mail));
  //on rentre les différent champ du mail
  $objet = "Rebienvenue dans le club !";
  $sujet = "Voici votre code unique : ".$verif." Pour changer votre mot de passe : http://localhost/ProjetCinemaPhP/Traitement/User/info/MdpOublierT2.php";
  $email = $mail; //c'est pour phpmailer
  $this-> Mail($objet,$sujet,$email);
  ?>
  <script type="text/javascript">

        var msg="mail envoyer, suivez ces instruction pour changer votre mot de passe"


      alert(msg);
  </script>

<?php
exit();
//redirection à mdp2
header('location: ../../../View/User/MdpOublier2.php');

//header("location: ../../../View/User/MdpOublier2.php");


}
public function MdpOublier2()
{
//initialisation des variables
  $mdp = $_POST['mdp'];
  $mdpc = $_POST['mdp2'];
  $mail = $_COOKIE['mail'];

//si le verif saisit est égal au cookie verif
  if ($_POST["verif"]=$_COOKIE["verif"]) {
    try{
      //connexion à la base de données

      $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
    }

    catch(Exception $e){
      die('Erreur:'.$e->getMessage());
    }
    //on affiche les données de la table utilisateur
  $req = $bdd->prepare('SELECT id FROM user WHERE mail= ?');
  $req -> execute(array($mail));


    if ($mdp == $mdpc)
    {




      // on modifie les données de la table Utilisateur
      $req1 = $bdd->prepare('UPDATE user SET mdp = ?, mdpc = ? WHERE mail = ?');
      $a = $req1 -> execute(array( $mdp, md5($mdp), $mail));


var_dump($a)



      ?>

        <script type="text/javascript">
        //code javascript
              var msg="Modification de mdp réussi !"
              //on affiche un message sous forme d'alerte

            alert(msg);


        </script>
      <?php

}
else { // sinon on affiche nul
  echo"nul";
} //fin de si
}}

public function mail($objet,$sujet,$email)
{
  $mail = new PHPMailer(true);

  try {

      $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'projetweb932@gmail.com';
      $mail->Password   = 'projetweb932azer';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port       = 587;

      $mail->setFrom('projetweb932@gmail.com', 'Mailer');
      $mail->addAddress($email, 'user');

      $mail->isHTML(true);
      $mail->Subject = $objet;
      $mail->Body    = $sujet;
      $mail->AltBody = $sujet;

      $mail->send();

      echo 'Message has been sent';
        } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

}


public function MdpOublier2()
{
  try{
    //connexion à la base de données
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
  }

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }
  $req = $bdd->prepare('INSERT INTO user (login,mdpc,mdp,mail,profil) VALUES (?,?,?,?,?)');
  $req -> execute(array($login,$mdpc,$mdp,$mail,$profil));
}
/*SELECT (SELECT nom AS monchamp FROM infomedecin
UNION
SELECT prenom AS monchamp FROM infomedecin
UNION
SELECT spe AS monchamp FROM infomedecin
)
INSTR(monchamp, "b")
FROM infomedecin*/

}
 ?>
