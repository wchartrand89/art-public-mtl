<!DOCTYPE html>
<html lang="fr">
    
    <?php
        $document = cookie();
        $text_lang = $document->getElementById("lang")->nodeValue;
        $text_titre2 = $document->getElementById("titre2")->nodeValue;
        $text_menu_oeuvres = $document->getElementById("menu_oeuvres")->nodeValue;
        $text_menu_artistes = $document->getElementById("menu_artistes")->nodeValue;
        $text_menu_parcours = $document->getElementById("menu_parcours")->nodeValue;
        $text_menu_apropos = $document->getElementById("menu_apropos")->nodeValue;
        $text_menu_contact = $document->getElementById("menu_contact")->nodeValue;
        $text_menu_compte = $document->getElementById("menu_compte")->nodeValue;

    ?>

<head>
	<title><?php echo $text_titre2 ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Pacifico&display=swap" rel="stylesheet">

	
	<?php
//    echo "page = ".$page."!";
		if ($page== ""){
			
			cssBase("");
			echo '<link rel="stylesheet" href="../css/home.css" type="text/css" media="screen">';
			echo '<link rel="stylesheet" href="../css/slider.css" type="text/css" media="screen">';
			echo '<script src="../js/slider.js"></script>';
			jsBase("");
		} 
		else if ($page== "artistes"){
			cssBase("artistes");
			echo '<link rel="stylesheet" href="../css/artistes.css" type="text/css" media="screen">';
			jsBase("artistes");
			echo '<script src="../js/liste.js"></script>';
		} 
		else if ($page== "artiste"){
			cssBase("artiste");
			echo '<link rel="stylesheet" href="../../css/artiste.css" type="text/css" media="screen">';
			echo '<link rel="stylesheet" href="../../css/slider.css" type="text/css" media="screen">';
			jsBase("artiste");
			echo '<script src="../../js/slider.js"></script>';
			echo '<script src="../../js/imgOeuvre.js"></script>';
			
		}  
		else if ($page== "oeuvres"){
			cssBase("oeuvres");
			echo '<link rel="stylesheet" href="../css/oeuvres.css" type="text/css" media="screen">';
			echo '<link rel="stylesheet" href="../css/liste.css" type="text/css" media="screen">';
			echo '<link rel="stylesheet" href="../css/sliderDate.css" type="text/css" media="screen">';
			jsBase("oeuvres");
			echo '<script src="../js/imgOeuvre.js"></script>';
			echo '<script src="../js/filtres.js"></script>';
			echo '<script src = "../js/choixAffichage.js"></script>';
			echo '<script src="../js/liste.js"></script>';
			echo '<script src="../js/sliderDate.js"></script>';
			echo '<script src="../js/favoris.js"></script>';
			echo '<script src="../js/aVisiter.js"></script>';
			echo '    <script src = "../js/favorisCarte.js"></script>';
			
		} 
		else if ($page== "oeuvre"){
			cssBase("oeuvre");
			echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
			echo '<link rel="stylesheet" href="../../css/oeuvres.css" type="text/css" media="screen">';
			echo '<script src="../../js/onglets.js"></script>';
			echo '<script src="../../js/imgOeuvre.js"></script>';
			echo '<script src="../../js/carteOeuvre.js"></script>';
			jsBase("oeuvre");
		} 
		else if ($page== "apropos"){
			cssBase("apropos");
			echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
			echo '<script src="../js/onglets.js"></script>';
			echo '<script src="../js/accordeon.js"></script>';
			jsBase("apropos");
		} 
		else if ($page== "contact"){
			cssBase("contact");
			echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
			echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
			echo '<script src="../js/onglets.js"></script>';
			jsBase("contact");
		} 
        else if ($page== "compte"){
			cssBase("compte");
			echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
			echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
			echo '<link rel="stylesheet" href="../css/monCompte.css">';
			echo '<script src="../js/validationForm.js"></script>';
			jsBase("compte");
		} 
        else if ($page== "connexionCompte"){
			cssBase("compte");
			echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
			echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
			echo '<link rel="stylesheet" href="../css/monCompte.css">';
			//echo '<script src="../js/validationForm.js"></script>';
			jsBase("compte");
		} 
        else if ($page== "inscription" || $page =="connexion"){
			cssBase("inscription");
			echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
			echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
			// echo '<link rel="stylesheet" href="../css/inscription.css">';
			echo '<link rel="stylesheet" href="../../css/monCompte.css">';
			//echo '<script src="../../js/validationFormIns.js"></script>';
			jsBase("inscription");
		} 
		
	
		function cssBase($page){
			$chemin = "";
			if($page == "artiste" || $page == "oeuvre" || $page == "inscription"|| $page == "compte" || $page == "connexion" ) {
				$chemin = "../";
			}
			?>
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<link rel="stylesheet" href="<?php echo $chemin;?>../css/reset.css" type="text/css" media="screen">
			<link rel="stylesheet" href="<?php echo $chemin;?>../css/var.css" type="text/css" media="screen">
			<link rel="stylesheet" href="<?php echo $chemin;?>../css/header.css" type="text/css" media="screen">
			<link rel="stylesheet" href="<?php echo $chemin;?>../css/footer.css" type="text/css" media="screen">
			<link rel="stylesheet" href="<?php echo $chemin;?>../css/text.css" type="text/css" media="screen">
			<link rel="stylesheet" href="<?php echo $chemin;?>../css/component.css" type="text/css" media="screen">
			<link rel="stylesheet" href="<?php echo $chemin;?>../css/flex.css" type="text/css" media="screen">
			<link rel="stylesheet" href="<?php echo $chemin;?>../css/main.css" type="text/css" media="screen">
			<?php
		}
		function jsBase($page){
			$chemin = "";
			if($page == "artiste" || $page == "oeuvre" || $page== "inscription" || $page =="connexion") {
				$chemin = "../";
			}
			?>
				<script src="<?php echo $chemin;?>../js/main.js"></script>
				<script src="<?php echo $chemin;?>../js/menu.js"></script>
			<?php
		}
	?>

</head>
<body>
	<header class="appbar">

		<a class="logo" href="/art-public-mtl/api/"><img src="<?php if($page == "artiste" || $page == "oeuvre" || $page == "inscription" || $page =="connexion"){echo "../";}?>../img/icons/logoAP.png" alt="Logo Art public Montréal"></a>
		
		<nav class="menu">
			
			<a class="lien" href="/art-public-mtl/api/oeuvre">
			<i class="material-icons">photo</i>
				<p><?php echo $text_menu_oeuvres; ?></p>
			</a>
			<a class="lien" href="/art-public-mtl/api/artiste">
			<i class="material-icons">palette</i>
				<p><?php echo $text_menu_artistes; ?></p>
			</a>
			<a class="lien" href="#">
			<i class="material-icons">directions</i>
				<p><?php echo $text_menu_parcours; ?></p>
			</a>
			<a class="lien" href="/art-public-mtl/api/apropos">
			<i class="material-icons">info</i>
				<p><?php echo $text_menu_apropos; ?></p>
			</a>
			<a class="lien" href="/art-public-mtl/api/contact">
			<i class="material-icons">mail</i>
				<p><?php echo $text_menu_contact; ?></p>
			</a>
			<a class="lien" href="/art-public-mtl/api/compte">
			<i class="material-icons">person</i>
				<p>4</p>
			</a>
		</nav>	
		<div class="icons">
			<a class="search" href="#">
				<i class="material-icons">search</i>
			</a>
			<a class="langue hidden" href="?lang=<?php echo $text_lang;?>"><?php echo $text_lang; ?></a>
			<a class="menuCubes" href="#">
				<img src="<?php if($page == "artiste" || $page == "oeuvre" || $page == "inscription"){echo "../";}?>../img/icons/menu.svg" alt="Icone d'ouverture du menu">
				</a>
			<a class="fermerMenu hidden" href="#">
				<i class="material-icons">close</i></a>
			<a class="compte" href="/art-public-mtl/api/compte">
			<i class="material-icons">person</i>
			</a>
		</div>
	</header>
	<main>