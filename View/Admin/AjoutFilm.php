

<form  action="../../Traitement/Admin/AjoutFilmT.php" method="post" enctype="multipart/form-data">

<input type="text"  id="nom" name="nom" placeholder="nom du film" required /> </br> </br>

<input type="message" id="description" name="synopsis" placeholder="description du film" required /> </br> </br>

<input type="text"  id="salle" name="salle" placeholder="salle du film" required /> </br> </br>

<input type="text"  id="salle" name="date" placeholder="date de sortie" required /> </br> </br>

<input type="file"  id="photo" name="photo" placeholder="Affiche" accept="image/*" required /> </br> </br>


<button class="primary-btn text-uppercase">Insertion !</button>
</form>

<input type="submit" value="retour" onclick="window.location='../../ndex.php';" />     
