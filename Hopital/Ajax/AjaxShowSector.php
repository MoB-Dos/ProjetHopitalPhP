<?php

$sector = $_POST['sector'];

try{
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
  }

  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
  }

$reponse=$bdd->prepare('SELECT * FROM user WHERE profil = ?');
$reponse -> execute(array($sector));
$data=$reponse->fetchall();


$req = $bdd->query("SELECT idRdv,infomedecin.nom,infomedecin.prenom,date,horaire.horaire,motif 
FROM rendezvous 
INNER JOIN infomedecin ON rendezvous.idMedecin = infomedecin.idMedecin
INNER JOIN horaire ON rendezvous.idHoraire = horaire.idHoraire");
$dataRdv=$req->fetchall();

// <div class="col-sm-8"><h2>Les <b>.$value['profil'].</b></h2></div>
// <div class="col-sm-4">
// <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
// </div>

if($sector != 'rdv'){
echo '<div class="Rdv">
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                <div class="col-sm-8"><h2>Les <b>'.$sector.'</b></h2></div>';
                  if($sector == 'admin' || $sector == 'medecin')
                  {
                    echo '<div class="col-sm-4">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>';
                  }


                echo '</div>
            </div>';
echo '<table id="table1" class="table table-bordered">
    <thead>
        <tr>
            <th>Login</th>
            <th>Mail</th>
            <th>Dossier</th>
            <th>sessionId</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>';
      
              foreach ($data as $value) {
        
							echo                  
              '<tr  id="'.$value['idUser'].'">
              <td>'.$value['login'].'</td>
              <td>'.$value['mail'].'</td>
              <td>'.$value['dossier'].'</td>
              <td>'.$value['sessionId'].'</td>
              
              <td>
        
              <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
              <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
              <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
      
              </td>
              </tr>';
              }
					
	
      
echo    '</tbody>
</table>';


echo  '  </div>
</div>';


echo     
'</div>  


</div>


</div>  ';



}
else
{

            

echo '<div class="Rdv">
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Vos <b>Rendez-Vous</b></h2></div>
                </div>
            </div>
            <table id="table1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Medecin</th>
                        <th>Date</th>
                        <th>Horaire</th>
                        <th>Motif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

             
              
              
						



							foreach ($dataRdv as $value) {
        
							echo                  
              '<tr  id="'.$value['idRdv'].'">
              <td>'.$value['nom'].' '.$value['prenom'].'</td>
              <td>'.$value['date'].'</td>
              <td>'.$value['horaire'].'</td>
              <td>'.$value['motif'].'</td>
              
              <td>
                   <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
              </td>
              </tr>';
              }
					
				 
      
                echo '</tbody>
            </table>
        </div>
    </div>
    
</div>  


</div>


</div>  ';
            }



// <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
// <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
// <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
?>