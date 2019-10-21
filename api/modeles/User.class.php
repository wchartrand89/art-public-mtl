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
    
}




?>