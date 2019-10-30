<?php
/**
 * Class ContactAdminControlleur
 *
 */

 
 
class ContactAdminControlleur extends ContactControlleur 
{	
	// GET : 
	// 		/contact/ - Liste des contacts
	
	public function getAction(Requete $requete)
	{
        //vérifier que l'admin est connecté
	if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin')
     {
            error_reporting(E_ALL ^ E_NOTICE);
			$res = array();

			
            $oContact = new Contact();
            $res = $oContact->getListeContact();
    
            $oVue = new AdminVue();
            $oVue->afficheEntete("");
            $oVue->afficheContacts($res);
            $oVue->affichePied();
		}
		else
        {
            //si l'admin n'est pas connecté, rediriger vers l'accueil (login)
            header("location:/art-public-mtl/api/admin");
			exit();
		}
	}
    
}
?>