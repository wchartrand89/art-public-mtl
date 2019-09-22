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

 
 
class OeuvreAdminControlleur extends OeuvreControlleur 
{	
	// GET : 
	// 		/oeuvre/ - Liste des oeuvres
	// 		/oeuvre/{id}/ - Une oeuvre
	// 		/oeuvre/?q=nom,arrond,etc&valeur=chaineDeRecherche
    //      /oeuvre/modifier/id
    //      /oeuvre/supprimer/id
	
	public function getAction(Requete $requete)
	{
        //vérifier que l'admin est connecté
	if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin')
     {
        error_reporting(E_ALL ^ E_NOTICE);
			$res = array();
			//var_dump($requete->url_elements);
        
            
			if(isset($requete->url_elements[0]) && is_numeric($requete->url_elements[0]))	// Normalement l'id de l'oeuvre 
			{
				$id_oeuvre = (int)$requete->url_elements[0];
				
			$oVue = new AdminVue();
			$oVue->afficheEntete($requete->url_elements[0]);
			if(isset($requete->url_elements[0]) && is_numeric($requete->url_elements[0]))
				$res = $this->getOeuvre($id_oeuvre);
				
			} 
			else if(isset($requete->url_elements[1]) && $requete->url_elements[1] == "miseajour")
			{
				$res = $this->mettreAJour();
				echo "MISE A JOUR";
			}
        
        // si url = oeuvre/id/modifier alors get l'oeuvre avec l'ID => afficher le formulaire prerempli
			else if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "modifier" )
			{
				
				$id=$requete->url_elements[1];
				$res = $this->getOeuvreByID($id);
				$oVue = new AdminVue();
				$oVue->afficheEntete("");
				$oVue->afficheFormulaireModification($res);
				$oVue->affichePied();
			}
        else if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "supprimer")
        {
            $id=$requete->url_elements[1];
            $res = $this->SupprimerOeuvre($id);
            header("location:http://localhost/art-public-mtl/api/admin/oeuvre");
            exit();
        }
			else if(isset($requete->url_elements[1]) && $requete->url_elements[1] == "oeuvre")
			{
				//echo "test";
				//var_dump($_POST);
			}
			else 	// Liste des oeuvres
			{
				$res = $this->getListeOeuvre();
				
			}
			
            // #################### CONDITION A REVOIR car url elements n'existe pas !! ################
			if($requete->url_elements[1] == "")
			{
				if(isset($_GET['json']))
				{
				// echo json_encode($res);	
				}
				else
				{
					$oVue = new AdminVue();
					$oVue->afficheEntete("");
					if(isset($requete->url_elements[0]) && is_numeric($requete->url_elements[0]))
					{
						//var_dump($res);
						//die;
						$oVue->afficheOeuvre($res);
					}
					if($requete->url_elements[0]=="oeuvre")
					{
						$oVue->afficheOeuvres($res);
					}	
					$oVue->affichePied();
				}
			}
		}
		else
        {
            //si l'admin n'est pas connecté, rediriger vers l'accueil (login)
            header("location:http://localhost/art-public-mtl/api/admin");
			exit();
		}
	}
	
	
	public function postAction(Requete $requete)
	{
        // si on recoit quelque chose
        if(!empty($_POST))
        {
            // et que l'action est modification
            if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="modification")
            {
                // envoyer la data a la function qui envoie sur le modele Oeuvre.class pour avoir les infos de l'oeuvre
                $arrayModif=$_POST;
                if($res=$this->modifierOeuvre($arrayModif)){
                      //rediriger vers la page des oeuvres si le resultat est correct
                      header("Location: /art-public-mtl/api/admin/oeuvre");
                }else{
                    //sinon echo erreur
                    echo "Veuillez vérifier vos champs.";
                }
                
          
      
            }  
        }        
     
       // var_dump($_POST);
//		$res = array();
//        //var_dump($requete->url_elements);
//        //var_dump($requete);
//		if(isset($requete->url_elements[0]) && is_numeric($requete->url_elements[0]))	// Normalement l'id de l'oeuvre 
//		{
//            $id_oeuvre = (int)$requete->url_elements[0];
//            $parametres=array();
//            //tableau dans lequel on met toutes les variables POST
//            foreach ( $_POST as $post => $val )  {
//                $parametres["$post"] = $val;
//            }
//
//            //var_dump($requete->parametres);
//            //echo $id_oeuvre;
//
//            $res = $this->modifOeuvre($id_oeuvre, $parametres);
//            
//        } 
		
		if(isset($_GET['json']))
		{
			echo json_encode($res);	
        
		}
        
        
        
	}
	
//	protected function modifOeuvre($id_oeuvre, $param)
//	{
//		$oOeuvre = new Oeuvre();
//		$aOeuvre = $oOeuvre->modifOeuvre($id_oeuvre, $param);	
//		return $aOeuvre;
//	}
	
	/**
	 * Fait l'importation et la mise à jour des oeuvres et des artistes 
	 * @access private
	 * @TODO Ajouter la mise à jour des artistes
	 */
    private function SupprimerOeuvre($id){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->SupprimerOeuvreByID($id);
		return $aOeuvre;
    }
    
	private function mettreAJour()
	{
		$oImportation = new Importation();
		$oImportation->importerOeuvre();
		$oImportation->mettreAJour();
		
	}
	
    	protected function modifierOeuvre($array)
	{
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->modifierOeuvre($array);
		return $aOeuvre;
	}
    
    
	private function getImages($id_oeuvre)
	{
		$oImportation = new Importation();
		$aImage = $oImportation->telechargementImages($id_oeuvre);
	}
	
}
?>