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
        echo'<br><br><br>';
//        var_dump($res);
//		var_dump($requete->url_elements);
		if(isset($requete->url_elements[0]) && $requete->url_elements[0]=='menu')	// Normalement l'id de l'artiste 
		{
            echo 'MENU ADMIN';
            $oVue = new AdminVue();
    		$oVue->afficheHead();
    		$oVue->afficheEntete();
    		$oVue->affichePied();
        } 
//        if(isset($requete->url_elements[0]) && $requete->url_elements[0]=='oeuvres')	// Normalement l'id de l'artiste 
//		{
//            echo 'OEUVRES';
//            $oOAC = new OeuvreControlleur();
//            $oOAC->getAction(Requete $requete);
//    		$oVue->afficheEntete();
//    		$oVue->afficheOeuvres($res);
//    		$oVue->affichePied();
//        } 
        else if(isset($requete->url_elements[0]) && $requete->url_elements[0]=='')	// Normalement l'id de l'artiste 
		{
            echo 'ACCUEIL ADMIN';
            $oVue = new AdminVue();
    		$oVue->afficheHead();
    		$oVue->afficheEntete();
            $oVue->afficheConnexion();	
    		$oVue->affichePied();
        } 
        else if(isset($requete->url_elements[0])){
//            var_dump($requete);
            echo 'PAGE ADMIN NON EXISTANTE';
        }
        else 	// Accueil Admin (connection)
        {
//            echo 'BLOU';
    		$oVue = new AdminVue();
    		$oVue->afficheHead();
    		$oVue->afficheEntete();
    		$oVue->afficheConnexion();				
    		$oVue->affichePied();			
        }
	}
    
    
	public function postAction(){
        echo'AH';
        
        if(!empty($_POST)){
  		    $authentification = new Authentification();
            $retour = $authentification->verification($_POST['login'], $_POST['mdp']);
            if($retour == true){ //login et mdp sont corrects
                //connecter la personne
                $_SESSION['login'] = $_POST['login'];
                
                //redirection vers page privee
                header("location:http://localhost/art-public-mtl/api/admin/menu");
            }else{
                header("location:http://localhost/art-public-mtl/api/admin");
                exit();
            }
          
        }
    }
}
?>