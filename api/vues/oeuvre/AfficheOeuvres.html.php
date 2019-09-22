
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
							<section class="oeuvre conteneur_oeuvre_courante">
			                    <header class="image dummy image_oeuvre_courante">
									<h2 class="titre-oeuvre"><?php echo $Titre?></h2>
									<a class="ouvrir-oeuvre" href="oeuvre/<?php echo $id_oeuvre ?>" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>"><img src="/art-public-mtl/img/placeholder_640_480.jpg" /></a>
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
			                        <p class="date_creation">2007<!-- <?php echo $dateCreation?> --></p>
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
			