<?php
/**
 * Class Modele
 * Template de classe modèle. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Authentification extends Modele{

	public  function verification($lo){
        //requete de verication ici  
        $lo=$this->filtre($lo);
        
        $requete= "SELECT password FROM user WHERE login='$lo' and role='admin'";
        $result =$this->_db->query($requete);
        $res = $result->fetch_assoc();
        return $res;

        if( $tableau[0]>0)   return true;
        return false;
	}


    
    public  function verificationUser($lo){
       //requete de verication ici  
        $lo=$this->filtre($lo);
        
        $requete= "SELECT password FROM user WHERE login='$lo' and role='usager'";
        $result =$this->_db->query($requete);
        $res = $result->fetch_assoc();
        return $res;

        if( $tableau[0]>0)   return true;
        return false;
	}
    
    
        function filtre($variable)
    {
        $varFiltre = $this->_db->real_escape_string($variable);
        $varFiltre=htmlspecialchars($varFiltre);
        //ici, on pourrait appliquer d'autres filtres.... (ex: strip_tags qui enlèverait les tags HTML dans un texte...)
        return $varFiltre;
    }
    
}