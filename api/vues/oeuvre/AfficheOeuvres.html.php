
	    <!-- 
**************************************************************************
**************************************************************************
**************************************************************************
    TODO: 
    - SÉCURISER GOOGLE API KEY (lignes 13-15)
    - HIDE/SHOW CARTE/LISTE
    - BULLES D'INFO (ELEVER INLINE CSS)
**************************************************************************
**************************************************************************
**************************************************************************
    -->


<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8S4xg4xxyN0iGGBdUOpR3xRa4DIkD710&callback=initMap"
async defer>
</script> -->

<section class="recherche">
	<div><i class="vueListe material-icons">list</i></div>
	<div><i class="vueCarte focus material-icons">map</i></div>
	<div><i class="vueImage material-icons">photo</i></div>
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
		</section>
	</section>
	<section class="btnSupp cache" id="hidden">
		<i class="material-icons supp">close</i>
		<p>Réinitialiser</p>
	</section>
</article>

<div id="map" class="carte"></div> 

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
			<section>
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

					?>
							</section>
			<?php
			}
			?>
			
		</section>
	</section>
		<section class="contenu hidden listeOeuvres" id="photo">
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


<script>
    
    var map;
        
    //data oeuvres  
    
    var oeuvres = [];
    let aOeuvres=<?php echo(json_encode($aData));?>;
//    console.log(JSON.parse(aOeuvres));
//    console.log(aOeuvres[0]);
    aOeuvres.forEach(function(element)
    {
        var titre = element["Titre"];
        var lat = element["CoordonneeLatitude"];
        var lng = element["CoordonneeLongitude"];
        var artiste = element["Artistes"];
        var nom = artiste[0]["Nom"];
        var date = element["dateCreation"];
        if(date=="NULL" || typeof date != "string"){
            date="";
        }else{
            date = date.substr(6,4);
        }
        var id = element["id_oeuvre"];
        var oeuvre = [];
//        oeuvre.push(titre+", "+lat+", "+lng+", "+nom+", "+date+", "+id);
        oeuvre.push(titre,parseFloat(lat),parseFloat(lng),nom,date,parseFloat(id));
        oeuvres.push(oeuvre);
    })
//    console.log(oeuvres);
    function setMarkers(map) 
    {
        //marqueur pour chaque oeuvre
        var icon = {
            url: "../img/icons/mapmarker.png", // url
             scaledSize: new google.maps.Size(28, 40), // size
        };
//        console.log("l");
        
        //pour chaque oeuvre dans le tableau
        for (var i = 0; i < oeuvres.length; i++) 
        {
            var oeuvre = oeuvres[i];
            
/************
*************
            
TODO : enlever inline CSS
            
*************
*************
*/
            //contenu de la bulle d'information
            var content = '<div><p style="color:#103C61; font-size:30px; font-family: Open Sans; font-style: normal; font-weight: bold; font-size: 18px; line-height: 25px; display: flex; align-items: center; text-transform: uppercase;">'+oeuvre[0]+'</p>'+'<p style="color:#103C61;">'+oeuvre[3]+', '+oeuvre[4]+'</p>'+'<a href="oeuvre/'+oeuvre[5]+'" style="color:#DF8E32; text-decoration:none;">'+"Plus d'informations >"+'</a></div>';
            var infowindow = new google.maps.InfoWindow();
            
            //paramètres des marqueurs
            var marker = new google.maps.Marker({
                position: {lat: oeuvre[1], lng: oeuvre[2]},
                map: map,
                icon: icon,
                title: oeuvre[0]
            });  
            
            //ouvrir la bulle d'information de l'oeuvre
            google.maps.event.addListener(marker, 'click', function(content)
            {
                return function()
                {
                    infowindow.setContent(content);
                    infowindow.open(map, this);
                }
            }(content));
            
            // Limites de la carte
            var allowedBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(45.4079982, -73.9446209), 
                new google.maps.LatLng(45.6876557, -73.5051969));
                // Après avoir drag (glissé) le curseur
                google.maps.event.addListener(map, 'dragend', function()
                {
                    if (allowedBounds.contains(map.getCenter())) return;
                 // Rediriger la carte vers la dernière limite connue
                 var c = map.getCenter(),
                     x = c.lng(),
                     y = c.lat(),
                     maxX = allowedBounds.getNorthEast().lng(),
                     maxY = allowedBounds.getNorthEast().lat(),
                     minX = allowedBounds.getSouthWest().lng(),
                     minY = allowedBounds.getSouthWest().lat();
                 if (x < minX) x = minX;
                 if (x > maxX) x = maxX;
                 if (y < minY) y = minY;
                 if (y > maxY) y = maxY;
                 map.setCenter(new google.maps.LatLng(y, x));
               });
        }
    }        
    </script>
    <script src = "../js/initMapOeuvres.js"></script>
			