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
	public function afficheHead() {
		?>
		<!DOCTYPE html>
		<html lang="fr">
		
		<head>
		    <title>L'art public à Montréal - admin</title>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		    <meta name="description" content="">
		    <meta name="viewport" content="width=device-width">
		    
		    <link rel="stylesheet" href="<?php echo "./css/flex.css"?>" type="text/css" media="screen">
		    <link rel="stylesheet" href="<?php echo "./css/adminmain.css"?>" type="text/css" media="screen">
		    
		    <script src="./js/define.js"></script>
		    <script src="./js/admin.js"></script>
		</head>
		<?php
		
	}

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
	            <h1><a href="/art-public-mtl/api/admin/accueil">L'art public à Montréal (Admin)</a></h1> 
	        </header>
			
		<?php
		
	}


	/**
	 * Affiche le pied de page
	 * @access public
	 * @return void
	 */
	public function affichePied() {
		?>
	
			<footer>
				Certains droits réservés @ Jonathan Martel (2019)<br>
				Sous licence Creative Commons (BY-NC 3.0)
			</footer>
		</main>
	</body>
</html>

		<?php
		
	}
	

	
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
		                    <span class="action flex-droite"><!--	<a href="/art-public-mtl/api/admin/oeuvre/<?php echo $id ?>">[x]</a>--> <a href="/art-public-mtl/api/admin/oeuvre/<?php echo $id ?>">[Modifier descripion]</a></span>
			                    
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

            <form action="?controller=authentification&action=connexionPost" method="post">	
                <div>
                    <label for="name">Nom d'usager:</label>
                    <input type="text" id="name" name="login">
                </div>
                <div>
                    <label for="mdp">Mot de passe:</label>
                    <input type="mdp" id="mdp" name="mdp">
                </div>
                <div>
                    <input type="submit" id="envoyer" value="Se connecter">
                </div>		
            </form>
			
		<?php
		
	}

}
?>