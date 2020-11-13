<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	
    <?php  require_once('../../Tools/linkCSS.html') ?>
    
  	<!-- START nav -->
  	<?php  require_once('../../Tools/NavBar.php') ?>
    <!-- END nav -->

  </head>
  <body>

  <!-- <div class="hero-wrap" style="background-image: url('../../Design/images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters align-items-center justify-content-center" data-scrollax-parent="true">
          
          <h1 class="display-4">Fluid jumbotron</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
          
        </div>
      </div>
 </div> -->

 <div class="jumbotron jumbotron-fluid"  style="background-image: url('../../Design/images/bg_6.jpg'); background-attachment:fixed;">
 <div class="overlay"></div>
 
  <div class="container">
      <div class="row  no-gutters align-items-center justify-content-center" data-scrollax-parent="true">
    <h1 class="display-4">Mes RENDEZ-VOUS</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
  </div>
  </div>
</div>




<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Vos <b>Rendez-Vous</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table id="table1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Couleur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                <?php
							// on se connecte à notre base
							try
							{
							$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
							}
							catch(Exception $e)
							{
							  die('Erreur:'.$e->getMessage());
							}

							// lancement de la requête. on sélectionne les news que l'on va ordonner suivant l'ordre "inverse" des dates (de la plus récente à la plus vieille : DESC) tout en ne sélectionnant que le nombre voulu de news à afficher (LIMIT)
							$req = $bdd->query("SELECT * FROM rendezvous");
							

							$data=$req->fetchall();




							if(isset($data))
							{


							foreach ($data as $value) {
        
							echo                  
                                '<tr  id="'.$value['id'].'">
                                <td>'.$value['nom'].'</td>
                                <td>'.$value['prenom'].'</td>
                                <td>'.$value['couleur'].'</td>
                                
                                <td>
                                     <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                     <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                     <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                                </tr>';
							}
							}else {

								echo "pas de rdv";

							}

				?>
      
                </tbody>
            </table>
        </div>
    </div>
</div>  
 




    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	
  <?php  require_once('../../Tools/linkJS.html') ?>
    
  </body>    
  
  <!--START footer-->
    <?php  require_once('../../Tools/Footer.php') ?>
  <!--END footer-->

</html>