
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
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','hopitalphp');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM tableau WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Actions</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td id='name'>" . $row['nom'] . "</td>";
  echo "<td>" . $row['prenom'] . "</td>";
  echo "<td>" . $row['couleur'] . "</td>";
  echo "<td> <button  type='button' onclick='DelUser('10')'> Supprimer</button>  </td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 