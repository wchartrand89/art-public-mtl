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

class MenuAdminControlleur extends Controlleur
{   
    public function getAction(Requete $requete)
    {
        //Vérifier si l'admin est connecté
        if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin')
        {
            // si login = correct alors afficher la page principal menu
            header("location:/art-public-mtl/api/admin/oeuvre");
        }
        //redirige vers l'accueil si admin pas connecté.
        else
        {
            header("location:/art-public-mtl/api/admin");
            exit();
        }
    }
    
    //lorsqu'il y a une action depuis un input de type submit
	public function postAction(Requete $requete)
    {      

        // var_dump($requete->url_elements);
        // echo '<br>'. $_GET['action'] . '<br>';
        // var_dump($_POST);
        // die;

        //si l'action est déconnexion
        if($_GET['action']=='deconnexion')
        {
            // si action deconnexion alors detruire la session et rediriger
            session_start();
            session_destroy(); //détruit la session
            header("location:/art-public-mtl/api/admin"); //retourne à l'accueil admin (vue de connexion)
            exit();
        }
        //si l'action n'est pas une des actions définies précédemment
        else
        {
            echo 'action non reconnue';
        }
    }    
}  
?>