<section class="contenu uneOeuvre flex flex-col">
	<section class="retour"><a href="/art-public-mtl/api/oeuvre"> < Retour  </a></section>
	<section class="oeuvre conteneur_partager">
		<?php
		extract($aData);
		?>
		<h1 class="uneOeuvre_titre"><?php echo $titre?></h1>
		<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
		<header class="image dummy">
			<img src="/art-public-mtl/img/placeholder_640_480.jpg" />
		</header>

			<div class="systeme_onglets">
				<div class="onglets">
					<span class="onglet_0 onglet" id="onglet_details" onclick="javascript:change_onglet('details');">D&eacute;tails</span>
					<span class="onglet_0 onglet" id="onglet_artiste" onclick="javascript:change_onglet('artiste');">Artiste</span>
					<span class="onglet_0 onglet" id="onglet_carte" onclick="javascript:change_onglet('carte');">Carte</span>
				</div>
			<div class="contenu_onglets">
				<div class="contenu_onglet" id="contenu_onglet_details">
					<h1></h1>
					<table>
						<tr>
							<td>Catégorie</td>
							<td><?php if(isset($categorie)){echo $categorie;}else{echo "inconnu";} ?></td>
						</tr>
						<tr>
						<tr>
							<td>Matériaux</td>
							<td><?php if(isset($materiaux)){echo $materiaux;}else{echo "inconnu";} ?></td>
						</tr>
						<tr>
							<td>Techniques</td>
							<td><?php if(isset($technique)){echo $technique;}else{echo "inconnu";} ?></td>
						</tr>
						<tr>
							<td>Date de création</td>
							<td><?php if(isset($dateCreation)){echo $dateCreation;}else{echo "inconnu";} ?></td>
						</tr>
					</table>
					
				</div>
				<div class="contenu_onglet" id="contenu_onglet_artiste">
					<h1></h1>
					<section class="texte">
						<p class=""><?php if(isset($description)){echo $description;}else{echo "description non disponible.";} ?></p>
							<p class="auteur"><a href="/art-public-mtl/api/artiste/<?php echo $id_artiste ?>"><?php 
									if(isset($nom) && $nom!=""){
								echo $nom .", ". $prenom;
							
							}
							else
							{
								echo $nomCollectif;
							
							}
								
								
										?></a></p>
					</section>
					<a href="/art-public-mtl/api/artiste/<?php echo $id_artiste ?>" >Plus d'information ></a>
				</div>
				<!-- <p class="arrondissement"><?php echo $Arrondissement?></p> -->
		
					
				
				
				<div class="contenu_onglet" id="contenu_onglet_carte">
					<h1></h1>
					
				</div>
			</div>
		</div>
				
		<div class="conteneur_btn_partager"><a href="#" class="btn"><i class="material-icons">share</i>Partager</a></div>

                
                
    </section>

</section>