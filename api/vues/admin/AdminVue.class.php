<?php
/**
 * Class Vue
 * Modèle de classe Vue. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.1
 * @update 2013-12-11
 * @update 2016-01-22 : Adaptation du code aux standards de codage du département de TIM
 * @license MIT
 * @license http://opensource.org/licenses/MIT
 * 
 */


class AdminVue {

/**
	 * Affiche le head html
	 * @access public
	 * @return void
	 */


	/**
	 * Affiche entetes
	 * @access public
	 * @return void
	 */
	public function afficheEntete() {
		?>
	<body>
	    <main>
	        <header class="appbar">
	            <h1><a href="/art-public-mtl/api/admin">ART PUBLIC MONTREAL - ADMINISTRATEUR</a></h1> 
	        </header>
			
		<?php
		
	}


	/**
	 * Affiche le pied de page
	 * @access public
	 * @return void
	 */

	

	
	/**
	 * Affiche la liste des oeuvres
	 * @access public
	 * @return void
	 */
	public function afficheOeuvres($aData = Array()) {
		
		?>
		 <section class="contenu listeOeuvres">
         	<section class="recherche"></section>
            <section class="oeuvres flex flex-col">
						<?php
						foreach ($aData as $cle => $oeuvre) {
							extract($oeuvre);
                           
							?>
							<section class="oeuvre flex flex-row">
			                    <span class="titre"><?php echo $Titre ?> - </span>
			                    <span class ="description"> <?php echo $Description ?> - </span>
			                    <span class="arrondissement"><?php echo $Arrondissement ?></span>
		                    <span class="action flex-droite"><a href="/art-public-mtl/api/admin/oeuvre/modifier/<?php echo $id_oeuvre ?>">[Modifier l'oeuvre]</a></span>
		                    <span class="action flex-droite"><a href="/art-public-mtl/api/admin/oeuvre/supprimer/<?php echo $id_oeuvre ?>">[Supprimer]</a></span>
			                    
			                </section>

							<?php
						}
						?>
					</section>
				
			</section>
			
		<?php
		
	}
    /**
	 * Affiche une oeuvre
	 * @access public
	 * @return void
	 */
	public function afficheOeuvre($aData = Array()) {
		
		?>
		 <section class="contenu listeOeuvres">
         	<section class="recherche"></section>
            <section class="oeuvres flex flex-col">
						<?php
                        

							extract($aData);
                            
							?>
                            
                            
                
							<section class="oeuvre flex flex-row">
                                <form method="post" action="">
                                
			                    <p class="titre" name="Titre" >Titre : <?php echo $Titre ?></p>

                                <p class="arrondissement" > Arrondissement : <?php echo $Arrondissement ?></p>
			                     Description : <input type="text" name="Description" class="description" value="<?php echo $Description ?>"><br>
			                    
			                     
			                    <input type="submit" value="Modifier">
			                    </form>
			                </section>

					</section>
				
			</section>
			
		<?php
		
	}
    
	public function afficheConnexion() {
		
		?>

            <form id='connexion' action="?controller=authentification&action=connexionPost" method="post">	
                <div>
                    <label for="name">Nom d'usager:</label>
                    <input type="text" id="name" name="login">
                </div>
                <div>
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" id="mdp" name="mdp">
                </div>
                <div>
                    <input type="submit" id="envoyer" value="Se connecter">
                </div>		
            </form>
			
		<?php
		
	}
    
    
    public function afficheFormulaireModification() {
		
		?>

            <form id='modification' action="?controller=authentification&action=connexionPost" method="post">	
                <div>
                    <label for="name">ID</label>
                    <input type="text" name="ID" value="ton_pseudo" readonly/>
                </div>
                <div>
                    <label for="titre">Titre</label>
                    <input type="text" value="" id="Titre">
                </div>                
                <div>
                    <label for="titre">NomCollection</label>
                    <input type="text" value="" id="NomCollection">
                </div>                
                <div>
                    <label for="titre">NomCollectionAng</label>
                    <input type="text" value="" id="NomCollectionAng">
                </div>                
                <div>
                    <label for="titre">Technique</label>
                    <input type="text" value="" id="Technique">
                </div>                
                <div>
                    <label for="titre">TechniqueAng</label>
                    <input type="text" value="" id="TechniqueAng">
                </div>                
                <div>
                    <label for="titre">Dimensions</label>
                    <input type="text" value="" id="Dimensions" readonly>
                </div>                
                <div>
                    <label for="titre">Arrondissement</label>
                    <input type="text" value="" id="Arrondissement">
                </div>
                <div>
                    <label for="titre">Batiment</label>
                    <input type="text" value="" id="Batiment">
                </div>
                <div>
                    <label for="titre">AdresseCivique</label>
                    <input type="text" value="" id="AdresseCivique">
                </div>
                <div>
                    <label for="titre">CoordonneeLatitude</label>
                    <input type="text" value="" id="CoordonneeLatitude">
                </div>
                <div>
                    <label for="titre">CoordonneeLongitude</label>
                    <input type="text" value="" id="CoordonneeLongitude">
                </div>
                <div>
                    <label for="titre">dateCreation</label>
                    <input type="text" value="" id="dateCreation">
                </div>
                <div>
                    <input type="submit" id="envoyer" value="Modifier">
                </div>		
            </form>
        

		<?php
		
	}
	
	public function afficheMenuAdmin() { //location temporaire
		
		?>
		<section id="menuadmin">
			<h2 id="textMenuAdmin">Menu administrateur</h2>
			<div id = "fieldset">
				<fieldset>
					<legend><p id="textlegend">OEUVRES</p></legend>
                    <a href="/art-public-mtl/api/admin/oeuvre">Voir les oeuvres</a>
				</fieldset>
				<fieldset>
					<legend><p id="textlegend">ARTISTES</p></legend>
						<a href="">Modifier</a><br>
						<a href="">Supprimer</a>
				</fieldset>
			</div>
			<div id = "fieldset">
				<fieldset>
					<legend><p id="textlegend">PARCOURS</p></legend>
						<a href="">Ajouter</a><br>
						<a href="">Modifier</a><br>
						<a href="">Supprimer</a>
				</fieldset>
				<fieldset>
					<legend><p id="textlegend">ADMINISTRATEUR</p></legend>
						<a href="">Ajouter</a><br>
						<a href="">Modifier</a><br>
						<a href="">Supprimer</a>
				</fieldset>
			</div>
		</section>    
			
		<?php
		
	}

}
?>