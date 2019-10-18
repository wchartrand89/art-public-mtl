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
        
        if(isset($_SESSION["user"]) && $_SESSION['user']=='ok')
        {
            
            $oVue = new Vue();
            $oVue->afficheEntete("compte");	
            $oVue->afficheMonCompte($_SESSION["username"], $_SESSION["pw"]);
            $oVue->affichePied();
        }
        else
        {
            $oVue = new Vue();
            $oVue->afficheEntete("compte");	
            $oVue->afficheConnexion();
            $oVue->affichePied();

        }
        
	}
    
    
	public function postAction(Requete $requete)
    {       
        
        if(!empty($_POST))
        {
            // si l'action envoyée est connexion
            if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="connexion")
               { 

                 // Si login correct alors set une variable session
                    $authentification = new Authentification();
                    $retour = $authentification->verificationUser($_POST['login'], $_POST['mdp']);
                    if($retour == true) //login et mdp sont corrects
                    {
                        
                        //connecter la personne + set la variable session pour la personne qui s'est connecté
                        $_SESSION["user"]='ok';
                        $_SESSION["pw"]=$_POST['mdp'];
                        $_SESSION["username"]=$_POST['login'];

                        //redirection vers le menu oeuvre
                        header("location:/art-public-mtl/api/oeuvre");
                    }
                    else //connexion non reconnue
                    {

                        
                        header("location:/art-public-mtl/api/compte"); //redirige vers l'accueil (login)
                        exit();
                    }
                }
           
          
        }
    }
}
?>