<?php
/**
 * Class Contact
 * 
 */
class Contact extends Modele {	
     
    const TABLE_CONTACT = "contact";

    public function ajoutContact($array) {
        $nom=$this->filtre($array["nom"]);
        $prenom=$this->filtre($array["prenom"]);
        $courriel=$this->filtre($array["courriel"]);
        $sujet=$this->filtre($array["sujet"]);
        $message=$this->filtre($array["message"]);

        $request = "INSERT INTO " . self::TABLE_CONTACT . "(nom, prenom, courriel, sujet, commentaire)
        VALUES ('$nom', '$prenom', '$courriel', '$sujet', '$message')";

        $result = $this->_db->query($request);
        if ($result !== FALSE) 
        {
            return true;              
        }
        else 
        {
            echo("Message d'erreur : %s\n". $this->_db->error);
            die;
            return false;
        }
    }

    public function getListeContact() {
        $res = Array();
		$query ="SELECT * FROM " . self::TABLE_CONTACT;
		if($mrResultat = $this->_db->query($query))
		{
			while($contact = $mrResultat->fetch_assoc())
			{
				foreach($contact as $cle=> $valeur)
				{
					$contact[$cle] = (utf8_decode($valeur));
				}
				$res[] = $contact;
			}
		}
		return $res;  
    }

    function filtre($variable)
    {
        $varFiltre = $this->_db->real_escape_string($variable);
        $varFiltre=htmlspecialchars($varFiltre);
        //ici, on pourrait appliquer d'autres filtres.... (ex: strip_tags qui enlèverait les tags HTML dans un texte...)
        return $varFiltre;
    }
}

?>