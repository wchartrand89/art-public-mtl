<?php
/**
 * Class Vue
 * Modèle de classe Vue. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.1
 * @update 2013-12-11
 * @update 2016-01-22 : Adaptation du code aux standards de codage du département de TIM
 * @license MIT
 * @license http://opensource.org/licenses/MIT
 * 
 */


class MenuAdminVue {

/**
	 * Affiche le head html
	 * @access public
	 * @return void
	 */
	public function afficheHead() {
		?>
		<!DOCTYPE html>
		<html lang="fr">
		
		<head>
		    <title>L'art public à Montréal - admin</title>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		    <meta name="description" content="">
		    <meta name="viewport" content="width=device-width">		    
		    <link rel="stylesheet" href="<?php echo BASE_URL."css/flex.css"?>" type="text/css" media="screen">
		    <link rel="stylesheet" href="<?php echo BASE_URL."css/adminmain.css"?>" type="text/css" media="screen">
			
			<link rel="stylesheet" href="../../css/reset.css" type="text/css" media="screen">
			<link rel="stylesheet" href="../../css/text.css" type="text/css" media="screen">
			<link rel="stylesheet" href="../../css/var.css" type="text/css" media="screen">
			
		    <script src="<?php echo BASE_URL."js/define.js"?>"></script>
		    <script src="<?php echo BASE_URL."js/admin.js"?>"></script>
		</head>
		<?php
		
	}

	/**
	 * Affiche entetes
	 * @access public
	 * @return void
	 */
	public function afficheEntete() {
		?>
	<body>
	    <main>
	        <header class="appbar">
	            <h1><a href="/art-public-mtl/api/admin/accueil">L'art public à Montréal (Menu Admin)</a></h1> 
	        </header>
			
		<?php
		
	}


	/**
	 * Affiche le pied de page
	 * @access public
	 * @return void
	 */
	public function affichePied() {
		?>
	
			<footer>
				Certains droits réservés @ Jonathan Martel (2019)<br>
				Sous licence Creative Commons (BY-NC 3.0)
			</footer>
		</main>
	</body>
</html>

		<?php
		
	}
	

	
	/**
	 * Affiche le menu admin
	 * @access public
	 * @return void
	 */
	public function afficheMenuAdmin() { 
		
		?>
		<section id="menuadmin">
			<h2 id="textMenuAdmin">Menu administrateur</h2>
			<div id = "fieldset">
				<fieldset>
					<legend><p id="textlegend">OEUVRES</p></legend>
						<a href="">Ajouter</a><br>
						<a href="">Modifier</a><br>
						<a href="">Supprimer</a>
				</fieldset>
				<fieldset>
					<legend><p id="textlegend">ARTISTES</p></legend>
						<a href="">Modifier</a><br>
						<a href="">Supprimer</a>
				</fieldset>
			</div>
			<div id = "fieldset">
				<fieldset>
					<legend><p id="textlegend">PARCOURS</p></legend>
						<a href="">Ajouter</a><br>
						<a href="">Modifier</a><br>
						<a href="">Supprimer</a>
				</fieldset>
				<fieldset>
					<legend><p id="textlegend">ADMINISTRATEUR</p></legend>
						<a href="">Ajouter</a><br>
						<a href="">Modifier</a><br>
						<a href="">Supprimer</a>
				</fieldset>
			</div>
		</section>    
	}		
		
		
		
	
	
	

}
