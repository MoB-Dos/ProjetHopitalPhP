
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>



<script>


// function DelUser(intValue){

// var xhr = new XMLHttpRequest();
// xhr.open("POST", 'AjaxS.php', true);

// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// xhr.onreadystatechange = function() { //Appelle une fonction au changement d'état.
//   if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
//     console.debug("OK");
//   }else{
//     console.debug("NOT OK");
//   }
// }
// xhr.onreadystatechange=function() {
//   if (this.readyState==4 && this.status==200) {
//     document.getElementById("txtHint").innerHTML=this.responseText;
//   }
// }
// xhr.send("test="+intValue);


// }

</script>


</head>

<body>

<?php
$q = $_GET['q'];

try
{
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}


//On select les données pour voir si elle existe déja 
$req=$bdd->prepare('SELECT id FROM tableau WHERE nom= ?');
$req->execute(array($q));
$data = $req->fetch();

$id_nouveau = $bdd->lastInsertId();
echo $id_nouveau;
echo $data[0];
echo ' ';

echo ' ';
echo $q;


?>
</body>
</html> 