<?php

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

    $nom = $ajout->getNom();
    $prenom = $ajout->getPrenom();
    $mail = $ajout->getMail();
    $login =$ajout->getLogin();
    $mdp = $ajout->getMdp();
    $mdpc = $ajout->getMdp2();

    $admin=0;
    //Connexion à la base de données projetweb
    try
    {
    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
    }
    catch(Exception $e)
    {
      die('Erreur:'.$e->getMessage());
    }

    //Sélection des données dans la table utilisateur
    $reponse=$bdd->prepare('SELECT * FROM user WHERE nom=? AND prenom=? OR mail=?');
    $reponse->execute(array($nom, $prenom,$mail));

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

        $req = $bdd->prepare('INSERT INTO user (nom,prenom, login,mail,mdpc,mdp,admin) VALUES (?,?,?,?,?,?,?)');
        $req -> execute(array($nom,$prenom, $login,$mail,$mdpc,$mdp,$admin));

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
  $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
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

        if ($data['admin'] == '0')
        {
          //Renvoi vers la page Classique

          setcookie('admin','0', time() + 365*24*3600, null, null, false, true);
          $_SESSION['admin'] = 0;
          header("location: ../../template/EndGam/HTML/home.php");

        }

        if ($data['admin'] == '1')
        {
          //Renvoi vers la page Admin
          setcookie('admin', '1', time() + 365*24*3600, null, null, false, true);
          $_SESSION['admin'] = 1;
          header("location: ../../template/EndGam/HTML/home.php");


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


public function Deconnexion()
{

  session_destroy();

}

public function affichage()
{
  try
  {
  $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
  }
  catch(Exception $e)
  {
    die('Erreur:'.$e->getMessage());
  }

    //Commande sql pour selectionner dans la table utilisateur
    $req = $bdd->prepare('SELECT * FROM user WHERE login = :login');
    $req->execute(array('login' => $_SESSION['login']));

    $data=$req->fetchall();


    //Affichage de chacune des donnees selon le profil_id
    foreach ($data as $value) {

        echo "Nom : ".$value['nom'].'<br><br>';
        echo "Prenom : ".$value['prenom'].'<br><br>';
        echo "Mail : ".$value['mail'].'<br><br>' ;
        echo "Votre login: ".$value['login'].'<br><br>' ;
      }



}

public function AffichageModification()
{


try{
  $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
}

catch(Exception $e){
  die('Erreur:'.$e->getMessage());
}


//Sélection dans la table utilisateur
$req=$bdd->prepare('SELECT * FROM user WHERE login= ?');
$req->execute(array( $_SESSION['login']));
$data = $req->fetch();

?>

<!-- Formulaire de modification -->
<form method="post" action="../../../Traitement/User/Info/ModifT.php">

  Votre login:
	<input type="text" name="login" value=<?php echo $data['login'];?>>
  <br><br>

  Votre nom:
	<input type="text" name="nom" value=<?php echo $data['nom'];?>>
	<br><br>

	Votre prenom:
	<input type="text" name="prenom" value=<?php echo $data['prenom'];?>>
  <br><br>

	Votre mail:
	<input type="text" name="mail" value=<?php echo $data['mail'];?>>
  <br><br>

<input type="submit" value="Envoyer"/><br><br>

</form>

	<?php

}

public function Gestion()
{


try{
  $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
}

catch(Exception $e){
  die('Erreur:'.$e->getMessage());
}
$count=$bdd->query('SELECT COUNT(id) as nbid FROM user');
$donnees = $count->fetch();
echo $donnees['nbid'];
for ($id=0; $id <$donnees['nbid']; $id++) {


//Sélection dans la table utilisateur
$req=$bdd->query('SELECT * FROM user ORDER BY ID');
$data = $req->fetchall();

?>

<!-- Formulaire de modification -->
<form method="post" action="../../../Traitement/User/Info/GestionT.php">
  id:
  <input type="text" name="id" readonly value=<?php echo $data[$id][0];?>>
  <br><br>

  login:
	<input type="text" name="login" value=<?php echo $data[$id][3];?>>
  <br><br>

  nom:
	<input type="text" name="nom" value=<?php echo $data[$id][1];?>>
	<br><br>

	prenom:
	<input type="text" name="prenom" value=<?php echo $data[$id][2];?>>
  <br><br>

  mail:
	<input type="text" name="mail" value=<?php echo $data[$id][4];?>>
  <br><br>

  Mdp:
	<input type="text" name="mdp" value=<?php echo $data[$id][6];?>>
  <br><br>

  admin :
  <input type="text" name="admin" value=<?php echo $data[$id][7];?>>


  <br><br>
<input type="submit" value="Envoyer"/>


</form>

	<?php

}
}

public function delete()
{
  ?>
  <form method="post" action=<?php echo $_SERVER['SCRIPT_NAME']; ?>>
<!-- on envoie les données du formulaire dans la page actuel -->
  taper l'id à supprimer
  <input type="text" name="delete" value='rien'><br></br>
  <input type="submit" value="supprimer" /><br>

  <?php
  try{
    // connexion à la base de donnés

    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
  }

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }
  ini_set('display_errors', 'off'); // suppresion d'erreur inutile
  //on supprime les données de la table Utilisateur
  $req2=$bdd->prepare('DELETE FROM user WHERE id = ?');
  $req2->execute(array($_POST['delete']));
  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

}

public function ModificationGestion(SetUpGestion $connexion)
{

//  setcookie('login',$_SESSION['login'], time() + 365*24*3600, null, null, false, true);

 //on initialise nos variables
  $nom = $connexion->getNom();
  $prenom = $connexion->getPrenom();
  $mail = $connexion->getMail();
  $login =$connexion->getLogin();
  $mdp =$connexion->getMdp();
  $admin =$connexion->getAdmin();
  $id =$connexion->getId();

// connexion à la base de donnés
  try{
    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
  }

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }



  //Modification dans la table utilisateur
    $req = $bdd->prepare('UPDATE user SET login = ?, nom = ?, prenom = ?, mail = ?, mdp = ?, mdpc = ?, admin = ?  WHERE id = ?');
    $a = $req -> execute(array($login, $nom,$prenom, $mail, $mdp, md5($mdp), $admin, $id));

//deconnexion
    $this-> Deconnexion();

    $_SESSION['login'] = $login;

}
public function MdpOublier(SetUpGestion $connexion)
{
  try{
    //connexion à la base de données
    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
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

      $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
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

public function Modification(SetUpUser $connexion)
{
//initialisation du cookie login
  setcookie('login',$_SESSION['login'], time() + 365*24*3600, null, null, false, true);

//initialisation des variables
  $nom = $connexion->getNom();
  $prenom = $connexion->getPrenom();
  $mail = $connexion->getMail();
  $login =$connexion->getLogin();

//connexiob à la basse de données
  try{
    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
  }

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }



  //Modification dans la table utilisateur
    $req = $bdd->prepare('UPDATE user SET login = ?, nom = ?, prenom = ?, mail = ? WHERE login = ?');
    $a = $req -> execute(array($login, $nom,$prenom, $mail, $_SESSION['login']));


    $this-> Deconnexion();

    $_SESSION['login'] = $login;

}


}

?>
