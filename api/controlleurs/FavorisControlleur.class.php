<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2016-03-03
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 */
 
 /*
 * TODO : Commenter selon les standards du département.
 *
 */

 
 
class FavorisControlleur extends Controlleur 
{
	// GET : 

	
	public function getAction(Requete $requete)
	{
		echo "get favoris";
        
	}
	
	public function postAction(Requete $requete)
    {
        echo "POST favoris";
        //(JSON_encode($requete->parametres));
       
	}
}
?>