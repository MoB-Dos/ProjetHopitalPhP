<?php

session_start ();

if(isset($_SESSION['profil']))
{
?>


  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="inde.php"><i class="flaticon-pharmacy"></i><span>Re</span>Medic</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">

      <li class="nav-item active"><a href="deco.php" class="nav-link">deco</a></li>
        <li class="nav-item active"><a href="zoneTest.php" class="nav-link">! Zone de TEST !</a></li>
        <li class="nav-item active"><a href="inde.php" class="nav-link">Accueil</a></li>
        <li class="nav-item"><a href="aPropos.php" class="nav-link">A propos</a></li>
        <!--<li class="nav-item cta"><a href="contact.html" class="nav-link"  style="margin-right: 5px;" data-toggle="modal" data-target="#Connexion"><span>Connexion</span></a></li>
        <li class="nav-item cta"><a href="contact.html" class="nav-link" data-toggle="modal" data-target="#Inscription"><span>Inscription</span></a></li>-->
      </ul>
    </div>
  </div>
  </nav>


<?php
} else {
?>


  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="inde.php"><i class="flaticon-pharmacy"></i><span>Re</span>Medic</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="zoneTest.php" class="nav-link">! Zone de TEST !</a></li>
        <li class="nav-item active"><a href="inde.php" class="nav-link">Accueil</a></li>
        <li class="nav-item"><a href="aPropos.php" class="nav-link">A propos</a></li>
        <li class="nav-item"><a href="departement.php" class="nav-link">Département</a></li>
        <li class="nav-item"><a href="docteur.php" class="nav-link">Docteur</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
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
            <form action="traitement/user/connexionT.php" method="post">
              <div class="form-group">
                <label for="appointment_name" class="text-black" name="login">Login</label>
                <input type="text" class="form-control" id="login" name="login">
              </div>
              <div class="form-group">
                <label for="appointment_mdp" class="text-black" name="mdp">Mot de passe</label> <input onclick="showHidePassword()" type="checkbox" id="checkbox" ></input >
                
                <input type="password" id="mdp" class="form-control" id="appointment_email" name="mdp">
                <label class="text-grey">Mot de passe oublié cliquez <a href="MdpOublié.html"> ici </a></label>
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
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="traitement/user/inscriptionTraitement.php" method="post">
              <div class="form-group">
                <label for="appointment_name" class="text-black" name="login">Login</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black"name="mail">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              
              <div class="form-group">
                <label for="appointment_mdp" class="text-black"name="mdp">Mot de passe</label> <input onclick="myFunction2()" type="checkbox" id="checkbox2" ></input >
                
                <input type="password" id="password2" class="form-control" id="appointment_email">
                
              </div>
              <div class="form-group">
                <label for="appointment_mdp" class="text-black"name="mdp2 ">Réecrivez votre mot de passe</label> <input onclick="myFunction2()" type="checkbox" id="checkbox2" ></input >
                
                <input type="password" id="password2" class="form-control" id="appointment_email">
                
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
function showHidePassword() {
  //document.getElementById('password').type = 'text';


  if (document.getElementById('checkbox').checked == false) {
    document.getElementById('password').type = 'password'
  }else if(document.getElementById('checkbox').checked == true) {
    document.getElementById('password').type = 'text'
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