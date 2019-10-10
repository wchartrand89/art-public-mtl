<!-- <article class='filtres'>
	<?php
	// vérifier que l'utilisateur est connecté pour afficher le filtre "mes oeuvres"
	?>
	<section class="mesOeuvres">
		<h2>Mes oeuvres</h2>
		<section>
			<div class= "critere">
				<i class="material-icons">check_circle_outline</i>
				<p>Déja visitées</p>
			</div>
			<div class= "critere">
				<i class="material-icons">star_border</i>
				<p>À visiter</p>
			</div>
			<div class= "critere">
				<i class="material-icons">favorite_border</i>
				<p>Favorites</p>
			</div>
		</section>
		
	</section> -->
	<section class="types">
		<h2>Type d'oeuvre</h2>
		<section>
		<!-- Faire L'affichage des types d'oeuvre dynamiquement -->
		<?php
			//var_dump($aTypes);
			foreach ($aTypes as $cle => $type) {
				?>
				<div class= "critere type" data-id="<?php
				echo $type["id_sous_categorie"];
				?>">
				<i class="material-icons">check_box_outline_blank</i>
				<p>
				<?php
				echo $type["Nom"];
				?>
				</p>
			</div>
			<?php
			}
				?>
		</section>
	</section>

	<!-- Faire L'affichage des dates dynamiquement -->
	<!-- Aller chercher dans la BD les dates la plus récente et la plus vieille-->
	<section class="date">
		<h2>Dates</h2>
		<section>
		<?php
	
		$aDatesC=[];
		foreach($aDates as $cle => $date){
			if($date["dateCreation"] !== NULL && $date["dateCreation"] !== "NULL"){
				$dates= explode("/", $date["dateCreation"]);
				if(count($dates)>1){
					$aDatesC[] = $dates[2];
				}
			}
		}
		sort($aDatesC);
		echo "<p>".$aDatesC[0]."</p>";
		echo "<p>".$aDatesC[count($aDatesC)-1]."</p>";

		?>
		</section>
	</section>
	<!-- Faire L'affichage des arrondissements dynamiquement -->
	<section class="arrond">
		<h2>Arrondissement</h2>
		<section>

		<!-- Faire L'affichage des arrondissements dynamiquement -->
		<?php
			//var_dump($aArrond);
			foreach ($aArrond as $cle => $arrond) {
				?>
				<div class= "critere">
				<i class="material-icons">check_box_outline_blank</i>
				<p>
				<?php
				echo $arrond["Arrondissement"];
				?>
				</p>
			</div>
			<?php
			}
				?>




		<?php
		// $aArrond=[];
		// foreach ($aData as $cle => $oeuvre) {
		// 	extract($oeuvre);
		// 	$verif="";
			//echo $Arrondissement;
		// 	if(count($aArrond)>0 && !is_null($Arrondissement)){
		// 		foreach($aArrond as $cle => $arrond){
		// 			if($Arrondissement !== $arrond && $verif !== false){
		// 				$verif = true;
		// 			}else if ($Arrondissement == $arrond) {
		// 				$verif = false;
		// 			}
		// 		}
		// 		if($verif && !is_null($Arrondissement)){
		// 			$aArrond[]= $Arrondissement;
		// 		}
		// 	}else{
		// 		$aArrond[]= $Arrondissement;
		// 	}
		// }
		// sort($aArrond); 
		// foreach($aArrond as $cle => $arrond){
			?>
			<!-- <div class= "critere">
				<i class="material-icons">check_box_outline_blank</i>
				<p>-->
					<?php 
					//echo $arrond
					?>
				<!-- </p> 
			</div> -->
			<?php
		// }
		?> 

		</section>
	</section>
	<section class="back">
		<i class="material-icons">arrow_back</i>
	</section>
</article>
		<section class="recherche">
			<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
			<div class="vueChoisie">
				<a href="" class="flecheLien">❮</a>
				<svg class = "focus" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
				<a href="" class="flecheLien">❯</a>
			</div>
			<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
		</section>
		 <section class="contenu listeOeuvres">
			<!-- <section class="rechercher"></section> -->
            <section class="oeuvres flex wrap">
						<?php
						foreach ($aData as $cle => $oeuvre) {
							//var_dump($aData);
							extract($oeuvre);
							?>
							<section class="oeuvre conteneur_oeuvre_courante" data-id="<?php echo $id_oeuvre ?>">
								
			                    <header class="image dummy image_oeuvre_courante">
								<a class="ouvrir-oeuvre" href="oeuvre/<?php echo $id_oeuvre ?>" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>">
								<h2 class="titre-oeuvre"><?php echo $Titre?></h2>
								</a>	
									<a class="ouvrir-oeuvre" href="oeuvre/<?php echo $id_oeuvre ?>" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>"><div class="img" data-img="<?php if(isset($NoImage) && !empty($NoImage)){ echo $NoImage;}?>"></div>
									<!-- <img src="/art-public-mtl/img/placeholder_640_480.jpg" /> -->
								</a>
			                    </header>
			                    <section class="texte_pied_image">
			                        <!-- <p class="description">
			                            <?php echo $Description ?> 
									</p> -->
									<?php 
									foreach($Artistes as $artiste){
										extract($artiste);
										?>
										<p class="auteur_liste_oeuvre"><a href="artiste/<?php echo $id_artiste ?>">
                           <?php 
                            if(isset($Nom) && $Nom!=""){
                                echo $Nom ." ". $Prenom;
                            }
                            else
                            {
                                echo $NomCollectif;
                            }
                                        ?></a></p>
									<?php
									}
									?>
									<p class="date_creation">
										<?php 
										$dateOeuvre= explode("/", $dateCreation);
										if(count($dateOeuvre)>1){
											$anneeOeuvre = $dateOeuvre[2];
										}
										echo $anneeOeuvre;
									
									?></p>
			                    </section>
			                    <!-- <footer class="barre-action">
			
								<!<button class="ouvrir-oeuvre" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>">En savoir plus...</button>
			                    </footer> -->
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
			<article class="filtre">
				<i class="material-icons">filter_list</i>
			</article>
			
			