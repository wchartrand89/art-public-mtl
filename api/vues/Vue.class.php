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


class Vue {

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
		    <title>L'art public à Montréal</title>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		    <meta name="description" content="">
		    <meta name="viewport" content="width=device-width">
			<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
			<link rel="stylesheet" href="../css/var.css" type="text/css" media="screen">
			<link rel="stylesheet" href="../css/header.css" type="text/css" media="screen">
			<link rel="stylesheet" href="../css/flex.css" type="text/css" media="screen">
		    <link rel="stylesheet" href="../css/main.css" type="text/css" media="screen">
		    <!--<script src="../../js/plugins.js"></script>-->
		    <script src="../js/main.js"></script>
		    <script src="../js/menu.js"></script>

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
	        <header class="appbar">

	            <a class="logo" href="/art-public-mtl/api/"><img src="../img/icons/logoAP.png" alt="Logo Art public Montréal"></a>
				<div class="icons">
					<a class="langue hidden" href="#">EN</a>
					<a class="search" href="#"><img src="../img/icons/search_40px.svg" alt="Icone de recherche"></a>
					<a class="menuCubes" href="#"><img src="../img/icons/menu.svg" alt="Icone d'ouverture du menu"></a>
					<a class="fermerMenu hidden" href="#"><img src="../img/icons/close.svg" alt="Icone de fermeture du menu"></a>
				</div>
				<nav class="menu hidden">
					<a class="lien" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/>
					<path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
						<p>Oeuvres</p>
					</a>
					<a class="lien" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
						<p>Artistes</p>
					</a>
					<a class="lien" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
					<path d="M21.71 11.29l-9-9c-.39-.39-1.02-.39-1.41 0l-9 9c-.39.39-.39 1.02 0 1.41l9 9c.39.39 1.02.39 1.41 0l9-9c.39-.38.39-1.01 0-1.41zM14 14.5V12h-4v3H8v-4c0-.55.45-1 1-1h5V7.5l3.5 3.5-3.5 3.5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
						<p>Parcours</p>
					</a>
					<a class="lien" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/>
					<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
						<p>À propos</p>
					</a>
					<a class="lien" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
						<p>Contact</p>
					</a>
					<a class="lien" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>						
						<p>Compte</p>
					</a>
				</nav>	
			</header>
			<main>
			
		<?php
		
	}


	/**
	 * Affiche le pied de page
	 * @access public
	 * @return void
	 */
	public function affichePied() {
		?>
			</main>
			<footer>
				Certains droits réservés @ Jonathan Martel (2019)<br>
				Sous licence Creative Commons (BY-NC 3.0)
			</footer>
		
	</body>
</html>

		<?php
		
	}
	

	/**
	 * Affiche la page d'accueil
	 * @access public
	 * @return void
	 */
	public function afficheAccueil() {
		
		?>
		<section class="contenu listeOeuvres">
			<h1>Bienvenue sur le site Art public Montréal</h1>
			<ul>
				<li><a href="/art-public-mtl/api/oeuvre">Voir les oeuvres</a></li>
				<li><a href="/art-public-mtl/api/artiste">Voir les artistes</a></li>
			</ul>
		</section>
			
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
            <section class="oeuvres flex wrap">
						<?php
        
//        echo '<pre>';
//print_r($aData);
//echo '</pre>';
						foreach ($aData as $cle => $oeuvre) {
							extract($oeuvre);
							?>
							<section class="oeuvre carte">
			                    <header class="image dummy">
			                        <h2 class="titre"><?php echo $Titre?></h2> 
			                    </header>
			                    <section class="texte">
			                        <p class="description">
			                            <?php echo $Description ?> 
									</p>
									<?php 
									foreach($Artistes as $artiste){
										extract($artiste);
										?>
										<p class="auteur">Par : <a href="artiste/<?php echo $id_artiste ?>">
                           <?php 
                            if(isset($Nom) && $Nom!=""){
                                echo $Nom .", ". $Prenom;
                     
                            }
                            else
                            {
                                echo $NomCollectif;
                        
                            }
                                
                                
                                        ?></a></p>
									<?php
									}

									?>
			                        <p class="arrondissement"><?php echo $Arrondissement?></p>
			                    </section>
			                    <footer class="barre-action">
								<a class="ouvrir-oeuvre" href="oeuvre/<?php echo $id ?>" data-link="/artPublic/api/oeuvre/<?php echo $id ?>/" data-id="<?php echo $id ?>">En savoir plus...</a>	
								<!--<button class="ouvrir-oeuvre" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>">En savoir plus...</button>-->
			                    </footer>
			                </section>
							
							
							
							
							
							<?php
							/*
							 <section class="oeuvre">
								<h2 class="titre"><a href="/artPublic/api/oeuvre/<?php echo $oeuvre['id'] ?>"><?php echo $oeuvre['Titre']?></a></h2>	
							</section>
							 */
						}
						?>
					</section>
				
			</section>
			
		<?php
		
	}

	/**
	 * Affiche le détails d'une oeuvre
	 * @access public
	 * @return void
	 */
	public function afficheOeuvre($aData = Array()) {
		extract($aData);
		?>
		 <section class="contenu uneOeuvre flex flex-col">
		 	<section class="retour"><a href="/art-public-mtl/api/oeuvre"> Retour à la liste  </a></section>
            <section class="oeuvre flex wrap">
                <header class="image dummy">
                	<img src="/art-public-mtl/img/placeholder_640_480.jpg" />
                    <h2 class="titre"><?php echo $Titre?></h2>
                </header>
                    
                        
                <section class="texte">
					<p class="description"><?php echo $Description ?></p>
						<?php
           
						foreach($Artistes as $artiste){
							extract($artiste);
							?>
							<p class="auteur">Par : <a href="/art-public-mtl/api/artiste/<?php echo $id_artiste ?>"><?php 
                                    if(isset($Nom) && $Nom!=""){
                                echo $Nom .", ". $Prenom;
                            
                            }
                            else
                            {
                                echo $NomCollectif;
                            
                            }
                                
                                
                                        ?></a></p>
						<?php
						}

						?>
                   
			    	<p class="arrondissement"><?php echo $Arrondissement?></p>
                </section>
                
            </section>

        </section>
        
							
			
		<?php
		
	}


	/**
	 * Affiche la liste des artistes
	 * @access public
	 * @return void
	 */
	public function afficheArtistes($aData = Array()) {
		
		?>
		 <section class="contenu listeArtiste">
            <section class="oeuvres flex wrap">
						<?php
						foreach ($aData as $cle => $artiste) {
							extract($artiste);
							?>
							<section class="artiste carte">
			                    <header class="">
			                        <h2 class="nom"><?php 
                              if(isset($Nom) && $Nom!=""){
                                echo $Nom .", ". $Prenom;
                            }
                            else
                            {
                                echo $NomCollectif;
                            }
                                
                                
                                        ?>
                                        </h2> 
			                    </header>
			                    <footer class="barre-action">
								<a class="ouvrir-oeuvre" href="artiste/<?php echo $id_artiste ?>" >En savoir plus...</a>	
								
			                    </footer>
			                </section>
							<?php
						}
						?>
					</section>
				
			</section>
			
		<?php
						
	}


/**
	 * Affiche le détails d'un artiste
	 * @access public
	 * @return void
	 */
	public function afficheArtiste($aData = Array()) {
		extract($aData);
		?>
		 <section class="contenu uneOeuvre flex flex-col">
		 	
            <section class="artiste flex wrap">
                <header class="">
                    <h2 class="nom"><?php echo $Nom .", ". $Prenom?></h2>
                </header>
            </section>

        </section>
			
		<?php
		
	}


}
?>