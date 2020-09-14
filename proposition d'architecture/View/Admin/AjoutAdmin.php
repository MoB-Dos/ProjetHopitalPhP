
<form action="../../Traitement/Admin/AjoutAdminT.php" method="post">
    
                <select name="login" required>
						<option value="0" selected disabled >choissisez un nouvelle Admin !</option>
						<?php
						try{
                        $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
						}

						catch(Exception $e){
							die('Erreur:'.$e->getMessage());
						}

						$reponse=$bdd->query('SELECT login FROM user WHERE Admin = 0');
						$data=$reponse->fetchall();
						foreach ($data as $value) {
							echo '<option>'.$value['login'].'</option>';
						}

                        ?>
                </select>
                
                
           

            <button type="submit" value="submit" >Ajout !</button>
</form>


<input type="submit" value="retour" onclick="window.location='../../ndex.php';" />   