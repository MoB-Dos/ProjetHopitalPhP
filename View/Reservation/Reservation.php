<body>
<head>


</head>
<form action="../../../Traitement/Reservation/ReservationT.php" method="post">

  <?php

  session_start ();

  if(isset($_SESSION['login']))
  {
    
    echo $_SESSION['login'].'<br></br>';

  }else{
    echo "pas connecter".'<br></br>';
  }
    
  
    $today =  date("Y/m/d") ;
  ?>

  <!--<input type="number" class="form-control" id="place" name="place" placeholder="Entrer le nombre de Place " required  ><br></br>-->

    <input type="number" name="NbmPlace" onchange="myFunction()"  id="mySelect4"  min=0  /> tarif etudiant <br></br>

    <input type="date" class="form-control" id="$date" name="date" placeholder="Entrer la Date ptdr " min=<?php $today ?>  required > (date) <br></br>


   Quelle film voulez-vous visionez dans notre cinéma ?<br/>
   <select name="film" >
	 <?php
      try
      {
	    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
	    }
      catch(Exception $e)
      {
		  die('Erreur:'.$e->getMessage());
	    }            

	   $reponse=$bdd->query('SELECT film FROM film ');
	   $donne=$reponse->fetchall();
    
     foreach ($donne as $value) 
     {
		   echo '<option>'.$value['film'].'</option>';
	   }          

	  ?>
   </select><br><br>


   <select name="heure" id="heureSelect">
    <option value="">--choisissez une heure--</option>
    <option value="10h">10h</option>
    <option value="12h">12h</option>
    <option value="15h">15h</option>
    <option value="21h">21h</option>
    <option value="24h">24h</option>
    </select><br></br>






   
   <script>
    
    function myFunction() 
    {

    var a = document.getElementById("mySelect").value;
    var b = document.getElementById("mySelect1").value;
    var c = document.getElementById("mySelect2").value;
    var d = document.getElementById("mySelect3").value;

    var f = document.getElementById("mySelect4").value;

    var e = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d);

    test(e,f)

    

    }


    function test(e,f)
    {
      

      if(parseInt(e) == parseInt(f) )
    {
      
     
      
      document.getElementById("submit").type = "submit"; 
      document.getElementById("demo3").innerHTML = "";


    }else
    {

      document.getElementById("demo3").innerHTML = "les comptes ne sont pas bon ou il manque des 0 ";
    
    }

    }
   
   </script>




   
   Nombre de Reduction : <br/>
  <input type="number" name="etudiant" onchange="myFunction()"  id="mySelect"  min=0  /> tarif etudiant <br />
  <input type="number" name="enfant" onchange="myFunction()"  id="mySelect1" min=0  /> tarif enfant<br />
  <input type="number" name="navigo" onchange="myFunction()"  id="mySelect2" min=0  /> navigo<br />
  <input type="number" name="normal" onchange="myFunction()"  id="mySelect3" min=0  /> rien<br /></br>

 

  <p id="demo3"></p>

  
  <input type="hidden" id="submit" value="submit" ><br></br>

  

</form>



</body>
