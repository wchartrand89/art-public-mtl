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

 
 
class FiltreControlleur extends Controlleur 
{
	// GET : 

	
	public function getAction(Requete $requete)
	{
		echo "get filtre";
        
	}
	
	public function postAction(Requete $requete)
    {
		//echo (JSON_encode($requete));
		if(!empty($requete->parametres)){
		// 	$res="WHERE ";
        //     $filtre =("type" =>[1,2,3],
       	//  "arrondissement" =>["Ville-Marie"]);
		//Traitement de $filtre pour créer la chaine à ajouter à la requete	
		// foreach($filtre as $key=> $condition){
		// 	$res .= $key." IN(";
		// 	foreach($condition as $id){
		// 		$res.=$id.",";
		// 	}
		// 	$res.=")";
		// }
			$filtre = " WHERE SC.id_sous_categorie IN (3) ";
			$oOeuvre = new Oeuvre();
			$aOeuvre = $oOeuvre->getListeFiltre($filtre);
		

			echo JSON_encode($aOeuvre);
		}        
		//echo "allo"; 
	}
}
?>