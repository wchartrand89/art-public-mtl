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
class Filtre extends Modele {	
     
	const TABLE_OEUVRE = "oeuvre";
	const TABLE_LIAISON_ARTISTE_OEUVRE = "artiste_oeuvre";
	const TABLE_OEUVRE_DONNEES_EXTERNES = "apm__oeuvre_donnees_externes";
	const TABLE_LIAISON_OEUVRE_CATEGORIE = "categorie_oeuvre";
	const TABLE_CATEGORIE = "categorie";
	const TABLE_IMAGE = "ref_image";
	
    
    /* Get Oeuvres filtrées */
    public function getOeuvres($f="") {
        return "LISTE OEUVRES FILTREES : ";
    }
    
    /* */
 

    // filtre qui empeche les injections sql/ XSS + utf8 encode.
    // function filtre($variable)
    // {
    //     $varFiltre = $this->_db->real_escape_string($variable);
    //     $varFiltre=htmlspecialchars($varFiltre);
    //     //ici, on pourrait appliquer d'autres filtres.... (ex: strip_tags qui enlèverait les tags HTML dans un texte...)
    //     return $varFiltre;
    // }
}
	





?>