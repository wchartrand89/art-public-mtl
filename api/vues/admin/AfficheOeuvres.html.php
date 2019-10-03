	
		 
		 	<aside id="menu_aside">
				<a id="menu_oeuvre" href=""><img src="../../img/icons/image.svg" alt="icon image"><p class="text_menu">Oeuvres</p></a>
				<a id="menu_artistes" href=""><img src="../../img/icons/palette.svg" alt="icon image"><p class="text_menu">Artistes</p></a>
				<a id="menu_utilisateurs" href=""><img src="../../img/icons/person.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
			</aside>
			<section class="contenu_listeOeuvres">
				<section class="recherche">
					<form action="">
						<div class=bar_image>
							<input id="bar_recherche" type="text" name="recherche" value="Recherche une oeuvre">
							<img id="img_recherche" src="../../img/icons/search_40px.svg" alt="search">
						</div>						
						<input id="btn_submit" type="submit" name="submit" value="+ Ajouter une oeuvre">
						
					</form>
				</section>
				<section class="nomChamp">
					<P>TITRE</P>
					<P>ARTISTE</P>
					<P>ARRONDISSEMENT</P>
					<p></p>
				</section>
				<section id="liste_oeuvres" class="oeuvres flex flex-col">
					<?php
					foreach ($aData as $cle => $oeuvre) {
						extract($oeuvre);
					
						?>

						<div class="info_oeuvre">
							<p><?php echo $Titre ?></p>
							<p><?php echo $artiste ?></p>
							<p><?php echo $Arrondissement ?></p>
							<span>
								<a href=""><img src="" alt="Modifier"></a>
								<a href=""><img src="" alt="Supprimer"></a>
							</span>

						</div>
						<!-- <div class="bar_titre">
							<span class="titre"><?php echo $Titre ?></span>
							<div id="images">
								<img id="img_modifier" src="../../img/icons/image.svg" alt="Modifier">
								<img id="img_supprimer" src="../../img/icons/image.svg" alt="Supprimer">
							</div>

						</div> -->
						<!-- <section class="info_oeuvre">
							<div class="columns" id="column_1">										
								<span>
									<p>Categorie</p>
									<p><?php echo $categorie?></p>
								</span>
								<span>
									<p>Matériaux</p>
									<p><?php echo $Materiau?></p>
								</span>
								<span>
									<p>Technique</p>
									<p><?php echo $Technique?></p>
								</span>
								<span>
									<p>Dimensions</p>
									<p><?php echo $Dimensions?></p>
								</span>
							</div>
							<div class="columns" id="column_2">										
								<span>
									<p>Arrondisement</p>
									<p><?php echo $Arrondissement ?></p>
								</span>
								<span>
									<p>Batiment</p>
									<p><?php echo $Batiment ?></p>
								</span>
								<span>
									<p>Adresse civique</p>
									<p><?php echo $AdresseCivique?></p>
								</span>
								<span>
									<p>Date création</p>
									<p><?php echo $DateCreation?></p>
								</span>
							</div>
							
							
						</section> -->
						
						
						<?php
					}
					?>
				</section>
					
			</section>
				<!-- <span class="titre"><?php //echo $Titre ?> - </span>
				<span class ="description"> <?php //echo $Description ?> - </span>
				<span class="arrondissement"><?php //echo $Arrondissement ?></span>
				<span class="action flex-droite"><a href="/art-public-mtl/api/admin/oeuvre/<?php //echo $id_oeuvre ?>/modifier">[Modifier l'oeuvre]</a></span>
				<span class="action flex-droite"><a href="/art-public-mtl/api/admin/oeuvre/<?php //echo $id_oeuvre ?>/supprimer">[Supprimer]</a></span>
								 -->
			
