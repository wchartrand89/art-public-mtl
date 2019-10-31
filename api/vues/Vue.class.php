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


class Vue {
	/**
	 * Affiche entetes
	 * @access public
	 * @return void
	 */
	public function afficheEntete($page) {
		require("entetepied/entete.html.php");
	}


	/**
	 * Affiche le pied de page
	 * @access public
	 * @return void
	 */
	public function affichePied() {
		
		require("entetepied/pied.html.php");

		
	}
	

	/**
	 * Affiche la page d'accueil
	 * @access public
	 * @return void
	 */
	public function afficheAccueil() {
		require("accueil/accueil.html.php");
		
	}
	
	/**
	 * Affiche la liste des oeuvres
	 * @access public
	 * @return void
	 */
	public function afficheOeuvres($aData = Array(), $aTypes= Array(), $aArrond=Array(), $aDates=Array()) {
		// require("oeuvre/AfficheFiltreMesOeuvres.html.php");
		require ("oeuvre/AfficheOeuvres.html.php"); 
		
	}
    
	public function afficheCarte($aData = Array()) {
		
		require  ("oeuvre/AfficheCarte.html.php"); 
		
	}



	/**
	 * Affiche l'oeuvre
	 * @access public
	 * @return void
	 */
	public function afficheOeuvre($aData = Array()) {
		
		require  ("oeuvre/AfficheOeuvre.html.php"); 
		
	}



	
	/**
	 * Affiche la liste des artistes
	 * @access public
	 * @return void
	 */
	public function afficheArtistes($aData = Array()) {
		require  ("artistes/AfficheArtistes.html.php"); 
						
	}


/**
	 * Affiche le détails d'un artiste
	 * @access public
	 * @return void
	 */
	public function afficheArtiste($aData = Array()) {
		extract($aData);
	
        require  ("artistes/AfficheArtiste.html.php"); 
			
		
	}

	/**
	 * Affiche la page À propos
	 * @access public
	 * @return void
	 */
	public function afficheAPropos() {
		
		require("apropos/apropos.html.php");		
	}

	/**
	 * Affiche la page Contact
	 * @access public
	 * @return void
	 */
	public function afficheContact($message) {
		require("contact/contact.html.php");
	}
    
    /**
	 * Affiche la page de connexion User
	 * @access public
	 * @return void
	 */
	public function afficheConnexion() {
		require("accueil/connexion.html.php");
		
	}    
    
    /**
	 * Affiche la page d'inscription User
	 * @access public
	 * @return void
	 */
	public function afficheInscription() {
		require("accueil/inscription.html.php");
	}

    
        /**
	 * Affiche la page de monCompte User
	 * @access public
	 * @return void
	 */
	public function afficheMonCompte($mail) {
		
		require("accueil/monCompte.html.php");
		
	}
	
}
?>