
		 
		 	<aside id="menu_aside">
				<a id="menu_oeuvre" href="/art-public-mtl/api/admin/oeuvre"><img src="../../img/icons/imageBlanch.svg" alt="icon image"><p class="text_menu">Oeuvres</p></a>
				<a id="menu_artistes" href="/art-public-mtl/api/admin/artiste"><img src="../../img/icons/paletteBlanch.svg" alt="icon image"><p class="text_menu">Artistes</p></a>
				<a id="menu_utilisateurs" href="/art-public-mtl/api/admin/utilisateur"><img src="../../img/icons/personBlanch.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
			</aside>
			<section class="contenu_listeOeuvres">
				<section class="recherche">
					<form action="">
						<div class=bar_image>
							<input id="bar_recherche" type="text" name="recherche" placeholder="Recherche un nom">
							<img id="img_recherche" src="../../img/icons/search_40px.svg" alt="search">
						</div>		
					</form>
					
				</section>
				<section class="nomsChamps">
					<P>NOM D'UTILISATEUR</P>
					<P>ADRESSE</P>
					<p></p>
				</section>
				<section id="liste_oeuvres" class="oeuvres flex flex-col">
					<?php
					$compt=0;
					foreach ($aData as $cle => $user) {
						extract($user);  
						++$compt;
											
					?>

						<div class="info_oeuvre">
							<p class="valeur_info_oeuvre filtrer"><?php echo $login; ?></p>
							<p class="valeur_info_oeuvre"><?php echo $courriel; ?></p>
							<span class="valeur_info_oeuvre">
								<a data-href="/art-public-mtl/api/admin/utilisateur/<?php echo $id_user ?>/supprimer" class="modalPopup" onclick="handle(this);"><img id='poubelle' src="../../img/icons/poubelle.svg" alt="Supprimer"></a>
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
    <p>Etes-vous sur de vouloir supprimer cet utilisateur ?</p>
        <a href="" id="linkSupprimer" class="confirm-ok">Supprimer</a>
        <a class="close confirm-ok">Annuler</a>
    </div>
  </div>

</div>
                        

							
