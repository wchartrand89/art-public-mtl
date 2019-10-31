
<section class="recherche">
	<div><i class="vueListe material-icons">list</i></div>
	<div><i class="vueImage focus material-icons">photo</i></div>
</section>
<article class='filtres cache'>
	<section class="retour">
		<i class="material-icons icone">close</i>
	</section>
	<section class="mesOeuvres" id="hidden">
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
	</section>
	<section class="types" >
		<h2>Type d'oeuvre</h2>
		<section>
		<?php
			//var_dump($aTypes);
			foreach ($aTypes as $cle => $type) {
				?>
				<div class= "critere type" data-id="<?php
				echo $type["id_sous_categorie"];
				?>" data-filtre="type">
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
	<section class="date" id ="hidden">
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
			<div class="slidecontainer">
				<input type="range" min="<?php echo $aDatesC[0]; ?>" max="<?php echo $aDatesC[count($aDatesC)-1]; ?>" value="<?php echo $aDatesC[count($aDatesC)-1]; ?>" range="1" class="slider v2">
			</div>
			<div class="slidecontainer">
				<input type="range" min="<?php echo $aDatesC[0]; ?>" max="<?php echo $aDatesC[count($aDatesC)-1]; ?>" value="<?php echo $aDatesC[0]; ?>" range="1" class="slider v1">
			</div>
			<p class="demo">test</p>
			<p class="demo2">test</p>
		</section>
	</section>
	<section class="arrond">
		<h2>Arrondissement</h2>
		<section>
			<?php
				// var_dump($aArrond);
				foreach ($aArrond as $cle => $arrond) {
					?>
					<div class= "critere" data-filtre="arrondissement" data-id="<?php echo $arrond["Arrondissement"]; ?>">
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
		</section>
	</section>
	<section class="btnSupp cache" id="hidden">
		<i class="material-icons supp">close</i>
		<p>Réinitialiser</p>
	</section>
</article>

<section class="listeLettre" id="hidden">
	<aside class="choix">
		<p class="lettre">Y</p>
		<p class="lettre">Z</p>
		<div class="lettreChoisie">
			<a class="fleches next" href="#B">
				<i class="material-icons">keyboard_arrow_up</i>
				<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg> -->
			</a>
			<p class="lettre focus">A</p>
			<a class="fleches prev" href="#Z">
				<i class="material-icons">keyboard_arrow_down</i>
				<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/><path d="M0 0h24v24H0z" fill="none"/></svg> -->
			</a>
		</div>
		<p class="lettre">B</p>
		<p class="lettre">C</p>
	</aside>
<?php
/*Tableau pour création des ancres dans les sections des lettres*/ 
$listeLettres = array(0=>array("lettre"=>"A","ok"=>false),
1=>Array("lettre"=>"B","ok"=>false),
2=>Array("lettre"=>"C","ok"=>false),
3=>Array("lettre"=>"D","ok"=>false),
4=>Array("lettre"=>"E","ok"=>false),
5=>Array("lettre"=>"F","ok"=>false),
6=>Array("lettre"=>"G","ok"=>false),
7=>Array("lettre"=>"H","ok"=>false),
8=>Array("lettre"=>"I","ok"=>false),
9=>Array("lettre"=>"J","ok"=>false),
10=>Array("lettre"=>"K","ok"=>false),
11=>Array("lettre"=>"L","ok"=>false),
12=>Array("lettre"=>"M","ok"=>false),
13=>Array("lettre"=>"N","ok"=>false),
14=>Array("lettre"=>"O","ok"=>false),
15=>Array("lettre"=>"P","ok"=>false),
16=>Array("lettre"=>"Q","ok"=>false),
17=>Array("lettre"=>"R","ok"=>false),
18=>Array("lettre"=>"S","ok"=>false),
19=>Array("lettre"=>"T","ok"=>false),
20=>Array("lettre"=>"U","ok"=>false),
21=>Array("lettre"=>"V","ok"=>false),
22=>Array("lettre"=>"W","ok"=>false),
23=>Array("lettre"=>"X","ok"=>false),
24=>Array("lettre"=>"Y","ok"=>false),
25=>Array("lettre"=>"Z","ok"=>false),);
?>
     
		<section class="listeOeuvresText" id="liste">
		<div class="fixPb"></div>
		<?php
		//print_r($aData);
			foreach ($aData as $cle => $oeuvre) {
				extract($oeuvre);
				$i=0;
					foreach($listeLettres as $cle => $lettre){
						if(!isset($test[$i])){
							$test[$i]=false;
						}
						if ($Titre[0] == $lettre["lettre"] && $lettre["ok"] == false && $test[$i] !== true){
							echo '<div id="'.$lettre["lettre"].'"></div>';
							$test[$i]=true;
						}
						$i++;
				
					}			
			?>
			<section class="oeuvre" data-id="<?php echo $id_oeuvre ?>">
				<a class="lienOeuvre lienArtisteA" href="oeuvre/<?php echo $id_oeuvre; ?>"><?php  echo $Titre;?></a>
					<?php 
					
					$j=count($Artistes);
					//echo(count($Artistes));
					foreach($Artistes as $artiste){
						$j=$j-1;
						extract($artiste);
						?>
						<a class="lienArtiste" href="artiste/<?php echo $id_artiste; ?>">
						<?php 
						if(isset($Nom) && $Nom!=""){
							echo $Nom ." ". $Prenom;
						}
						else
						{
							echo $NomCollectif;
						}
						if($j>0){
							echo ", ";
						}
						?></a>
					<?php			
					}

					if(isset($_SESSION["user"]) && $_SESSION['user']=='ok'){
					?>
						<section class="compte">
							<i class="material-icons aVisiter" data-vis="<?php echo $aVisiter ?>" data-id="<?php echo $id_oeuvre ?>">star_border</i>
							<i class="material-icons favori" data-fav="<?php echo $favoris ?>"  data-id="<?php echo $id_oeuvre ?>">favorite_border</i>
						</section>
					<?php
					}
					?>
				
			</section>
			<?php
			}
			?>
			
		</section>
	</section>
		<section class="contenu listeOeuvres" id="photo">
			<div class="fixPb"></div>
			<!-- <section class="rechercher"></section> -->
            <section class="oeuvres flex wrap">
						<?php
        
//echo '<pre>';
//print_r($aData);
//echo '</pre>';
                        $data2 = [];
						foreach ($aData as $cle => $oeuvre) {
                            array_push($data2, $oeuvre);
							extract($oeuvre);
							?>
							<section class="oeuvre conteneur_oeuvre_courante" data-id="<?php echo $id_oeuvre ?>">
							<?php
							if(isset($_SESSION["user"]) && $_SESSION['user']=='ok'){
							?>
							<section class="compte">
								<i class="material-icons aVisiter" data-vis="<?php echo $aVisiter ?>" data-id="<?php echo $id_oeuvre ?>">star_border</i>
								<i class="material-icons favori" data-id="<?php echo $id_oeuvre ?>" data-fav="<?php echo $favoris ?>" >favorite_border</i>
							</section>
							<?php } ?>
			                    <header class="image dummy image_oeuvre_courante">
								<a class="ouvrir-oeuvre" href="oeuvre/<?php echo $id_oeuvre ?>" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>">
								<h2 class="titre-oeuvre"><?php echo $Titre?></h2>
								</a>	
                  <a class="ouvrir-oeuvre" href="oeuvre/<?php echo $id_oeuvre ?>" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>">
                  <div class="img" data-img="<?php if(isset($NoImage) && !empty($NoImage)){ echo $NoImage;}else{ echo "default";}?>">
                </div>
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
			<article class="filtre selec">
				<i class="material-icons">filter_list</i>
			</article>
