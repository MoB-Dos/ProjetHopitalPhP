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

<script>

function Hello(intValue){

console.debug(intValue);

}


</script>
</head>
<body>
<?php  
try{
    $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}

catch(Exception $e){
die('Erreur:'.$e->getMessage());
}

$reponse=$bdd->query('SELECT * FROM tableau');
$data=$reponse->fetch();


if(isset($data))
{
    
echo $data['id'];
}else{
    echo "stop";
}
?>


<button   id="<?php echo $data['id']; ?>" type="button" onclick="Hello(this.id)"> Supprimer</button>
   
</body>
</html>