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
 
class OeuvreControlleur extends Controlleur 
{
	// GET : 
	// 		/oeuvre/ - Liste des oeuvres
	// 		/oeuvre/{id}/ - Une oeuvre
	// 		/oeuvre/?q=nom,arrond,etc&valeur=chaineDeRecherche
	
	public function getAction(Requete $requete)
	{
//        var_dump($_SESSION['id']);
     
        
        $types=array();
		$res = array();
		$page ="oeuvres";
		//var_dump($requete->url_elements);
		if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]))	// Normalement l'id de l'oeuvre 
		{
            $id_oeuvre = (int)$requete->url_elements[1];
            
			$res = $this->getOeuvre($id_oeuvre);
			$page ="oeuvre";
            
        } 
        else if	(isset($requete->url_elements[1]) && $requete->url_elements[1]=='carte')// Liste des oeuvres
        {
//        	$res = $this->getCarteOeuvres();	
        }
        else 	// Liste des oeuvres
        {
			$res = $this->getListeOeuvre();
			$types= $this->getListeType();
			$arrondissements= $this->getListeArrondissement();
			$dates= $this->getListeDate();
        }
		
		if(isset($_GET['json']))
		{
			echo json_encode($res);	
		}
		else
		{			
			$oVue = new Vue();
			//$oeuvreVue = new OeuvreVue();
			$oVue->afficheEntete($page);			
			if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]))
			{
				$oVue->afficheOeuvre($res);
			}
			else
			{
				$oVue->afficheOeuvres($res, $types, $arrondissements, $dates);
			}			
			$oVue->affichePied();			
		}		
	}	
	
    protected function getOeuvreByID($id_oeuvre)
	{
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->getOeuvreByID($id_oeuvre);
		
		return $aOeuvre;
	}	
		
	protected function getOeuvre($id_oeuvre)
	{
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->getOeuvre($id_oeuvre);
		
		return $aOeuvre;
	}
	
	protected function getListeOeuvre()
	{
		
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->getListe();

		return $aOeuvre;
	}
	
	protected function getListeType()
	{
		
		$oType = new Type();
		$aType = $oType->getListe();

		return $aType;
	}
	
	protected function getListeArrondissement()
	{
		
		$oArrondissement = new Arrondissement();
		$aArrondissement = $oArrondissement->getListe();

		return $aArrondissement;
	}
	
	protected function getListeDate()
	{
		
		$oDate = new Date();
		$aDate = $oDate->getListe();

		return $aDate;
	}
	
	
	
	public function postAction(Requete $requete)
    {
		if(!empty($_POST)){
			echo "POST";
		}         
	}
}
?>