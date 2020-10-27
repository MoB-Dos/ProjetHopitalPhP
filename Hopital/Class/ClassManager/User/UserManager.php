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
      $dossier="0";
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
          
          $req = $bdd->prepare('INSERT INTO user (login,mdpc,mdp,mail,profil,dossier) VALUES (?,?,?,?,?,?)');
          $req -> execute(array($login,$mdpc,$mdp,$mail,$profil,$dossier));
          var_dump($req);

          //Envoi du mail de confirmation
          $objet = "Bienvenue à l'Hopital Bariller!";
          $sujet = "Vous pourrez recevoir ici toutes les nouvautés aux sujets de l'établissement mais aussi vos prochain rendez-vous !";
          $email = $mail;
          $this-> Mail($objet,$sujet,$email);
          
        
          $_SESSION['login'] = $login;
          $_SESSION['profil'] = "user";
          $_SESSION['dossier'] = "0";
  
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
          $_SESSION['dossier'] = $data['dossier'];
  
          if ($data['profil'] == 'user')
          {
            //Renvoi vers la page Classique
  
            setcookie('profil','user', time() + 365*24*3600, null, null, false, true);
            $_SESSION['profil'] = "user";
  
          }
  
          if ($data['profil'] == 'admin')
          {
            //Renvoi vers la page Admin
            setcookie('profil', 'admin', time() + 365*24*3600, null, null, false, true);
            $_SESSION['profil'] = "admin";
  
          }
          if ($data['profil'] == 'medecin')
          {
            //Renvoi vers la page Admin
            setcookie('profil', 'medecin', time() + 365*24*3600, null, null, false, true);
            $_SESSION['profil'] = "medecin";
            

          }
          
      //header("location: ../../../index.php");

        }

        //Sinon on affiche une boite de dialogue d'alerte
        else
        {
          /*echo '<body onLoad="alert(\'Acces refuse\')">';
  
          echo '<meta http-equiv="refresh" content="0;URL=../../index.php">';*/
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


/*public function MdpOublier2()
{
  try{
    //connexion à la base de données
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }
  $req = $bdd->prepare('INSERT INTO user (login,mdpc,mdp,mail,profil) VALUES (?,?,?,?,?)');
  $req -> execute(array($login,$mdpc,$mdp,$mail,$profil));
}*/
/*SELECT (SELECT nom AS monchamp FROM infomedecin
UNION
SELECT prenom AS monchamp FROM infomedecin
UNION
SELECT spe AS monchamp FROM infomedecin
)
INSTR(monchamp, "b")
FROM infomedecin

SELECT spe, INSTR(nom, "b") AS verifnom, INSTR(prenom, "b") AS verifprenom, INSTR(spe, "b") AS verifspe, INSTR(lieu, "b") AS veriflieu
FROM infomedecin
*/
public function Recherche(SetUpGestion $rd){

  $Recherche = $rd->getRecherche();

      //Connexion à la base de données projetweb
      try
      {
      $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
      }
      catch(Exception $e)
      {
        die('Erreur:'.$e->getMessage());
      }
          
          $req = $bdd->prepare('SELECT idMedecin, INSTR(nom, ?) AS verifnom, INSTR(prenom, ?) AS verifprenom, INSTR(spe, ?) AS verifspe, INSTR(lieu, ?) AS veriflieu
          FROM infomedecin');
          $req -> execute(array($Recherche, $Recherche, $Recherche, $Recherche));
          $result=$req->fetchALL();

          $req2 = $bdd->query('SELECT COUNT(idMedecin) FROM infomedecin');
          $result2=$req2->fetch();
          for ($i = 0; $i<=$result2[0]-1; $i++) {
            $find=0;

            if ($result[$i][1]!=0){
              $find=1;
            }
            if ($result[$i][2]!=0){
              $find=1;
            }
            if ($result[$i][3]!=0){
              $find=1;
            }
            if ($result[$i][4]!=0){
              $find=1;
            }
            if ($find!=0){

              $req3=$bdd->prepare('SELECT * FROM infomedecin WHERE idMedecin= ?');
              $req3->execute(array($result[$i][0]));

              $result3=$req3->fetch();
              
              ?>


<div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url(images/doctor-1.jpg);">
	                <div class="box">
	                  <h2><?php echo($result3[1].$result3[2]); ?></h2>
	                  <p><?php echo($result3[3]); ?></p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url(images/doctor-1.jpg);"></div>
	                  </div>
	                  <div class="name align-self-center">echo($result3[1].$result3[2]) <span class="position"><?php echo($result3[3]); ?></span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
            <?php
            }
          }


}



public function affichage()
{

  try
  {
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
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

        echo "Nom : ".$value['login'].'<br><br>';
        echo "Mail : ".$value['mail'].'<br><br>' ;

      }

}


public function AffichageModification()
{


try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
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
<form method="post" action="modificationT.php">

  Votre Login:
	<input type="text" name="login" value=<?php echo $data['login'];?>>
  <br><br>

	Votre Mail:
	<input type="text" name="mail" value=<?php echo $data['mail'];?>>
  <br><br>

<input type="submit" value="Envoyer"/><br><br>

</form>

	<?php

}


public function ModificationGestion(SetUpGestion $connexion)
{

//  setcookie('login',$_SESSION['login'], time() + 365*24*3600, null, null, false, true);

 //on initialise nos variables
  $mail = $connexion->getMail();
  $login =$connexion->getLogin();
 

// connexion à la base de donnés
  try{
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
  }

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }



  //Modification dans la table utilisateur
    $req = $bdd->prepare('UPDATE user SET login = ? ,mail = ? Where login = ?');
    $a = $req -> execute(array($login, $mail,$_SESSION['login']));

//deconnexion
    $this-> Deconnexion();

    $_SESSION['login'] = $login;

}


public function Deconnexion()
{

  session_destroy();

}

















}
 ?>
