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
    //      /oeuvre/id/modifier/
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
        
        // @author fred
            else if(isset($requete->url_elements[1]) && $requete->url_elements[1] == "ajout")
			{
                $page=$requete->url_elements[1];
                //va chercher toutes les catégories et sous catégories
                $res2 = $this->getCategorie();
				$res3 = $this->getSousCategorie();
                
                //affiche la vue Admin de form d'ajout
				$oVue = new AdminVue();
                $oVue->afficheEntete($page);
				$oVue->afficheFormulaireAjout($res2, $res3);
                $oVue->affichePied();
			}
        
        // @author fred
        // si url = oeuvre/id/modifier alors get l'oeuvre avec l'ID => afficher le formulaire prerempli
			else if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "modifier" )
			{
				$page = $requete->url_elements[2];
				$id=$requete->url_elements[1];
                //va chercher les infos de l'oeuvre présent dans la table oeuvre ou id = id url
				$res = $this->getOeuvre($id);
                //va chercher toutes les catégories et sous catégories
				$res2 = $this->getCategorie();
				$res3 = $this->getSousCategorie();
                
                //affiche la vue Admin de form de modification
				$oVue = new AdminVue();
				$oVue->afficheEntete($page);
				$oVue->afficheFormulaireModification($res, $res2, $res3);
				$oVue->affichePied();
			}
        // @author fred
        else if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "supprimer")
        {
            $id=$requete->url_elements[1];
            // supprime l'oeuvre de la table oeuvre
            $res = $this->SupprimerOeuvre($id);
            // supprime les liens entre l'oeuvre et les artistes, matériaux, catégories, sous catégories
            $res = $this->SupprimerLienArtisteOeuvre($id);
            $res = $this->SupprimerLienMateriauxOeuvre($id);
            $res = $this->SupprimerLienCategorieOeuvre($id);
            $res = $this->SupprimerLienSousCategorieOeuvre($id);
            
            //redirection sur la page une fois supprimé
            header("Location: /art-public-mtl/api/admin/oeuvre?update=ok");
            exit();
        }
			else if(isset($requete->url_elements[1]) && $requete->url_elements[1] == "oeuvre" )
			{
				//echo "test";
				//var_dump($_POST);
			}
			else 	// Liste des oeuvres
			{
				$res = $this->getListeOeuvre();
				
			}
			 // @author fred
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
            header("location:/art-public-mtl/api/admin");
			exit();
		}
	}
	
	
	public function postAction(Requete $requete)
	{
        // si on recoit quelque chose
        if($_GET['action']=='deconnexion')
        {
            echo "hehe";
            // si action deconnexion alors detruire la session et rediriger
            //session_start();
            session_destroy(); //détruit la session
            header("location:/art-public-mtl/api/admin"); //retourne à l'accueil admin (vue de connexion)
            exit();
        }
        if(!empty($_POST))
        {
            
            // @author fred
            // et que l'action est modification
            if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="modification")
            {
                // envoyer la data a la function qui envoie sur le modele Oeuvre.class pour avoir les infos de l'oeuvre
                $arrayModif=$_POST;
                 if($res=$this->getXmlCoordsFromAdress($arrayModif)) 
                    {
                     if($res=$this->modifierOeuvre($arrayModif, $res) 
                       && $res2=$this->modifierArtiste($arrayModif) 
                       && $res3=$this->modifierMateriaux($arrayModif) 
                       && $res4=$this->modifierCat($arrayModif) 
                       && $res5=$this->modifierSousCat($arrayModif)
                        ){
//                        var_dump($res);
//                        var_dump($res2);
//                        var_dump($res3);
//                        var_dump($res4);
//                        var_dump($res5);
//                        die();
                          //rediriger vers la page des oeuvres si le resultat est correct
                          header("Location: /art-public-mtl/api/admin/oeuvre?update=ok");
                        }
                    }
                else
                {
                    header("Location:/art-public-mtl/api/admin/oeuvre?update=error");
                    die;
                }
            }
                
                
//                 AJOUT OEUVREEEEEEEEE
                //l'action est ajouterOeuvre
                else if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="ajouterOeuvre")
                {
                    
                    // envoyer la data a la function qui envoie sur le modele Oeuvre.class pour avoir les infos de l'oeuvre
                    $arrayModif=$_POST;
                    if($res=$this->getXmlCoordsFromAdress($arrayModif)) 
                    {
                        if($res2=$this->ajoutOeuvre($arrayModif, $res)
                        && $res3=$this->ajoutArtiste($arrayModif)
                        && $res3bis=$this->ajoutLienArtisteOeuvre($arrayModif)
                        && $res4=$this->ajoutMateriaux($arrayModif) 
                        && $res5=$this->ajoutCat($arrayModif) 
                        && $res6=$this->ajoutSousCat($arrayModif)
                      ){
//                        var_dump($res);
//                        var_dump($res2);
//                       // var_dump($res3);
//                        var_dump($res4);
//                        var_dump($res5);
//                        die();
                        //rediriger vers la page des oeuvres si le resultat est correct
                        header("Location: /art-public-mtl/api/admin/oeuvre?update=ok");
                        }

                    }
                    else
                    {
                    header("Location:/art-public-mtl/api/admin/oeuvre?update=error");
                    die;
                    }
      
            }  
        }        
     
		
		if(isset($_GET['json']))
		{
			echo json_encode($res);	
        
		}
        
        
        
	}
	
	
	/**
	 * Fait l'importation et la mise à jour des oeuvres et des artistes 
	 * @access private
	 * @TODO Ajouter la mise à jour des artistes
	 */
    
    
    // SUPPRESION OEUVRE
    // @author fred
    private function SupprimerOeuvre($id){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->SupprimerOeuvreByID($id);
		return $aOeuvre;
    }
    
    private function SupprimerLienArtisteOeuvre($id){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->SupprimerLienArtisteOeuvre($id);
		return $aOeuvre;
    }
    
    private function SupprimerLienMateriauxOeuvre($id){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->SupprimerLienMateriauxOeuvre($id);
		return $aOeuvre;
    }
    
    private function SupprimerLienCategorieOeuvre($id){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->SupprimerLienCategorieOeuvre($id);
		return $aOeuvre;
    }
    
    private function SupprimerLienSousCategorieOeuvre($id){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->SupprimerLienSousCategorieOeuvre($id);
		return $aOeuvre;
    }
    
    // MODIFIER OEUVRE
	// @author fred
    private function modifierArtiste($array){
        
        $idArtiste=$array["id_artiste"];
        $oArtiste = new Artiste();
        // si l'artiste est existant (non null)
        if($res=$oArtiste->getArtiste($idArtiste))
        {
            $oArtiste = $oArtiste->modifierArtiste($array);
        }else{
            $oArtiste = $oArtiste->creerArtisteOeuvre($array);
        }
		return $oArtiste;
    }
    // @author fred
    private function modifierMateriaux($array){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->modifierMateriaux($array);
		return $aOeuvre;
    }
    // @author fred
    protected function modifierOeuvre($array, $res)
	{
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->modifierOeuvre($array, $res);
		return $aOeuvre;
	}
    
    
    // @author fred
    protected function modifierCat($array){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->modifierCat($array);
		return $aOeuvre;
    }
    
    // @author fred
    protected function modifierSousCat($array){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->modifierSousCat($array);
		return $aOeuvre;
    }
     // @author fred
    protected function getCategorie(){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->getCategorie();
		return $aOeuvre;
    }
	 // @author fred
    protected function getSousCategorie(){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->getSousCategorie();
		return $aOeuvre;
    }
    
    
    // AJOUT OEUVRE
    // @author fred
    protected function ajoutOeuvre($array, $array2)
	{
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->ajoutOeuvre($array, $array2);
		return $aOeuvre;
	}
    
    // @author fred
    private function ajoutArtiste($array){
        $oArtiste = new Artiste();
        $oArtiste = $oArtiste->ajoutArtiste($array);
		return $oArtiste;
    }
    
        // @author fred
    private function ajoutLienArtisteOeuvre($array){
        $oArtiste = new Artiste();
        $oArtiste = $oArtiste->ajoutLienArtisteOeuvre($array);
		return $oArtiste;
    }
    
    // @author fred
    protected function ajoutMateriaux($array)
	{
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->ajoutMateriaux($array);
		return $aOeuvre;
	}
    
    // @author fred
    protected function ajoutCat($array) 
	{
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->ajoutCat($array);
		return $aOeuvre;
	}
    
    // @author fred
    protected function ajoutSousCat($array) 
	{
		$oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->ajoutSousCat($array);
		return $aOeuvre;
	}
    
    // @author fred
    protected function getXmlCoordsFromAdress($array){
        $oOeuvre = new Oeuvre();
		$aOeuvre = $oOeuvre->getXmlCoordsFromAdress($array);
        $array = json_decode(json_encode((array)$aOeuvre), TRUE);
        echo "<br>";
        foreach($array as $key=>$value){
            foreach($value as $val){
                $newArray[$key] = $val;
                
            }
        }
		return $newArray;
    }
    
}
?>