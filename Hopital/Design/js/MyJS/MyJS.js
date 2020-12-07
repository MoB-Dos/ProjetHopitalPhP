  var idRow = $(this).closest('tr').attr('id');
    var currentRow=$(this).closest("tr");



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
  $(document).on("click", ".add-new", function(){
    // $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        // var rowCount = $("#table1 tr").length ;
        var key = makeid(5);

        var row = '<tr id="' + key  + '">' +
        '<td><input type="text" class="form-control" name="login" id="name"></td>' +
        '<td><input type="text" class="form-control" name="mail" id="department"></td>' +
        '<td><input type="text" class="form-control" name="dossier" id="phone"></td>' +
        '<td><input type="text" class="form-control" name="sessionId" id="sessionId"></td>' +
            '<td >' +
            '<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>'+
            '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'+
            '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>'+
            '</td>' +
        '</tr>';
    	$("table").append(row);

		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('.form-control');
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


//fonction pour générer un id 
function makeid(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}



//Fonction CRUD




$(document).on('click', ".delete", function (e) {
    e.preventDefault();



    //on récupére l'id et le type de donées a supprimer  
    var idRow = $(this).closest('tr').attr('id');
    var tyype =  document.getElementById("hiddenType").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", '/Slam2/projethopitalPHP/hopital/ajax/AjaxS.php', true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() //Appelle une fonction au changement d'état.
    {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200)
      {
        console.debug("OK");
      }
      else
      {
        console.debug("NOT OK");
       
      }
    }

    xhr.send("id="+idRow + "&type=" + encodeURI(tyype));

});

//on ajoute les informations dans la bdd
$(document).on('click', ".add", function (e) {
    e.preventDefault();


    setTimeout(() => {

      var t = document.getElementById("select1");
      var strUser = t.value;

      //on prends d'abords l'id de la ligne
      var idRow = $(this).closest('tr').attr('id');
      var currentRow=$(this).closest("tr");
    
      //puis chaque cellule 
      var child = currentRow.find("td:eq(0)").html();
      var child1 = currentRow.find("td:eq(1)").html();
      var child2 = currentRow.find("td:eq(2)").html();
      var child3 = currentRow.find("td:eq(3)").html();
  
      var xhr = new XMLHttpRequest();
  
      xhr.open("POST", '/Slam2/projethopitalPHP/hopital/ajax/AjaxUserManagement.php', true);
  
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
      //me previens si il narrive pas a joindre le fichier php
      xhr.onreadystatechange = function() //Appelle une fonction au changement d'état.
      { 
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) 
        {
      
          document.getElementById(idRow).id = this.responseText;
          $id = this.responseText;
          document.getElementById("test").html = this.responseText;
          console.debug("OK");
        }
        else
        {
          console.debug("NOT OK");
        }
      }

      // on envoie la totalité des informations  
      xhr.send("login=" + encodeURI(child) + "&mail=" + encodeURI(child1) +"&dossier="+ encodeURI(child2) +"&sessionId="+ encodeURI(child3)+"&profil="+ encodeURI(strUser) +"&id="+ encodeURI(idRow));


    }, 1000);

});




