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
class Type extends Modele {	
	const TABLE_TYPE = "sous_categorie";

		
	/**
	 * Retourne la liste des sous catégories
	 * @access public
	 * @return Array
	 */
	public function getListe() 
	{
		$res = Array();
		$query = "select * from ". self::TABLE_TYPE. " ORDER BY Nom";
		if($mrResultat = $this->_db->query($query))
		{
			while($type = $mrResultat->fetch_assoc())
			{
				$res[] = $type;
			}
		}
		return $res;
	}
	
}




?>