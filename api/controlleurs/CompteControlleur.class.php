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

        
        //author Fred
        // si la session est set et est correct alors afficher l'edition des infos du compte.
        if(isset($_SESSION["user"]) && $_SESSION['user']=='ok')
        {
            $mail = $this->getInfosUser($_SESSION["username"]);
            $oVue = new Vue();
            $oVue->afficheEntete("compte");	
            $oVue->afficheMonCompte($mail);
            $oVue->affichePied();
        }
        
        else if(isset($requete->url_elements[1]) && $requete->url_elements[1] == "inscription"){
            $oVue = new Vue();
            $oVue->afficheEntete("inscription");	
            $oVue->afficheInscription();
            $oVue->affichePied();
        }
        // sinon afficher la connexion
        else
        {
            $oVue = new Vue();
            $oVue->afficheEntete("compte");	
            $oVue->afficheConnexion();
            // $oVue->affichePied();

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
                    $retour = $authentification->verificationUser($_POST['login']);

                if($retour)
                {
                    foreach($retour as $hashed_password)
                    {
                        if(password_verify($_POST["mdp"],$hashed_password)){
                            //connecter la personne + set la variable session pour la personne qui s'est connecté
                            $_SESSION["user"]='ok';
                            $_SESSION["username"]=$_POST['login'];

                            //redirection vers le menu oeuvre
                            header("location:/art-public-mtl/api/oeuvre");
                        }
                    }
                }
                else //connexion non reconnue
                {     
                    header("location:/art-public-mtl/api/compte"); //redirige vers l'accueil (login)
                    exit();
                }
            }
           
          
            if(isset($requete->url_elements[1]) && $requete->url_elements[1]=="modifierPW")
            { 
                $retour = $this->modificationPW($_POST['oldPW'], $_POST['newPW']);
                if($retour==true)
                {
                    header("location:/art-public-mtl/api/compte?update=ok");
                }
                else //connexion non reconnue
                {     
                    header("location:/art-public-mtl/api/compte?update=erreur"); //redirige vers l'accueil (login)
                    exit();
                }
            }
        }
            
        }
    
        private function getInfosUser($user)
        {
        $oUser = new User();
		$aUser = $oUser->getInfosUser($user);
		return $aUser;
        }
    
        private function modificationPW($oldPw, $newPW)
        {
        $oUser = new User();
		$aUser = $oUser->modificationPW($oldPw, $newPW);
		return $aUser;
        }
}
    
    

    

?>