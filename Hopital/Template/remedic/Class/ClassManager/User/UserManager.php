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

}
 ?>
