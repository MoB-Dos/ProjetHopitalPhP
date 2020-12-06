<?php

session_start ();






//quand le User est connecté
if(isset($_SESSION['sessionId']))
{

try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e){
die('Erreur:'.$e->getMessage());
}


$req=$bdd->prepare('SELECT * FROM user WHERE sessionId = ?');
$req->execute(array( $_SESSION['sessionId']));
$data = $req->fetch();





?>


  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php"><i class="flaticon-pharmacy"></i><span>Re</span>Medic</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">

      
        <li class="nav-item active">
        <a href="/Slam2/ProjethopitalPHP/Hopital/ZoneTest" class="nav-link">
        ! Zone de TEST !
        </a>
        </li>
        <li class="nav-item active"><a href="../../index.php" class="nav-link">Accueil</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/View/Page/aPropos.php" class="nav-link">A propos</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/View/Page/departement.php" class="nav-link">Département</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/View/Page/docteur.php" class="nav-link">Docteur</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/View/Page/contact.php" class="nav-link">Contact</a></li>


        <div class="btn-group">
        
        
         <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="masquer_div('badge');" >
          Mon Profil
         </button> 
        
        <div class="dropdown-menu" >

          
          <a class="dropdown-item" ><?php echo $data['login'] ?> </a>
         
          <div class="dropdown-divider"></div>

        <?php
        if($data['dossier'] == 0)
        {
          ?>
         <div>
         <span class="badge2"></span> 
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#DossierCréation">Faire mon dossier</a>
        </div>          
          
          <?php

        }else
        {


          ?>
           
          <a class="dropdown-item" href="/Slam2/ProjethopitalPHP/Hopital/View/gestionUser/VoirDossier.php">Voir mon dossier</a>
          
          <?php

        }

        if($data['profil'] == 'admin')
        {
          ?>
         <div>
         <span class="admin"></span> 
          <a class="dropdown-item" href="view/Page/AdminPanel.php">Panel Admin</a>
        </div>          
          
          <?php

        }



        if($data['profil'] == 'medecin')
        {
          ?>
         <div>
         <span class="admin"></span> 
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#">Panel Medecin</a>
        </div>          
          
          <?php

        }

        ?>
          
        
          
          
          <a class="dropdown-item" href="/Slam2/ProjethopitalPHP/Hopital/View/RendezVous/MesRendezVous.php" >Mes rendez-vous</a>
          <a class="dropdown-item" href="/Slam2/ProjethopitalPHP/Hopital/View/gestionUser/ModifDossier.php">Modifier mon profil</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/Slam2/ProjethopitalPHP/Hopital/Traitement/User/decoT.php">Déconnexion</a>
        </div> 

        <?php

        if($_SESSION['dossier'] == 0)
        {

          ?>
            <span class="badge" id="badge"> </span>
          <?php
        }

        ?>

        </div> 
  
          <!-- <div id="myTooltips">
              
            <a href="#" data-toggle="tooltip" title="Cliquez ici pour Créer votre dossier "><i class="fas fa-exclamation-triangle"> </i></a>
        
          </div> -->

  
  
      </ul>
    </div>
  </div>
  </nav>


<?php

//quand le User est déconnecté
} else {
?>


  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php"><i class="flaticon-pharmacy"></i><span>Re</span>Medic</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/ZoneTest" class="nav-link">! Zone de TEST !</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/index.php" class="nav-link">Accueil</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/View/Page/aPropos.php" class="nav-link">A propos</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/View/Page/departement.php" class="nav-link">Département</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/View/Page/docteur.php" class="nav-link">Docteur</a></li>
        <li class="nav-item active"><a href="/Slam2/ProjethopitalPHP/Hopital/View/Page/contact.php" class="nav-link">Contact</a></li>

        <li class="nav-item cta"><a href="contact.html" class="nav-link"  style="margin-right: 5px;" data-toggle="modal" data-target="#Connexion"><span>Connexion</span></a></li>
        <li class="nav-item cta"><a href="contact.html" class="nav-link" data-toggle="modal" data-target="#Inscription"><span>Inscription</span></a></li>
      </ul>
    </div>
  </div>
  </nav>


<?php
}
?>






  <!-- Connexion -->
  <div class="modal fade" id="Connexion" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Connexion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/Slam2/ProjethopitalPHP/Hopital/Traitement/User/connexionT.php" method="post">
              <div class="form-group">
                <label for="appointment_name" class="text-black" name="login">Login</label>
                <input type="text" class="form-control" id="login" name="login">
              </div>


              <div class="form-group">

              
                <label for="appointment_mdp" class="text-black" class="sr-only" name="mdp">Mot de passe :</label> 
                
                <img href='#' src="https://img.icons8.com/material/24/000000/visible--v1.png" id="icon" onclick='showHidePassword("mdp2")' />

                <input type="password" id="mdp2"  class="form-control" id="appointment_email" name="mdp" > 
             

                

              </div>
          
         
              <div class="form-group">
                <input type="submit" value="Continuer" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

    <!--Inscription -->
    <div class="modal fade" id="Inscription" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Inscription</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/Slam2/ProjethopitalPHP/Hopital/Traitement/User/inscriptionT.php" method="post">

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="login">Login</label>

                <input type="text" class="form-control" id="login" name="login" required>
              </div>

              <div class="form-group">
                <label for="appointment_email" class="text-black" name="mail">Email</label>

                <input type="email" class="form-control" id="mail" name="mail" required>
              </div>
              
              <div class="form-group">

                <label for="appointment_mdp" class="text-black" name="mdp">Mot de passe :</label> 

                <img href='#' src="https://img.icons8.com/material/24/000000/visible--v1.png" id="icon2" onclick= "showHidePassword('mdp')" />
                
                <input type="password" id="mdp" class="form-control" name="mdp"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> 

                <label  class="text-grey" name="mdp">8 caractères, une majuscule et une minuscule</label> 

                
              </div>
                
              <div class="form-group">
              
                <label for="appointment_mdp" class="text-black" name="mdp2" >Réecrivez votre mot de passe :</label>   

                

                <input type="password" id="mdp2" class="form-control" name="mdp2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> 
               
              </div>
                
              
              <div class="form-group">
                <input type="submit" value="Continuer" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>




        <!-- Dossier Création
        <div class="modal fade" id="DossierCréation" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Votre Dossier Patient</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          <form action="/Slam2/projethopitalPHP/Hopital/Traitement/Dossier/dossierPatienT.php" method="post">


              <div class="form-group">
                <label for="appointment_name" class="text-black" name="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="date">Date de naissance</label>
                <input type="Date" class="form-control" id="date" name="date">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="sq">Sécurité sociale</label>
                <input type="text" class="form-control" id="sq" name="sq">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="mutuel">Mutuel</label>
                <input type="text" class="form-control" id="mutuel" name="mutuel">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="OptionTV">Option TV</label>
                <input type="text" class="form-control" id="optionTv" name="optionTv">
              </div>

              <div class="form-group">
                <label for="appointment_email" class="text-black" name="regime">Regime</label>
                <input type="text" class="form-control" id="regime" name="regime">
              </div>
          
                
              
              <div class="form-group">
                <input type="submit" value="Continuer" class="btn btn-primary">
              </div>
              
            </form>
          </div>
          
        </div>
      </div>
    </div> -->



<!--Dossier Création -->
<div class="modal fade" id="DossierCréation" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Votre <b>Dossier d'admission</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="container">
              

                  <form action="/Slam2/projethopitalPHP/Hopital/Traitement/Dossier/dossierPatienT.php" method="post">

                    
                  <div class="row">
                  <div class="col-lg-6">
                    
                    <div class="form-group">
                      <label for="appointment_name" class="text-black" name="prenom"><b>Prénom</b></label>
                      <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>

                    <div class="form-group">
                      <label for="appointment_name" class="text-black" name="nom"><b>Nom</b></label>
                      <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>

                    <div class="form-group">
                      <label for="appointment_name" class="text-black" name="date"><b>Date de naissance</b></label>
                      <input type="Date" class="form-control" id="birthday" name="birthday" >
                    </div>

                    <div class="form-group">
                      <label for="appointment_name" class="text-black" name="adresse"><b>Adresse</b></label>
                      <input type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>
                  
                  </div>
                  
                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="appointment_name" class="text-black" name="sq"><b>Sécurité sociale</b></label>
                      <input type="text" class="form-control" id="sq" name="sq" required>
                    </div>

                    <div class="form-group">
                      <label for="appointment_name" class="text-black" name="mutuel"><b>Mutuel</b></label>
                      <input type="text" class="form-control" id="mutuel" name="mutuel" required>
                    </div>


                  

                    
                    <div class="form-group">
                    <div class="row" style="margin-left: 0px;margin-bottom: -50px;">
                    

                        <!-- Option Tv -->
                        <div class="form-group">
                          <label for="appointment_name" class="text-black" name="tvradio"><b>Option TV</b></label>
                      
                        <div class="form-group">
                          <label  for="tvOui">Oui</label>
                          <input type="radio"  value="1" id="tvOui" name="tvradio" checked> </br>
                  
                          <label  class="text-black" for="tvNon">Non</label>
                          <input type="radio"  value="0" id="tvNon" name="tvradio" >
                        </div>
                        </div>
                  

                        <!-- Option Wifi -->
                        <div class="form-group" style="margin-left: 50px;">
                          <label for="appointment_name" class="text-black" name="wifiradio"><b>Option Wifi</b></label>
    
                        <div class="form-group">
                          <label  for="wifiOui">Oui</label>
                          <input type="radio"  value="1" id="wifiOui" name="wifiradio" checked> </br>
                  
                          <label  class="text-black" for="wifiNon">Non</label>
                          <input type="radio" value="0" id="wifiNon" name="wifiradio" >
                        </div>
                        </div>

                    
                    </div> 
                    </div> 
                    

                    <div class="form-group">
                      <label for="appointment_email" class="text-black" name="regime"><b>Régime</b></label>
                      <select  class="form-control" id="regime" name="regime" required>
                          <option value="" disabled selected>Choissisez votre régime</option>
                          <option value="1">Végétarien</option>
                          <option value="2">Vegan</option>
                          <option value="3">Halal</option>
                          <option value="3">Kacher</option>
                      </select>
                    </div>
                  
                  </div>

                  </div>
                  <div class="row">
                    
                  <div class="col-md-2 ml-auto">
                    <div class="form-group">
                      <input type="submit" value="Continuer" class="btn btn-primary">
                    </div>
                    </div>
                  </div>

                  

                  </form>
          </div>
          </div>
          
          
        </div>
      </div>
    </div>





<script language="javascript">

  // var elements = document.getElementsByClassName("mdpp");


  
function showHidePassword(id) {
  

  // elements.forEach((input) => {

    // if (input.type == "password") {

    // input.type = "text";
    // document.getElementById("icon").src = "https://img.icons8.com/material-sharp/24/000000/closed-eye.png";
    // document.getElementById("icon2").src = "https://img.icons8.com/material-sharp/24/000000/closed-eye.png";

    // } else {

    // input.type = "password";
    // document.getElementById("icon").src = "https://img.icons8.com/material/24/000000/visible--v1.png";
    // document.getElementById("icon2").src = "https://img.icons8.com/material/24/000000/visible--v1.png";
    // }


  // }
    var x = document.getElementById(id);
    if (x.type == "password") {

    x.type = "text";
    document.getElementById("icon").src = "https://img.icons8.com/material-sharp/24/000000/closed-eye.png";
    document.getElementById("icon2").src = "https://img.icons8.com/material-sharp/24/000000/closed-eye.png";

    } else {

    x.type = "password";
    document.getElementById("icon").src = "https://img.icons8.com/material/24/000000/visible--v1.png";
    document.getElementById("icon2").src = "https://img.icons8.com/material/24/000000/visible--v1.png";
    }

   
}




</script>