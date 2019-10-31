

	<?php
//	var_dump($aData);
//	die;
	?>
 
	<aside id="menu_aside">
		<a id="menu_oeuvre" href="/art-public-mtl/api/admin/oeuvre"><img src="../../img/icons/imageBlanch.svg" alt="icon image"><p class="text_menu">Oeuvres</p></a>
		<a id="menu_artistes" href="/art-public-mtl/api/admin/artiste"><img src="../../img/icons/paletteBlanch.svg" alt="icon image"><p class="text_menu">Artistes</p></a>
		<a id="menu_utilisateurs" href="/art-public-mtl/api/admin/utilisateur"><img src="../../img/icons/personBlanch.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
		<a id="menu_contact" href="/art-public-mtl/api/admin/contact"><img src="../../img/icons/comment.png" alt="icon image"><p id="menuComment" class="text_menu">Commentaires</p></a>
	</aside>
	<section class="contenu_listeOeuvres">
		
		<section class="nomsChamps">
			<P>NOM</P>
			<P>PRENOM</P>
			<P>COURRIEL</P>
			<P>SUJET</P>
			<P>MESSAGE</P>
		</section>
		<section id="liste_oeuvres" class="oeuvres flex flex-col">
			<?php
			$compt=0;
			foreach ($aData as $cle => $contact) {
				extract($contact);  
				++$compt;
									
			?>

				<div class="info_oeuvre">
					<p class="valeur_info_oeuvre filtrer"><?php echo $nom ?></p>
					<p class="valeur_info_oeuvre filtrer"><?php echo $prenom ?></p>
					<p class="valeur_info_oeuvre filtrer"><?php echo $courriel ?></p>
					<p class="valeur_info_oeuvre filtrer"><?php echo $sujet ?></p>
					<p class="valeur_info_oeuvre filtrer"><?php echo $commentaire ?></p>
				</div>
				
				<?php
			}
			?>	
				
		</section>
			
	</section>
                       

                        

							
