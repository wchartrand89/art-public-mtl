<?php
/**
 * Class CompteControlleur
 * Gère les requêtes HTTP compte
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
 
class CompteControlleur extends Controlleur 
{
    // GET : 
	// 		/compte/ - compte
	
	public function getAction(Requete $requete)
	{
		$oVue = new Vue();
        $oVue->afficheEntete("compte");	
        $oVue->afficheConnexion();
        $oVue->affichePied();
        
        
	}
    
    
	public function postAction(Requete $requete)
    {       
        
        var_dump($requete->url_elements[1]);
        if(!empty($_POST))
        {

			//var_dump($requete);
			// echo '<br>'. $_GET['action'] . '<br>';
			// var_dump($_POST);
			// die;
            
            
            // EMPECHER LE BRUT FORCE
            
//            $apc_key = "{$_SERVER['SERVER_NAME']}~login:{$_SERVER['REMOTE_ADDR']}";
//            $apc_blocked_key = "{$_SERVER['SERVER_NAME']}~login-blocked:{$_SERVER['REMOTE_ADDR']}";
//
//            $tries = (int)apc_fetch($apc_key);
//
//
//
//            if ($tries >= 5) {
//                header("HTTP/1.1 429 Too Many Requests");
//                echo "You've exceeded the number of login attempts. We've blocked IP address {$_SERVER['REMOTE_ADDR']} for a few minutes.";
//                exit();
//            }
            
            
            // Si login correct alors set une variable session
  		    $authentification = new Authentification();
            $retour = $authentification->verificationUser($_POST['login'], $_POST['mdp']);
			if($retour == true) //login et mdp sont corrects
			{
//                apc_delete($apc_key);
//                apc_delete($apc_blocked_key);
                
                //connecter la personne
                $_SESSION['login'] = $_POST['login'];
                
                //redirection vers le menu oeuvre
                header("location:/art-public-mtl/api/oeuvre");
			}
			else //connexion non reconnue
			{
                
//                $blocked = (int)apc_fetch($apc_blocked_key);
//
//                apc_store($apc_key, $tries+1, pow(2, $blocked+1)*60);
//                apc_store($apc_blocked_key, $blocked+1, 86400);
                
                session_destroy(); //détruire la session
                header("location:/art-public-mtl/api/admin"); //redirige vers l'accueil (login)
                exit();
            }
          
        }
    }
}
?>