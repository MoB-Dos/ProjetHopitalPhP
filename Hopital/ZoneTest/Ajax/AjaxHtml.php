
<!DOCTYPE html>
<html>
<head>
<script>






function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","Ajax.php?q="+str,true);
  xmlhttp.send();
}



function DelUser(intValue){

  console.debug(intValue)

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
xhr.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
xhr.send("test="+intValue);


}

</script>
</head>
<body>

<form>
  <select  id="user" name="users" onchange="showUser(this.value)">
    <option value="0" selected disabled>choissisez votre Secteur</option>
      <?php

        
        try{
          $bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');
        }

        catch(Exception $e){
        die('Erreur:'.$e->getMessage());
        }

      $reponse=$bdd->query('SELECT id,nom FROM tableau');
      $donne=$reponse->fetchall();
      foreach ($donne as $value) {
        echo '<option value='.$value['id'].'>'.$value['nom'].'</option>';
      }

      ?>

  </select>

</form>

<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

<div ><button 
    type="button" onclick="DelUser(<?php $value['id']?>)">
Supprimer</button></div>

</body>
</html>
