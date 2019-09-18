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


class AdminVue {

/**
	 * Affiche le head html
	 * @access public
	 * @return void
	 */
	public function afficheEntete() {
        require("entetepied/enteteAdmin.html.php");
		
	}

	/**
	 * Affiche entetes
	 * @access public
	 * @return void
	 */


	/**
	 * Affiche le pied de page
	 * @access public
	 * @return void
	 */
	public function affichePied() {
 
		require("entetepied/piedAdmin.html.php");
	}
	

	
	/**
	 * Affiche la liste des oeuvres
	 * @access public
	 * @return void
	 */
	public function afficheOeuvres($aData = Array()) {
		
require("admin/AfficheOeuvres.html.php");
		
	}
    /**
	 * Affiche une oeuvre
	 * @access public
	 * @return void
	 */
	public function afficheOeuvre($aData = Array()) {
		
		require("admin/AfficheOeuvre.html.php");
		
	}
    
	public function afficheConnexion() {
		
        require("admin/Connexion.html.php");
		
	}
    
    
    public function afficheFormulaireModification() {
		
	require("admin/FormulaireModification.html.php");
		
	}
    
	public function afficheDeconnection() {
		
		?>

            <form id='deconnection' action="?controller=deconnection&action=deconnectionPost" method="post">	
                <div>
                    <input type="submit" id="envoyer" value="Déconnection">
                </div>		
            </form>
			
		<?php
		
	}
	
	public function afficheMenuAdmin() { //location temporaire
		
		require("admin/MenuAdmin.html.php");
		
	}

}
?>