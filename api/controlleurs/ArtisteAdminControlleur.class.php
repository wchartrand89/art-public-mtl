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
//        
//            
////			if(isset($requete->url_elements[0]) && is_numeric($requete->url_elements[0]))	// Normalement l'id de l'oeuvre 
////			{
////				$id_oeuvre = (int)$requete->url_elements[0];
////				
////			$oVue = new AdminVue();
////			$oVue->afficheEntete($requete->url_elements[0]);
////			if(isset($requete->url_elements[0]) && is_numeric($requete->url_elements[0]))
////				$res = $this->getOeuvre($id_oeuvre);
////				
////			} 
//        
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
        
        // @author fred
        // si url = oeuvre/id/modifier alors get l'oeuvre avec l'ID => afficher le formulaire prerempli
//			else if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "modifier" )
//			{
//				$page = $requete->url_elements[2];
//				$id=$requete->url_elements[1];
//                //va chercher les infos de l'oeuvre présent dans la table oeuvre ou id = id url
//				$res = $this->getArtiste($id);
//                
//                //affiche la vue Admin de form de modification
//				$oVue = new AdminVue();
//				$oVue->afficheEntete($page);
//				$oVue->afficheFormulaireModificationArtiste($res);
//				$oVue->affichePied();
//			}
//        // @author fred
//        else if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "supprimer")
//        {
//            $id=$requete->url_elements[1];
//            // supprime l'oeuvre de la table oeuvre
//            $res = $this->SupprimerOeuvre($id);
//            // supprime les liens entre l'oeuvre et les artistes, matériaux, catégories, sous catégories
//            $res = $this->SupprimerLienArtisteOeuvre($id);
//            $res = $this->SupprimerLienMateriauxOeuvre($id);
//            $res = $this->SupprimerLienCategorieOeuvre($id);
//            $res = $this->SupprimerLienSousCategorieOeuvre($id);
//            
//            //redirection sur la page une fois supprimé
//            header("Location: /art-public-mtl/api/admin/artiste?update=ok");
//            exit();
//        }
//			else 	// Liste des oeuvres
//			{
				$res = $this->getListeArtiste();
				
//			}
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
        if($_GET['action']=='deconnexion')
        {
            
            // si action deconnexion alors detruire la session et rediriger
            //session_start();
            session_destroy(); //détruit la session
            header("location:/art-public-mtl/api/admin"); //retourne à l'accueil admin (vue de connexion)
            exit();
        }
        // si on recoit quelque chose
        if(!empty($_POST))
        {
            // @author fred
            // et que l'action est modification
            if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="modification")
            {
                // envoyer la data a la function qui envoie sur le modele Oeuvre.class pour avoir les infos de l'oeuvre
                $arrayModif=$_POST;

                     if($res2=$this->modifierArtiste($arrayModif) 
                        ){
//                        var_dump($res);
//                        var_dump($res2);
//                        var_dump($res3);
//                        var_dump($res4);
//                        var_dump($res5);
//                        die();
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
                
//                 AJOUT OEUVREEEEEEEEE
                //l'action est ajouterOeuvre
                 if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="ajouterArtiste")
                {
                    
                    // envoyer la data a la function qui envoie sur le modele Oeuvre.class pour avoir les infos de l'oeuvre
                    $arrayModif=$_POST;
                        if( $res=$this->ajoutArtiste($arrayModif)){
//                        var_dump($res);
//                        var_dump($res2);
//                       // var_dump($res3);
//                        var_dump($res4);
//                        var_dump($res5);
//                        die();
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
    
    
}
?>