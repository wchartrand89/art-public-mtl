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

 
 
class ArtisteAdminControlleur extends ArtisteControlleur 
{	
	// GET : 
	// 		/artiste/ - Liste des oeuvres
	// 		/artiste/{id}/ - Une oeuvre
	// 		/artiste/?q=nom,arrond,etc&valeur=chaineDeRecherche
    //      /artiste/id/modifier
    //      /artiste/supprimer/id
	
	public function getAction(Requete $requete)
	{
        //vérifier que l'admin est connecté
	if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin')
     {
            error_reporting(E_ALL ^ E_NOTICE);
			$res = array();
//			//var_dump($requete->url_elements);

        // @author fred
            if(isset($requete->url_elements[1]) && $requete->url_elements[1] == "ajout")
			{
                
                $page = $requete->url_elements[1];
 
                
                //affiche la vue Admin de form d'ajout
				$oVue = new AdminVue();
                $oVue->afficheEntete($page);
				$oVue->afficheFormulaireAjoutArtiste();
                $oVue->affichePied();
			}
        
         //@author fred
        // si url = oeuvre/id/modifier alors get l'oeuvre avec l'ID => afficher le formulaire prerempli
			else if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "modifier" )
			{
				$page = $requete->url_elements[2];
				$id=$requete->url_elements[1];
                //va chercher les infos de l'oeuvre présent dans la table oeuvre ou id = id url
				$res = $this->getArtiste($id);
                
                //affiche la vue Admin de form de modification
				$oVue = new AdminVue();
				$oVue->afficheEntete($page);
				$oVue->afficheFormulaireModificationArtiste($res);
				$oVue->affichePied();
			}
//        // @author fred
        else if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "supprimer")
        {
            $id_artiste=$requete->url_elements[1];
            // supprime l'oeuvre de la table oeuvre
            $res = $this->SupprimerArtiste($id_artiste);
            // supprime les liens entre l'oeuvre et les artistes
            $res = $this->SupprimerLienArtisteOeuvre($id_artiste);
            
            //redirection sur la page une fois supprimé
            header("Location: /art-public-mtl/api/admin/artiste?update=ok");
            exit();
        }
			else 	// Liste des oeuvres
			{
				$res = $this->getListeArtiste();
				
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
						$oVue->afficheArtiste($res);
					}
					if($requete->url_elements[0]=="artiste")
					{
						$oVue->afficheArtistes($res);
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
        if(!empty($_POST))
        {
            // @author fred
            // et que l'action est modification
            // ------------------------------------POST MODIF OEUVRE------------------------------------
            if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="modification")
            {
                // envoyer la data a la function qui envoie sur le modele Oeuvre.class pour avoir les infos de l'oeuvre
                $arrayModif=$_POST;

                     if($res2=$this->modifierArtiste($arrayModif) )
                     {
                          //rediriger vers la page des oeuvres si le resultat est correct
                          header("Location: /art-public-mtl/api/admin/artiste?update=ok");
                    }
                    
                    else
                    {
                        header("Location:/art-public-mtl/api/admin/artiste?update=error");
                        die;
                    }
                }
//                
                
//                 -----------------------------------POST AJOUT OEUVRE-----------------------------------------------
                //l'action est ajouterOeuvre
                 if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="ajouterArtiste")
                    {
                    
                    // envoyer la data a la function qui envoie sur le modele Oeuvre.class pour avoir les infos de l'oeuvre
                    $arrayModif=$_POST;
                    if( $res=$this->ajoutArtiste($arrayModif))
                    {
                        //rediriger vers la page des oeuvres si le resultat est correct
                        header("Location: /art-public-mtl/api/admin/artiste?update=ok");
                    }
                    else
                    {
                        header("Location:/art-public-mtl/api/admin/artiste?update=error");
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

    // MODIFIER OEUVRE
	// @author fred
    private function modifierArtiste($array){
        
        $oArtiste = new Artiste();
        $oArtiste = $oArtiste->modifierArtiste($array);
		return $oArtiste;
    }
    
    
    // AJOUT OEUVRE
    // @author fred
    private function ajoutArtiste($array){
        $oArtiste = new Artiste();
        $oArtiste = $oArtiste->ajoutArtiste($array);
		return $oArtiste;
    }
    
    // SUPPRIMER OEUVRE
    // @author fred
    private function supprimerArtiste($id){
        $oArtiste = new Artiste();
        $oArtiste = $oArtiste->supprimerArtiste($id);
		return $oArtiste;
    }
    
    private function supprimerLienArtisteOeuvre($id){
        $oArtiste = new Artiste();
        $oArtiste = $oArtiste->supprimerLienArtisteOeuvre($id);
		return $oArtiste;
    }
    
}
?>