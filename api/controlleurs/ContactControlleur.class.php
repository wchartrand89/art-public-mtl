<?php
/**
 * Controlleur de la ressource Contact
 * 
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2016-11-25
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 */
 
 /*
 * 
 *
 */

 
 
class ContactControlleur extends Controlleur 
{
	
	// GET : 
	// 		/contact/ - Contact
	
	
	public function getAction(Requete $requete)
	{
		$oVue = new Vue();
        $oVue->afficheEntete("contact");	
        $oVue->afficheContact();
        $oVue->affichePied();
	}
	
}
?>