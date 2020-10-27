<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Creating Custom Template for Bootstrap 4 Tooltips</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
<link rel="stylesheet" href="../css/MyCSS/MyCss.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>
$(document).ready(function(){
    $("#myTooltips a").tooltip({
        
        template : '<div class="tooltip tooltip-custom"> <div class="title"></div> <div class="tooltip-arrow"> </div> <div class="tooltip-head">  <h6> <i class="fas fa-exclamation-triangle"> </i> <span> Dossier Manquant </span> </h6> </div> </div>'
    });
});
</script>

</head>
<body>
<div class="bs-example"> 
    <div id="myTooltips">
        
        <a href="#" data-toggle="tooltip" data-placement="right" title="Cliquez ici pour Créer votre dossier "><i class="fas fa-exclamation-triangle"> </i></a>
        
    </div>
</div>
</body>   
</html>