
		 
		 	<aside id="menu_aside">
				<a id="menu_oeuvre" href="/art-public-mtl/api/admin/oeuvre"><img src="../../img/icons/imageBlanch.svg" alt="icon image"><p class="text_menu">Oeuvres</p></a>
				<a id="menu_artistes" href="/art-public-mtl/api/admin/artiste"><img src="../../img/icons/paletteBlanch.svg" alt="icon image"><p id="menuArtistes" class="text_menu">Artistes</p></a>
				<a id="menu_utilisateurs" href="/art-public-mtl/api/admin/utilisateur"><img src="../../img/icons/personBlanch.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
				<a id="menu_contact" href="/art-public-mtl/api/admin/contact"><img src="../../img/icons/comment.png" alt="icon image"><p class="text_menu">Commentaires</p></a>
			</aside>
			<section class="contenu_listeOeuvres">
				<section class="recherche">
					<form action="">
						<div class=bar_image>
							<input id="bar_recherche" type="text" name="recherche" placeholder="Recherche un nom">
							<img id="img_recherche" src="../../img/icons/search_40px.svg" alt="search">
						</div>	
                       <p><?php if(isset($_GET['update']) && $_GET['update']=="error") echo "Une erreur est survenue, veuillez vérifiez vos champs."; ?></p>					
                        <a href="/art-public-mtl/api/admin/artiste/ajout" id="btn_submit" alt="ajout"><img src="../../img/icons/plus.png" alt=""><p>Ajouter un artiste</p></a>		
					</form>
					
				</section>
				<section class="nomsChamps">
					<P>NOM</P>
					<P>PRENOM</P>
					<P>NOM COLLECTIF</P>
					<p></p>
				</section>
				<section id="liste_oeuvres" class="oeuvres flex flex-col">
					<?php
					$compt=0;
					foreach ($aData as $cle => $artiste) {
						extract($artiste);  
						++$compt;
											
					?>

						<div class="info_oeuvre">
							<p class="valeur_info_oeuvre filtrer"><?php echo $Nom; ?></p>
							<p class="valeur_info_oeuvre"><?php echo $Prenom; ?></p>
							<p class="valeur_info_oeuvre filtrer"><?php echo $NomCollectif; ?></p>
							<span class="valeur_info_oeuvre">
								<a href="/art-public-mtl/api/admin/artiste/<?php echo $id_artiste ?>/modifier"><img id='crayon' src="../../img/icons/crayon.svg" alt="Modifier"></a>
								<a data-href="/art-public-mtl/api/admin/artiste/<?php echo $id_artiste ?>/supprimer" class="modalPopup" onclick="handle(this);"><img id='poubelle' src="../../img/icons/poubelle.svg" alt="Supprimer"></a>
							</span>

						</div>
						
						<?php
					}
					?>	
						
				</section>
					
			</section>
                       
                       <!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="confirm-buttons">
    <p>Etes-vous sur de vouloir supprimer cet artiste ?</p>
        <a href="" id="linkSupprimer" class="confirm-ok">Supprimer</a>
        <a class="close confirm-ok">Annuler</a>
    </div>
  </div>

</div>
                        

							
