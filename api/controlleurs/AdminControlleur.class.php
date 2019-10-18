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
        
		if(isset($requete->url_elements[0]) && $requete->url_elements[0]=='menu')
        {	
		  $res = array();
        }
		//var_dump($requete->url_elements);
		
		if(!isset($requete->url_elements[0]))
        {
			echo 'PAGE ADMIN NON EXISTANTE';
		}
		else if ($requete->url_elements[0] == '')
		{
            
            if(!isset($_SESSION["login"])){
                // Accueil Admin (connexion)
    //			echo 'ACCUEIL ADMIN';
                
                $oVue = new AdminVue();
                $oVue->afficheEnteteConnexion();
                $oVue->afficheConnexion();	
                $oVue->affichePied(); 

            }else{
                
                header("location:/art-public-mtl/api/admin/menu");
                
            }

		}
		else
		{
			/* Instanciation du controlleur */
            $nomControlleur = ucfirst($requete->url_elements[0]) . 'AdminControlleur';
            
            if (class_exists($nomControlleur)) 
            {
                $oControlleur = new $nomControlleur();
                $nomAction = strtolower($requete->verbe) . 'Action';
                $oControlleur->$nomAction($requete);
            }
            else
            {
				echo 'PAGE ADMIN NON EXISTANTE';
			}
		}
	}
    
    
	public function postAction(Requete $requete)
    {        
        if(!empty($_POST))
        {

			//var_dump($requete);
			// echo '<br>'. $_GET['action'] . '<br>';
			// var_dump($_POST);
			// die;
        
            
            // Si login correct alors set une variable session
  		    $authentification = new Authentification();
            $retour = $authentification->verification($_POST['login'], $_POST['mdp']);
			if($retour == true) //login et mdp sont corrects
			{
                
                //connecter la personne
                $_SESSION['login'] = $_POST['login'];
                
                //redirection vers le menu admin
                header("location:/art-public-mtl/api/admin/oeuvre");
			}
			else //connexion non reconnue
			{
                

//                session_destroy(); //détruire la session
                header("location:/art-public-mtl/api/admin"); //redirige vers l'accueil (login)
                exit();
            }
          
        }
    }
}
?>