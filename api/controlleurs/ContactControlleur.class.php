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
		$message = null;
		if($_GET["update"] == "succes") {
			$message = "Votre commentaire a été bien sauvegardé";
		} else if($_GET["update"] == "error") {
			$message = "Votre commentaire n'a pas été sauvegardé";
		}
		$oVue = new Vue();
        $oVue->afficheEntete("contact");	
        $oVue->afficheContact($message);
        $oVue->affichePied();
	}

	public function postAction() {
		if(!empty($_POST)) {
			$oContact = new Contact();
			$resAjoutContact = $oContact->ajoutContact($_POST);
			if($resAjoutContact) {
				header("Location:/art-public-mtl/api/contact?update=succes");
			} else {
				header("Location:/art-public-mtl/api/contact?update=error");
			}
		} else {
			header("Location:/art-public-mtl/api/contact?update=error");
			die;
		}
	}
	
}
?>