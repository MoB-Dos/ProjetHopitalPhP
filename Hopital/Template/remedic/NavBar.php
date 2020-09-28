<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html"><i class="flaticon-pharmacy"></i><span>Re</span>Medic</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="departments.html" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.html" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          <li class="nav-item cta"><a href="contact.html" class="nav-link"  style="margin-right: 5px;" data-toggle="modal" data-target="#Connexion"><span>Connexion</span></a></li>
          <li class="nav-item cta"><a href="contact.html" class="nav-link" data-toggle="modal" data-target="#Inscription"><span>Inscription</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

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
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Login</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_mdp" class="text-black">Mot de passe</label> <input onclick="myFunction()" type="checkbox" id="checkbox" ></input >
                
                <input type="password" id="password" class="form-control" id="appointment_email">
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
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Login</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              
              <div class="form-group">
                <label for="appointment_mdp" class="text-black">Mot de passe</label> <input onclick="myFunction2()" type="checkbox" id="checkbox2" ></input >
                
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
function myFunction() {
  //document.getElementById('password').type = 'text';


  if (document.getElementById('checkbox').checked == false) {
    document.getElementById('password').type = 'password'
  }else if(document.getElementById('checkbox').checked == true) {
    document.getElementById('password').type = 'text'
  }
}

function myFunction2() {
  //document.getElementById('password').type = 'text';


  if (document.getElementById('checkbox2').checked == false) {
    document.getElementById('password2').type = 'password'
  }else if(document.getElementById('checkbox2').checked == true) {
    document.getElementById('password2').type = 'text'
  }
}
</script>