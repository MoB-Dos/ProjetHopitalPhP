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
   // <div class="col-sm-4">
                    //     <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    // </div>

echo '<div class="Rdv">
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">';



echo '<div class="col-sm-8"><b>Les User</b></div>
                 
                </div>
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



// <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
// <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
// <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
?>