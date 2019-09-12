<?php
/**
 * Class OeuvreAdminControlleur
 * Gère les requêtes HTTP de l'admin
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-08-12
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 */
 
 /*
 * TODO : Commenter selon les standards du département.
 *
 */

 
 
class AdminControlleur extends Controlleur 
{
	
	public function getAction(Requete $requete)
	{
		$res = array();
//		var_dump($requete->url_elements);
		if(isset($requete->url_elements[0]) && $requete->url_elements[0]=='menu')	// Normalement l'id de l'artiste 
		{
            echo 'MENU ADMIN';
            $oVue = new AdminVue();
    		$oVue->afficheHead();
    		$oVue->afficheEntete();
    		$oVue->affichePied();
        } 
        else if(isset($requete->url_elements[0]) && $requete->url_elements[0]=='')	// Normalement l'id de l'artiste 
		{
            echo 'ACCUEIL ADMIN';
            $oVue = new AdminVue();
    		$oVue->afficheHead();
    		$oVue->afficheEntete();
            $oVue->afficheConnexion();	
    		$oVue->affichePied();
        } 
        else if(isset($requete->url_elements[0])){
//            var_dump($requete);
            echo 'PAGE ADMIN NON EXISTANTE';
        }
        else 	// Accueil Admin (connection)
        {
//            echo 'BLOU';
    		$oVue = new AdminVue();
    		$oVue->afficheHead();
    		$oVue->afficheEntete();
    		$oVue->afficheConnexion();				
    		$oVue->affichePied();			
        }
	}
}
?>