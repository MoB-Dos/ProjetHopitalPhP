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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>

        // if (dateText=="") 
        // {
        //   document.getElementById("txtHint").innerHTML="";
        // return;
        // }
        // var xmlhttp=new XMLHttpRequest();
        // xmlhttp.onreadystatechange=function() {
        // if (this.readyState==4 && this.status==200) {
        //   document.getElementById("txtHint").innerHTML=this.responseText;
        // }
        // }
        // xmlhttp.open("GET","AjaxTest.php?q="+dateText,true);
        // xmlhttp.send();


function date(str)
{
console.log(str);
}

function showUser(str) {
  console.log(str);
  if (str=="") 
  {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() 
  {
    if (this.readyState==4 && this.status==200) 
    {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","AjaxTest.php?q="+str,true);
  xmlhttp.send();
}



</script>
</head>
<body>

<form action="/Slam2/ProjethopitalPHP/Hopital/Traitement/RendezVous/rendezvousT.php" method="post">


<input type="Date" onchange="showUser(this.value)" id="date" name="date"  min="2018-01-01" max="2021-12-31" required >

</form>

<div  id="txtHint"><b>Person info will be listed here.</b></div>


   
</body>
</html>