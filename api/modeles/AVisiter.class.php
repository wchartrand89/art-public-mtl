<?php
/**
 * Class Filtre
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2014-09-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 * 
 * 
 */
class AVisiter extends Modele {	
     
	const TABLE_OEUVRE = "oeuvre";
	const TABLE_A_VISITER = "a_visiter";
    const TABLE_USER="user";
	
    
    public function creerAVisiter($idUser, $idOeuvre)
    {
        //requete
        //echo $idOeuvre;
        //echo $idUser;
        $request="INSERT INTO ". self::TABLE_A_VISITER ." (id_oeuvre, id_user) VALUES (".$idOeuvre.", ".$idUser.")";
        //execute requete
        $result = $this->_db->query($request);
        if ($result !== FALSE) 
        {
            return true;              
        }
        else 
        {
            return "erreur";
        }
    }
    public function supprimerAVisiter($idUser, $idOeuvre)
    {
        //requete
        //echo $idOeuvre;
        //echo $idUser;
        $request="DELETE FROM ". self::TABLE_A_VISITER ." WHERE id_oeuvre=".$idOeuvre." AND id_user=".$idUser;
        //execute requete
        $result = $this->_db->query($request);
        if ($result !== FALSE) 
        {
            return true;              
        }

    }

        /* Get Oeuvre favorite 
    Retourner tableau des oeuvres favorites du user connecté
    */
    public function getOeuvreAVisiter($idUser, $idOeuvre) 
	{
		$res = Array();
        $query = "	SELECT * FROM ". self::TABLE_A_VISITER  ."
                     WHERE id_user =".$idUser." AND id_oeuvre = ".$idOeuvre;

        if($mrResultat = $this->_db->query($query))
        {
            while($id = $mrResultat->fetch_assoc())
            {
                $res[] = $id;
            } 
        }
		return $res;
    }
    

}	


?>