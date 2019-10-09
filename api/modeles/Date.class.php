<?php
/**
 * Class Date
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
class Date extends Modele {	
	const TABLE_OEUVRE = "oeuvre";
	const COL_DATE = "dateCreation";

		
	/**
	 * Retourne la liste des dates des oeuvres
	 * @access public
	 * @return Array
	 */
	public function getListe() 
	{
		$res = Array();
		$query = "select ". self::COL_DATE ." from ". self::TABLE_OEUVRE;
		if($mrResultat = $this->_db->query($query))
		{
			while($date = $mrResultat->fetch_assoc())
			{
				$res[] = $date;
			}
		}
		return $res;
	}
	
}




?>