<?php
/**
 * Fichier de configuration. Il est appelé par index.php et par test/index.php
 * Il contient notamment l'autoloader
 * @author Jonathan Martel
 * @version 1.0
 * @update 2016-03-03
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
//	echo $_SERVER["HTTP_HOST"];

	if($_SERVER["HTTP_HOST"] == "127.0.0.1:8000" || $_SERVER["HTTP_HOST"] == "localhost")
	{
		define('BASE_URL', 'http://127.0.0.1:8000/art-public-mtl/');	
	}
	else {
		define('BASE_URL', 'http://artpublicmtl.ceciliaflores.ca/art-public-mtl/');	
	}
		
	
	include_once('db_info.php');
	
	function mon_autoloader($class) 
	{
		$dossierClasse = array('modeles/', 'vues/', 'lib/', 'lib/mysql/', './controlleurs/', '../modeles/', '../vues/', '../lib/' , '../lib/mysql/', '../controlleurs/', '../', '' );	// Ajouter les dossiers au besoin
		
		foreach ($dossierClasse as $dossier) 
		{
			
			if(file_exists($dossier.$class.'.class.php'))
			{					
				require_once($dossier.$class.'.class.php');
				//echo "trouvé : ";
				//var_dump($dossier.$class.'.class.php');
				return;
			}
		}
		
	  
	}
	
    function cookie(){
        if(isset($_GET["lang"]))                                 //DÉTECTION DU PARAM GET LANG
        {                                                        //SI SET ON CRÉÉ LE COOKIE
            $lang = $_GET["lang"];
            setcookie('lang', $lang, time() + (365*24*60*60)); 

        }
        else                                                     //SI PAS DE PARAM GET
        {
            if(isset($_COOKIE["lang"]))                          //TEST LE COOKIE
            {
                $lang = $_COOKIE["lang"];                        //SI SET ON SET LA LANGUE
                            setcookie('lang', $lang, time() + (365*24*60*60)); 

            }
            else                                                 //AFFICHAGE PAR DÉFAULT EN FR
            {
                $lang = "FR"; 
                            setcookie('lang', $lang, time() + (365*24*60*60)); 

            }
        }

        if($lang=="FR")                                          //UPLOAD DU DOC XML EN FRANCAIS
        {
            $document = new DOMDocument();
            $document->validateOnParse = true;
            $document->load("../xml/FR.xml");
        }
        else if($lang=="EN")                                     //UPLAUD DU DOC XML EN ANGLAIS
        {
            $document = new DOMDocument();
            $document->validateOnParse = true;
            $document->load("../xml/EN.xml");
        }
        
        return $document;


    }

	spl_autoload_register('mon_autoloader');
	
?>