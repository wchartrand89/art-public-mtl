<?php
/**
 * Class Type
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2016-11-25
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 * 
 * 
 */
class User extends Modele {	
	const TABLE_TYPE = "user";

		
	/**
	 * Retourne la liste des sous catégories
	 * @access public
	 * @return Array
	 */
	public function getInfosUser($user) 
	{
		$res = Array();
		$query = "select * from ". self::TABLE_TYPE. " WHERE login='$user'";
        $result =$this->_db->query($query);
        $res = $result->fetch_assoc();
        return $res;
	}
	
    public function modificationPW($oldPw, $newPW)
    {
        $newPW=$this->filtre($newPW);
        $newPW=password_hash($newPW, PASSWORD_DEFAULT);
        $user=$_SESSION['username'];
        
        if($newPW==$oldPW){
            return 'Votre ancien et nouveau mot de passe sont identiques.';
        }
        
    
        $request="UPDATE user
        SET password ='$newPW'
        WHERE login='$user'";
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
        
    public function verificationMail($mail)
    {
        $mail=$this->filtre($mail);
        
        //verifie si l'adresse existe
        $query = "select courriel from ". self::TABLE_TYPE. " WHERE courriel='$mail'";
        $result =$this->_db->query($query);
        $rows=$result->num_rows;
        
        // si l'adresse existe deja renvoie true sinon false
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }
        
    public function verificationLogin($login)
    {
        $login=$this->filtre($login);
        
        $query = "select login from ". self::TABLE_TYPE. " WHERE login='$login'";
        $result =$this->_db->query($query);
        $rows=$result->num_rows;
        
        // si l'adresse existe deja renvoie true sinon false
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }
    
    public function inscriptionUser($login, $pw, $mail)
    {
        
        //filtre 
        $login=$this->filtre($login);
        $pw=$this->filtre($pw);
        $mail=$this->filtre($mail);
        
        //hash password
        $pw=password_hash($pw, PASSWORD_DEFAULT);
        
        //requete
        $request="INSERT INTO user (login, password, courriel, role) VALUES ('$login', '$pw', '$mail', 'usager')";
    
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
    
    
     // @author fred
    // filtre les strings pour empecher les injections SQL + XSS attack
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