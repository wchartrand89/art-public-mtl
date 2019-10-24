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

 
 
class UtilisateurAdminControlleur extends Controlleur
{	
	// GET : 
	// 		/utilisateur/ - Liste des oeuvres
    //      /utilisateur/supprimer/id
	
	public function getAction(Requete $requete)
	{

        //vérifier que l'admin est connecté
	if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin')
     {
            error_reporting(E_ALL ^ E_NOTICE);
			$res = array();
//			//var_dump($requete->url_elements);


//        // @author fred
            if(isset($requete->url_elements[1]) && is_numeric($requete->url_elements[1]) && isset($requete->url_elements[2]) && $requete->url_elements[2] == "supprimer")
            {
                $id_user=$requete->url_elements[1];
                // supprime l'utilisateur
                $res = $this->SupprimerUser($id_user);

                //redirection sur la page une fois supprimé
                header("Location: /art-public-mtl/api/admin/utilisateur?update=ok");
                exit();
            }
			else 	// Liste des oeuvres
			{
				$res = $this->getListeUser();
				
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
						$oVue->affiche1Utilisateur($res);
					}
					if($requete->url_elements[0]=="utilisateur")
					{
						$oVue->afficheUser($res);
					}	
					$oVue->affichePied();
				}
			}
		}
		else
        {
            //si l'admin n'est pas connecté, rediriger vers l'accueil (login)
            header("location:/art-public-mtl/api/utilisateur");
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
            header("location:/art-public-mtl/api/utilisateur"); //retourne à l'accueil admin (vue de connexion)
            exit();
        }

        
        
        
	}
	
	
	/**
	 * Renvoie un array de tous les users de la DB (sauf admin)
	 * @access private
	 */

    
	// @author fred    
    private function getListeUser(){
        $oUser = new User();
		$aUser = $oUser->getListeUser();
		return $aUser;
    }
    
    private function SupprimerUser($id){
        $oUser = new User();
		$aUser = $oUser->SupprimerUser($id);
		return $aUser;
    }
    
}
?>