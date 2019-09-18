<?php
/**
 * Controlleur de la ressource Artiste
 * 
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2016-11-16
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 */
 
 /*
 * 
 *
 */

 
 
class ArtisteControlleur extends Controlleur 
{
	
	// GET : 
	// 		/artiste/ - Liste des oeuvres
	// 		/artiste/{id}/ - Une oeuvre
	// 		/artiste/?q=nom,prenom,etc&valeur=chaineDeRecherche
	
	public function getAction(Requete $requete)
	{

		$res = array();
		// var_dump($requete->url_elements[0]);
		//POUR TEST CSS
		$oVue = new Vue();

		$oVue->afficheHead($requete->url_elements[0]);
		$oVue->afficheEntete();
		?>
		<aside class="choix">
			<p class="lettre">A</p>
			<p class="lettre">B</p>
			<div class=" lettre lettreChoisie">
				<a class="fleches prev">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg></a>
				<p class="lettre">C</p>
				<a class="fleches next">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/><path d="M0 0h24v24H0z" fill="none"/></svg></a>
			</div>
			
			<p class="lettre">D</p>
			<p class="lettre">E</p>
			<p class="lettre">F</p>
			<p class="lettre">G</p>
		
		</aside>
		<section class="liste">
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERSFJGKG NV, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
			<a class="lienArtiste" href="">DANGERS, Manon</a>
		</section>

			<?php
			$oVue->affichePied();
		



		die;
		//FIN TEST

		if(isset($requete->url_elements[0]) && is_numeric($requete->url_elements[0]))	// Normalement l'id de l'artiste 
		{
            $id_artiste = (int)$requete->url_elements[0];
            
            $res = $this->getArtiste($id_artiste);
            
        } 
        else 	// Liste des artistes
        {
        	$res = $this->getListeArtiste();
			
        }
		
		if(isset($_GET['json']))
		{
			echo json_encode($res);	
		}
		else
		{
				
			
			$oVue = new Vue();
			$oVue->afficheEntete();
			if(isset($requete->url_elements[0]) && is_numeric($requete->url_elements[0]))
			{
				//var_dump($res);
				$oVue->afficheArtiste($res);	
			}
			else
			{
				$oVue->afficheArtistes($res);
			}	
			
			$oVue->affichePied();
			
		}
			
		
		
	}
	
	
	
	
		
	protected function getArtiste($id_artiste)
	{
		$oArtiste= new Artiste();
		$aArtiste = $oArtiste->getArtiste($id_artiste);
		$oOeuvre = new Oeuvre();
		$aArtiste['oeuvres'] = $oOeuvre->getOeuvresParArtiste($id_artiste);
		
		return $aArtiste;
	}
	
	protected function getListeArtiste()
	{
		
		$oArtiste= new Artiste();
		$aArtiste = $oArtiste->getListe();
		
		return $aArtiste;
	}
	
	
	
}
?>