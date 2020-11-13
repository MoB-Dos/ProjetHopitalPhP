<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	//var actions = $("table td:last-child").html();
    var rowCount = $("#table1 tr").length - 1; 
    
    var actions = '<td id="' + rowCount  + '">' +
    '<a class="add"  id ="5" onclick="setTimeout(Add.bind(null,this.id), 3000)" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+
    '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+
    '<a class="delete" id ="5" onclick="DelUser(this.id)" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>'+
     '</td>';


	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        // var rowCount = $("#table1 tr").length ; 
        var key = "KLPMEEN";
      
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
            '<td id="' + key  + '">' +
                '<a class="add"  id ="5" onclick="setTimeout(Add.bind(null,this.parentElement.id), 3000)" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+
                '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+
                '<a class="delete" id ="5" onclick="DelUser(this.id)" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>'+
            '</td>' +
        '</tr>';
    	$("table").append(row);	
	
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});



function Add(idUser)
{

//calcul nombre de ligne & déclaration du tableau 
var rowCount = $("#table1 tr").length - 1; 
var table = document.getElementById("table1");



var id = idUser;

console.debug(idUser);

var nom = table.rows[rowCount].cells[0].innerHTML;

var prenom = table.rows[rowCount].cells[1].innerHTML;

var couleur = table.rows[rowCount].cells[2].innerHTML;



//j'envoie mes info a mon fichier php
var xhr = new XMLHttpRequest();

xhr.open("POST", 'AjaxA&U.php', true);

xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//me previens si il narrive pas a joindre le fichier php
xhr.onreadystatechange = function() { //Appelle une fonction au changement d'état.
  if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
    console.debug("OK");
  }else{
    console.debug("NOT OK");
  }
}


xhr.send("couleur=" + encodeURI(couleur) + "&nom=" + encodeURI(nom) +"&prenom="+ encodeURI(prenom) +"&id="+ encodeURI(id));

}


function DelUser(intValue){


var xhr = new XMLHttpRequest();
xhr.open("POST", 'AjaxS.php', true);

xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xhr.onreadystatechange = function() { //Appelle une fonction au changement d'état.
  if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
    console.debug("OK");
  }else{
    console.debug("NOT OK");
  }
}
xhr.send("test="+intValue);


}
 





</script>
</head>
<body>
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
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
							$req = $bdd->query("SELECT * FROM tableau");
							

							$data=$req->fetchall();




							if(isset($data))
							{


							foreach ($data as $value) {
        
							echo                  
                                '<tr>
                                <td>'.$value['nom'].'</td>
                                <td>'.$value['prenom'].'</td>
                                <td>'.$value['couleur'].'</td>
                                
                                <td id="'.$value['id'].'">
                                     <a class="add" id="'.$value['id'].'" onclick="setTimeout(Add.bind(null,this.parentElement.id), 3000)" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                     <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                     <a class="delete" id="'.$value['id'].'" onclick="DelUser(this.id)" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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

</body>
</html>