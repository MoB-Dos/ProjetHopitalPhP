<?php

session_start ();


//quand le User est connecté
if(isset($_SESSION['profil']))
{
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
        <a href="zoneTest.php" class="nav-link">
        ! Zone de TEST !
        </a>
        </li>
        <li class="nav-item active"><a href="index.php" class="nav-link">Accueil</a></li>
        <li class="nav-item active"><a href="View/Page/aPropos.php" class="nav-link">A propos</a></li>
        <li class="nav-item active"><a href="View/Page/departement.php" class="nav-link">Département</a></li>
        <li class="nav-item active"><a href="View/Page/docteur.php" class="nav-link">Docteur</a></li>
        <li class="nav-item active"><a href="View/Page/contact.php" class="nav-link">Contact</a></li>


        <div class="btn-group">
        
        
         <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="masquer_div('badge');" >
          Mon Profil
        </button> 
        
        <div class="dropdown-menu" >

          
          <a class="dropdown-item" ><?php echo $_SESSION['login'] ?> </a>
         
          <div class="dropdown-divider"></div>

        <?php
        if($_SESSION['dossier'] == 0)
        {
          ?>
         <div>
         <span class="badge2"></span> 
          <a class="dropdown-item" href="creationDossier.php" data-toggle="modal" data-target="#DossierCréation">Faire mon dossier</a>
        </div>          
          
          <?php

        }else
        {


          ?>
           
          <a class="dropdown-item" href="#">Voir mon dossier</a>
          
          <?php

        }
        ?>
          
        
          
          
          <a class="dropdown-item" href="#">Mes rendez-vous</a>
          <a class="dropdown-item" href="#">Modifier mon profil</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Traitement/User/decoT.php">Déconnexion</a>
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
        <li class="nav-item active"><a href="zoneTest.php" class="nav-link">! Zone de TEST !</a></li>
        <li class="nav-item active"><a href="index.php" class="nav-link">Accueil</a></li>
        <li class="nav-item"><a href="View/Page/aPropos.php" class="nav-link">A propos</a></li>
        <li class="nav-item"><a href="View/Page/departement.php" class="nav-link">Département</a></li>
        <li class="nav-item"><a href="View/Page/docteur.php" class="nav-link">Docteur</a></li>
        <li class="nav-item"><a href="View/Page/contact.php" class="nav-link">Contact</a></li>
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
            <form action="Traitement/User/connexionT.php" method="post">
              <div class="form-group">
                <label for="appointment_name" class="text-black" name="login">Login</label>
                <input type="text" class="form-control" id="login" name="login">
              </div>


              <div class="form-group">

              
                <label for="appointment_mdp" class="text-black" class="sr-only" name="mdp">Mot de passe :</label> 
                
                <img href='#' src="https://img.icons8.com/material/24/000000/visible--v1.png" id="icon" onclick='showHidePassword("mdp2")' />

                <input type="password" id="mdp2"  class="form-control" id="appointment_email" name="mdp" > 
             

                

              </div>
          
              <label class="text-grey">Mot de passe oublié cliquez <a href="MdpOublié.html"> ici </a></label>
         
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
            <form action="Traitement/User/inscriptionT.php" method="post">

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="login">Login</label>

                <input type="text" class="form-control" id="login" name="login" required>
              </div>

              <div class="form-group">
                <label for="appointment_email" class="text-black" name="mail">Email</label>

                <input type="email" class="form-control" id="mail" name="mail" placeholder="test" required>
              </div>
              
              <div class="form-group">

                <label for="appointment_mdp" class="text-black" name="mdp">Mot de passe :</label> 

                <img href='#' src="https://img.icons8.com/material/24/000000/visible--v1.png" id="icon" onclick='showHidePassword("mdp")'/>
                
                <input type="password" id="mdp" class="form-control" name="mdp"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> 

                
              </div>
                
              <div class="form-group">
              
                <label for="appointment_mdp" class="text-black" name="mdp2" >Réecrivez votre mot de passe :</label>   

                <input type="password" id="mdp" class="form-control" name="mdp2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> 
               
              </div>
                
              
              <div class="form-group">
                <input type="submit" value="Continuer" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>




        <!--Dossier Création -->
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
            <form action="../../Traitement/Dossier/dossierTphp" method="post">

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="Prenom">Prénom</label>
                <input type="text" class="form-control" id="Prenom">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="Nom">Nom</label>
                <input type="text" class="form-control" id="Nom">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="Date">Date de naissance</label>
                <input type="Date" class="form-control" id="Date">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="Adresse">Adresse</label>
                <input type="text" class="form-control" id="Adresse">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="sq">"sq"</label>
                <input type="text" class="form-control" id="sq">
              </div>

              <div class="form-group">
                <label for="appointment_name" class="text-black" name="OptionTV">Option TV</label>
                <input type="text" class="form-control" id="OptionTV">
              </div>

              <div class="form-group">
                <label for="appointment_email" class="text-black"name="Regime">Regime</label>
                <input type="text" class="form-control" id="Regime">
              </div>
          
                
              
              <div class="form-group">
                <input type="submit" value="Continuer" class="btn btn-primary">
              </div>
              
            </form>
          </div>
          
        </div>
      </div>
    </div>


<script language="javascript">




  
function showHidePassword(id) {
  
    var x = document.getElementById(id);
    if (x.type == "password") {
    x.type = "text";

    document.getElementById("icon").src = "https://img.icons8.com/material-sharp/24/000000/closed-eye.png";
    
    } else {
    x.type = "password";
    document.getElementById("icon").src = "https://img.icons8.com/material/24/000000/visible--v1.png";
    
    }

   
}

function showHidePassword2() {
  //document.getElementById('password').type = 'text';


  if (document.getElementById('checkbox2').checked == false) {
    document.getElementById('password2').type = 'password'
  }else if(document.getElementById('checkbox2').checked == true) {
    document.getElementById('password2').type = 'text'
  }
}



</script>