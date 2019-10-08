
		 <section class="contenu listeOeuvres">
         	<section class="recherche"></section>
            <section class="oeuvres flex wrap">
<div id="map"></div>      
    <script>
        var map;
        function initMap() 
        {          
            //options default la carte Google
            var options = {
                center: {lat: 45.553873, lng: -73.7041081},
                zoom: 12
            }
            var icon1 = {
                url: '../../../img/icons/mapmarker.png',
                size: new google.maps.Size(28, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0),
            }
            var map = new google.maps.Map(document.getElementById('map'), options);
//            var marker = new google.maps.Marker({
//                position : {lat: 45.553873, lng: -73.7041081},
//                map : map,
//                icon : icon
//            })  
            
            var contentString = 'string1';
            var infowindow = new google.maps.InfoWindow({
            content: contentString
            });
            setMarkers(map);
        }
        
    //data oeuvres
    var oeuvres = [
      ['MARKER 1', 45.5609420, -73.6352330, 4],
      ['MARKER 2', 45.5437740, -73.6144800, 5],
      ['MARKER 3', 45.5084930, -73.5533000, 3]
    ];
    

    function setMarkers(map) {
        console.log('marqueurs allez');
        // Adds markers to the map.

        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.

        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        var icon = {
            url: '../../../img/icons/mapmarker.png', // url
             scaledSize: new google.maps.Size(28, 40), // size
        };
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        var shape = {
        coords: [1, 1, 1, 28, 20, 28, 20, 1],
        type: 'poly'
        };
        for (var i = 0; i < oeuvres.length; i++) {
            var oeuvre = oeuvres[i];
            var content = oeuvre[0];
            var infowindow = new google.maps.InfoWindow();

//            console.log(oeuvre[0]);
            var marker = new google.maps.Marker({
                position: {lat: oeuvre[1], lng: oeuvre[2]},
                map: map,
                icon: icon,
                shape: shape,
                title: oeuvre[0],
                zIndex: oeuvre[3]
//                content: oeuvre[0]
            });  
            google.maps.event.addListener(marker, 'click', function(content)
            {
                return function()
                {
                    infowindow.setContent(content);
                    infowindow.open(map, this);
                }
            }(content));
        }
    }   
        
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8S4xg4xxyN0iGGBdUOpR3xRa4DIkD710&callback=initMap"
    async defer>
    </script>     
                
                
                
                
                
                
						<?php
        
echo '<pre>';   
print_r($aData);
echo '</pre>';
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
			                        <p class="date_creation"><?php echo $dateCreation?></p>
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
			