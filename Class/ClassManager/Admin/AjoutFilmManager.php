<?php


class AjoutFilmManager
{

public function AjoutImage($nametrue)
{

	//avec cette fonction on sauvegarde limage dans un fichier pour pouvoir la recuperer plus tard 
$dossier = "../../Image/Affiche";
$nomdufichier = $nametrue;

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['photo']['size'] <= 3145728)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['photo']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                $name = basename($_FILES['photo']['name']);
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['photo']['tmp_name'], "$dossier/$nomdufichier.$extension_upload");
                        echo "L'envoi a bien été effectué !";
                }
                else
                {
                    echo 'extention non-autorisee';
                }
        }
        else
        {
            echo 'image trop grosse';
		}
		
	//la gestion des autres erreur possible 	
}
elseif (isset($_FILES['photo']) AND $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE)
{
    echo 'fichier inexistant';
}
elseif (isset($_FILES['photo']) AND $_FILES['photo']['error'] == UPLOAD_ERR_PARTIAL)
{
    echo 'fichier uploadé que partiellement';
}
elseif (isset($_FILES['photo']) AND $_FILES['photo']['error'] == UPLOAD_ERR_INI_SIZE)
{
    echo 'fichier trop gros';
}
elseif (isset($_FILES['photo']) AND $_FILES['photo']['error'] == UPLOAD_ERR_FORM_SIZE)
{
    echo 'fichier trop gros';
}
elseif (!isset($_FILES['photo']))
{
    echo 'pas de variable';
}
else
{
    echo 'probleme a l\'envoi';
}


}

public function AjoutPage($nametrue,$Synopsis,$Date)
{

	//dans cette fonction on va créer une nouvelle page dans un dossier spécifique 
	
    $film = $nametrue;
    $direction = "../../template/EndGam/HTML/Film/Page".$film.".php";
	$page = "'Page".$film.".php'";
	

	try
    {
    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
    }
    catch(Exception $e)
    {
      die('Erreur:'.$e->getMessage());
    }

    //Sélection des données dans la table utilisateur


	$req = $bdd->prepare('SELECT image from film WHERE film =?');
    $req -> execute(array($film));
	
	$data=$req->fetch();

	$image=$data[0];


    // 1 : on ouvre le fichier
    $monfichier = fopen($direction, 'c+');
    
    // 2 : on fera ici nos opérations sur le fichier...
    $ligne = fgets($monfichier);
	
	
	//le modele de la page est totalement ecrit a l'interieur 
    fputs($monfichier, 

'
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>EndGam - Gaming Magazine Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="../img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/slicknav.min.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="../css/magnific-popup.css"/>
	<link rel="stylesheet" href="../css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="../css/style.css"/>

	<?php
	require "../../../../Class/ClassManager/Comment/CommentManager.php";
	require "../../../../Class/SetUp/SetUpComment.php";
	?>


</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<?php  require_once("../NavBar.php") ?>
	<!-- Header section end -->

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="../img/page-top-bg/1.jpg">
		<div class="page-info">
			<h2>'.$film.'</h2>
			<div class="site-breadcrumb">
			<a href="../home.php"> Home</a>  /
			<a href="../films.php"><span href="../films.php" > autre Films</span></a>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Games section -->
	<section class="games-single-page">
		<div class="container">
			<div class="game-single-preview">
				<img src="'.$image.'">
			</div>
			<div class="row">
				<div class="col-xl-9 col-lg-8 col-md-7 game-single-content">
					<h2 class="gs-title">'.$film.'</h2>
					<h4>Synopsis : </h4>
					<p>'.$Synopsis.'</p>

					<h4>date de sortie : </h4>
					<p>'.$Date.'</p>

					
					
					
					
					<div class="geme-social-share pt-5 d-flex">
						<p>Share:</p>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>


				<div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
					<div id="stickySidebar">
						<div class="widget-item">
							<div class="rating-widget">
								<h4 class="widget-title">Lavis des Utilisateur</h4>
								<ul>

								<?Php 

								$film = "'.$film.'";

								$show= new CommentManager();
								
								
								$act = $show->CommentAff($film); 
								
								?>
								
								</ul>
								
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Games end-->




	<!-- Newsletter section -->
	<section class="newsletter-section">
		<div class="container">
			<h2>Sinscrire à notre newsletter</h2>
			<form class="newsletter-form">
				<input type="text" placeholder="Entrer votre mail">
				<button class="site-btn">sinscrire  <img src="img/icons/double-arrow.png" alt="#"/></button>
			</form>
		</div>
	</section>
	<!-- Newsletter section end -->


	<!-- Footer section -->
	<?php  require_once("../Footer.php") ?>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.slicknav.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.sticky-sidebar.min.js"></script>
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/main.js"></script>

	</body>
	</html>
'
    
    );
    fclose($monfichier);

 


}


public function AjoutBDD($nametrue,$Synopsis,$Date) 
{

	//dans cette fonction on ajoute simplement l'image, le lien de la page et les info sur le film dans la bdd pour laffichage 
    
    $lien = "http://localhost/projetcinemaphp/template/EndGam/HTML/Film/Page$nametrue.php";
    $image = "http://localhost/projetcinemaphp/Image/Affiche/$nametrue.jpg";


    try
    {
    $bdd= new PDO('mysql:host=localhost;dbname=cinemaphp;charset=utf8','root','');
    }
    catch(Exception $e)
    {
      die('Erreur:'.$e->getMessage());
    }

    //Sélection des données dans la table utilisateur
  
    $req = $bdd->prepare('INSERT INTO film (film,image, lien,synopsis,date) VALUES (?,?,?,?,?)');
    $req -> execute(array($nametrue,$image, $lien,$Synopsis,$Date));


}


}



?>