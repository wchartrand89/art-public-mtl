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

	public  function verification($lo, $mdp){
       //requete de verication ici  
        
        
        
        
        $lo=$this->filtre($lo);
        $mdp=$this->filtre($mdp);
        
        $requete= "SELECT login FROM user WHERE login='$lo' and role='admin' and password='$mdp'";
        $result =$this->_db->query($requete);

        while ($resultat = $result->fetch_assoc()) 
        {
            $tableau[] = $resultat;
        }

//        var_dump($resultat);

     // print_r($resultat[0]['nbre']); die;

        if( $tableau[0]>0)   return true;
        return false;
	}
    
    public  function verificationUser($lo, $mdp){
       //requete de verication ici  
        
        
        
        
        $lo=$this->filtre($lo);
        $mdp=$this->filtre($mdp);
        
        $requete= "SELECT login FROM user WHERE login='$lo' and role='usager' and password='$mdp'";
        $result =$this->_db->query($requete);

        while ($resultat = $result->fetch_assoc()) 
        {
            $tableau[] = $resultat;
        }

//        var_dump($resultat);

     // print_r($resultat[0]['nbre']); die;

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