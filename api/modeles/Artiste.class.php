<?php
/**
 * Class Oeuvre
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
class Artiste extends Modele {	
	const TABLE_ARTISTE = "artiste";
	const TABLE_LIAISON_ARTISTE_OEUVRE = "artiste_oeuvre";
		
	/**
	 * Retourne la liste des oeuvres
	 * @access public
	 * @return Array
	 */
	public function getListe() 
	{
		$res = Array();		
		//trier les artistes par lettre nom famille
		$query = "select * from ". self::TABLE_ARTISTE ." ORDER BY Nom, NomCollectif";
		if($mrResultat = $this->_db->query($query))
		{
			while($artiste = $mrResultat->fetch_assoc())
			{
				foreach($artiste as $cle=> $valeur)
				{
					$artiste[$cle] = utf8_decode(utf8_encode($valeur));
				}
				$res[] = $artiste;
			}
		}
		return $res;
	}
	
	/**
	 * Récupère une oeuvre avec son id
	 * @access public
	 * @param int $id Identifiant de l'oeuvre
	 * @return Array
	 */
	public function getArtiste($id) 
	{
		$res = Array();
		if($mrResultat = $this->_db->query("select * from ". self::TABLE_ARTISTE." where id_artiste=". $id))
		{
			$res = $mrResultat->fetch_assoc();
		}
		return $res;
	}
    
    // @author fred
    public function creerArtisteOeuvre($array)
    {
        $nom=$this->filtre($array["nom"]);
        $prenom=$this->filtre($array["prenom"]);
        $ID=$this->filtre($array["ID"]);
        //ajouter l'artiste
        $query = "INSERT INTO artiste (Nom, Prenom)
                  VALUES ('$nom', '$prenom')";
        $result = $this->_db->query($query);
        // si l'insertion a bien été faite, alors on veut faire le lien entre l'artiste et l'oeuvre
        if($result===true){
             $request = "INSERT INTO artiste_oeuvre(id_artiste, id_oeuvre) VALUES((SELECT MAX(id_artiste) FROM artiste), $ID)";
            $result = $this->_db->query($request);
        }
        return $result;
    }
    
      // @author fred
     public function modifierArtiste($array)
     {
    
    //filtre tous les elements du tableau
    $nom=@$this->filtre($array["nom"]);
    $id_artiste=$this->filtre($array["id_artiste"]);
    $ID=$this->filtre($array["ID"]);
    $prenom=@$this->filtre($array["prenom"]);
    $nomCollectif=@$this->filtre($array["nomCollectif"]);

        //si les conditions des champs sont bien respectés
         if(isset($id_artiste))
         {
             // si artiste  rempli
             if(isset($nom) && is_string($nom) && $nom!="" && isset($prenom) && is_string($prenom) && $prenom!="" && is_numeric($id_artiste))
             {
                //requete
                $request="UPDATE artiste
                        SET Nom = '$nom', Prenom ='$prenom' WHERE id_artiste='$id_artiste';";
    
                        //execute requete
                        $result = $this->_db->query($request);
                        //var_dump($result);
                        if ($result !== FALSE) 
                        {
                            return true;              
                        }
                        else 
                        {
                            return "wrong code";
                        }
            }
            
             // si nom Collectif rempli
             if( is_string($nomCollectif)  && is_numeric($id_artiste) &&  $nomCollectif!="")
             {
                //requete
                $request="UPDATE artiste
                        SET NomCollectif = '$nomCollectif' WHERE id_artiste='$id_artiste';";
    
                        //execute requete
                        $result = $this->_db->query($request);
                        //var_dump($result);
                        if ($result !== FALSE) 
                        {
                            return true;              
                        }
                        else 
                        {
                            return "wrong code";
                        }
             }
         }
        //si conditions non respectés refresh la page et msg erreur
        else
        {
            header("Location: /art-public-mtl/api/admin/oeuvre/".$ID."/modifier");
            echo "Veuillez vérifiez vos champs. Vous ne pouvez entrez des caractères dans les coordonnées ou des chiffres dans les techniques !";
        }
        

    }
    
    //author fred
     public function ajoutArtiste($array){

    
    //filtre tous les elements du tableau
    $nom=@$this->filtre($array["nom"]);
    $prenom=@$this->filtre($array["prenom"]);
    $nomCollectif=@$this->filtre($array["nomCollectif"]);
    $description=@$this->filtre($array["description"]);
    $siteWeb=@$this->filtre($array["siteWeb"]);
 
         
    $request = "SELECT * FROM artiste WHERE Nom='$nom' AND Prenom='$prenom' AND NomCollectif='$nomCollectif'";
    $result = $this->_db->query($request);
    $rows=$result->num_rows;
    $exist=$result->fetch_assoc();
    //s'il existe alors ne pas l'ajouté
    if ($rows>0) {
        return true;
    }
         
             // si artiste  rempli
//             if(isset($nom) && is_string($nom) && $nom!="" && isset($prenom) && is_string($prenom) && $prenom!="" && $nomCollectif=="")
//             {
                //requete
                $request="INSERT INTO artiste(Nom, Prenom, NomCollectif, Description, site_web)
                        VALUES('$nom','$prenom','$nomCollectif', '$description','$siteWeb');";
    
                        //execute requete
                        $result = $this->_db->query($request);
                        //var_dump($result);
                        if ($result !== FALSE) 
                        {
                            return true;              
                        }
                        else 
                        {
                            return "wrong code";
                        }
//            }
            
//             // si nom Collectif rempli
//             else if( is_string($nomCollectif)  &&  $nomCollectif!="" && $nom=="" && $prenom=="")
//             {
//                //requete
//                $request="INSERT INTO artiste(Nom, Prenom, NomCollectif)
//                        VALUES('','','$nomCollectif');";
//    
//                        //execute requete
//                        $result = $this->_db->query($request);
//                        //var_dump($result);
//                        if ($result !== FALSE) 
//                        {
//                            return true;              
//                        }
//                        else 
//                        {
//                            return "wrong code";
//                        }
//             }
//            //si les deux sont remplis
//            else if (is_string($nomCollectif)  &&  $nomCollectif!="" && isset($nom) && is_string($nom) && $nom!="" && isset($prenom) && is_string($prenom) && $prenom!=""){
//                //requete
//                $request="INSERT INTO artiste(Nom, Prenom, NomCollectif)
//                        VALUES('$nom','$prenom','$nomCollectif');";
//    
//                        //execute requete
//                        $result = $this->_db->query($request);
//                        //var_dump($result);
//                        if ($result !== FALSE) 
//                        {
//                            return true;              
//                        }
//                        else 
//                        {
//                            return "wrong code";
//                        }
//            }
         
        

    }
    
    
    public function ajoutLienArtisteOeuvre($array){
        
            //filtre tous les elements du tableau
    $nom=@$this->filtre($array["nom"]);
    $prenom=@$this->filtre($array["prenom"]);
    $nomCollectif=@$this->filtre($array["nomCollectif"]);
        
            $request = "SELECT * FROM artiste WHERE Nom='$nom' AND Prenom='$prenom' AND NomCollectif='$nomCollectif'";
            $result = $this->_db->query($request);
            $rows=$result->num_rows;
            $exist=$result->fetch_assoc();
            //s'il existe alors faire le lien entre artiste existant et oeuvre ajoutée
        if ($rows>0) 
        {
            $id_artiste=$exist["id_artiste"];

             $request = "INSERT INTO artiste_oeuvre(id_artiste, id_oeuvre) VALUES('$id_artiste', (SELECT MAX(id_oeuvre) FROM oeuvre))";
            $result = $this->_db->query($request);
    
                 if ($result !== FALSE) 
                    {
                        return true;              
                    }
                    else 
                    {
                        return "wrong code";
                    }
        }
        // sil nexiste pas alors le dernier artiste ajouté est l'artiste de l'oeuvre
        else
        {  
            $request = "INSERT INTO artiste_oeuvre(id_artiste, id_oeuvre) VALUES((SELECT MAX(id_artiste) FROM artiste), (SELECT MAX(id_oeuvre) FROM oeuvre))";
            $result = $this->_db->query($request);
        
                     if ($result !== FALSE) 
                        {
                            return true;              
                        }
                        else 
                        {
                            return "wrong code";
                        }
                
        }
        
          
    }
    
    
    
      // @author fred
	   function filtre($variable)
    {
        $varFiltre = $this->_db->real_escape_string($variable);
        $varFiltre=htmlspecialchars($varFiltre);
        $varFiltre=utf8_decode($varFiltre);
        //ici, on pourrait appliquer d'autres filtres.... (ex: strip_tags qui enlèverait les tags HTML dans un texte...)
        return $varFiltre;
    }
}




?>