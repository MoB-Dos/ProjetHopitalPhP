<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  
	
    <?php require_once('../../Tools/linkCSS.php') ?>
    
  	<!-- START nav -->
  	<?php  require_once('../../Tools/NavBar.php') ?>
    <!-- END nav -->

  </head>
  <body>

<?php

try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}

$reponse=$bdd->prepare('SELECT idUser FROM user WHERE sessionId = ?');
$reponse->execute(array($_SESSION['sessionId'])); 
$dataId=$reponse->fetch();
  

$req = $bdd->prepare("SELECT idRdv,infomedecin.nom,infomedecin.prenom,date,horaire.horaire,motif 
FROM rendezvous 
INNER JOIN infomedecin ON rendezvous.idMedecin = infomedecin.idMedecin
INNER JOIN horaire ON rendezvous.idHoraire = horaire.idHoraire WHERE idUser = ?");
$req->execute(array($dataId[0])); 

$data=$req->fetchall();

?>

<script>

function SectorChange(sector)
{
    console.debug(sector);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", '/projethopitalPHP/hopital/ajax/AjaxShowSector.php', true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() //Appelle une fonction au changement d'état.
    { 
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) 
      {
        console.debug("OK");
        document.getElementById("idSector").innerHTML=this.responseText;
      }
      else
      {
        console.debug("NOT OK");
      }
    }
    
    xhr.send("sector="+sector);

}

$(document).on('click', ".add", function (e) {
    e.preventDefault();
  

    var e = document.getElementById("idSector");
    var strUser = e.value;
    console.debug(strUser);

    var idRow = $(this).closest('tr').attr('id');
    var currentRow=$(this).closest("tr");
    console.debug(idRow);
    
    var child = currentRow.find("td:eq(0)").html();
    var child1 = currentRow.find("td:eq(1)").html();
    var child2 = currentRow.find("td:eq(2)").html();
    var child3 = currentRow.find("td:eq(3)").html();
    
    console.debug(child);
    console.debug(child1);
    console.debug(child2);
    console.debug(child3);


    var xhr = new XMLHttpRequest();

    xhr.open("POST", '/projethopitalPHP/hopital/ajax/AjaxUserManagement.php', true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    //me previens si il narrive pas a joindre le fichier php
    xhr.onreadystatechange = function() //Appelle une fonction au changement d'état.
    { 
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) 
      {
    
        document.getElementById(idRow).id = this.responseText;
        $id = this.responseText;
        console.debug("OK");
        // $(this).closest('tr').attr('id') = this.responseText;
        
      }
      else
      {
        console.debug("NOT OK");
      }
    }


    xhr.send("login=" + encodeURI(child2) + "&mail=" + encodeURI(child) +"&dossier="+ encodeURI(child1) +"&sessionId="+ encodeURI(child3)+"&profil="+ encodeURI(strUSer) +"&id="+ encodeURI(idRow));


});
 

</script>


<div class="SelectUser">
<select onchange="SectorChange(this.value)" id="select1">
<option value="0" selected disabled >--Choisir un Profil--</option>
<option value="user" >Patient</option>
<option value="admin">Admin</option>
<option value="medecin">Medecin</option>
<option value="rdv">Voir les rendez-vous</option>
</select>
</div>






<div id="idSector" class="noUser">
  <b>...</b><br>
</div>

  <!-- loader -->


 <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	
  <?php require_once('../../Tools/linkJS.php') ?>
    
  </body>    
  
  <!--START footer-->
    <?php  require_once('../../Tools/Footer.php') ?>
  <!--END footer-->

</html>

