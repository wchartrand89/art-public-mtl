<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2016-03-03
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 */
 
 /*
 * TODO : Commenter selon les standards du département.
 *
 */

 
 
class AVisiterControlleur extends Controlleur 
{
	// GET : 
	public function getAction(Requete $requete)
	{
        //echo JSON_encode($requete->url_elements);
        if(!empty($requete->url_elements)){
            $oAVisiter = new AVisiter();
            $oUser = new User();
            $idOeuvre= (int)$requete->url_elements[1];
            //echo $idOeuvre;
            $infosUser= $oUser->getInfosUser($_SESSION["username"]);
            $idUser= $infosUser["id_user"];
            //vérifier si le AVisiter est déja dans la base de données
            $verif = $oAVisiter->getOeuvreFav($idUser, $idOeuvre);
            //echo count($verif);
            if(count($verif)== 0){
                $aAVisiter = $oAVisiter->creerFavori($idUser,$idOeuvre);
            }else{
                $aAVisiter = $oAVisiter->supprimerFavori($idUser,$idOeuvre);
            }
            
        } 
	}
	
	public function postAction(Requete $requete)
    {
        echo "POST favoris";
        //(JSON_encode($requete->parametres));
       
	}
}
?>