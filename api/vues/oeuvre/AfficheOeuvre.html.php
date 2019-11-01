
<?php error_reporting(E_ALL ^ E_WARNING);  ?>
<?php
    $document = cookie();
    $text_lang = $document->getElementById("lang")->nodeValue;

    $text_retour = $document->getElementById("retour")->nodeValue;
    $text_plus_info = $document->getElementById("plus_info")->nodeValue;

    $text_bulle = $document->getElementById("bulleinfo")->nodeValue;
    $text_details = $document->getElementById("details")->nodeValue;
    $text_artiste = $document->getElementById("artiste")->nodeValue;
    $text_carte = $document->getElementById("carte")->nodeValue;
    $text_cat = $document->getElementById("categorie")->nodeValue;
    $text_mat = $document->getElementById("materiaux")->nodeValue;
    $text_technique = $document->getElementById("techniques")->nodeValue;
    $text_date = $document->getElementById("dateCreation")->nodeValue;
?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8S4xg4xxyN0iGGBdUOpR3xRa4DIkD710&callback=initMap"
    async defer>
    </script>

    <script>var lienPage =  window.location.href();</script>

    <section class="contenu uneOeuvre flex flex-col">
	<section class="retour"><a href="javascript:history.back()"> < <?php echo $text_retour; ?>  </a></section>
	<section class="oeuvre conteneur_partager">
		<?php
		extract($aData);

//        echo "<pre>";
//        print_r($aData);
//        echo "</pre>";
//        die;


		?>
		<h1 class="uneOeuvre_titre"><?php echo $titre?></h1>
		<p><?php echo $description; ?></p>
		<header class="image dummy">
			<div class="img" data-img="<?php if(isset($NoImage) && !empty($NoImage)){ echo $NoImage;}else{ echo "default";}?>"></div>
			<!-- <img src="/art-public-mtl/img/placeholder_640_480.jpg" /> -->
		</header>

			<div class="systeme_onglets">
				<div class="onglets">
					<span class="onglet_0 onglet" id="onglet_details" onclick="javascript:change_onglet('details');"><?php echo $text_details; ?></span>
					<span class="onglet_0 onglet" id="onglet_artiste" onclick="javascript:change_onglet('artiste');"><?php echo $text_artiste; ?></span>
					<span class="onglet_0 onglet" id="onglet_carte" onclick="javascript:change_onglet('carte');"><?php echo $text_carte; ?></span>
				</div>
			<div class="contenu_onglets">
				<div class="contenu_onglet" id="contenu_onglet_details">
					<h1></h1>
					<table>
						<tr>
							<td><?php echo $text_cat; ?></td>
							<td><?php if(isset($categorie)){echo $categorie;}else{echo "inconnu";} ?></td>
						</tr>
						<tr>
						<tr>
							<td><?php echo $text_mat; ?></td>
							<td><?php if(isset($materiaux)){echo $materiaux;}else{echo "inconnu";} ?></td>
						</tr>
						<tr>
							<td><?php echo $text_technique; ?></td>
							<td><?php if(isset($technique)){echo $technique;}else{echo "inconnu";} ?></td>
						</tr>
						<tr>
							<td><?php echo $text_date; ?></td>
							<td><?php if(isset($dateCreation)){echo $dateCreation;}else{echo "inconnu";} ?></td>
						</tr>
					</table>

				</div>
				<div class="contenu_onglet" id="contenu_onglet_artiste">
					<h1></h1>
					<section class="texte">
            <p class="auteur"><a href="/art-public-mtl/api/artiste/<?php echo $id_artiste ?>"><?php
                if(isset($nom) && $nom!=""){
              echo $prenom ." ". $nom;

            }
            else
            {
              echo $nomCollectif;

            }


                  ?></a></p>
						<p class=""><?php if(isset($description)){echo $description;}else{echo "description non disponible.";} ?></p>
					</section>
					<a href="/art-public-mtl/api/artiste/<?php echo $id_artiste ?>" ><?php echo $text_plus_info; ?> ></a>
				</div>
				<!-- <p class="arrondissement"><?php echo $Arrondissement?></p> -->




				<div class="contenu_onglet" id="contenu_onglet_carte">
					<h1></h1>

    <div id="map" class="carte" style="height:230px; width:100%;"></div>
<script>
        var map;
    //data oeuvres
    function setMarkers(map)
    {
        var oeuvre = ["<?php echo $titre; ?>", <?php echo $coordonneeLatitude; ?>, <?php echo $coordonneeLongitude; ?>, "<?php echo $nom; ?>"];
        //marqueur pour chaque oeuvre
        var icon = {
            url: "../../img/icons/mapmarker.png", // url
             scaledSize: new google.maps.Size(28, 40), // size
        };
            //paramètres des marqueurs
            var marker = new google.maps.Marker({
                position: {lat: oeuvre[1], lng: oeuvre[2]},
                map: map,
                icon: icon,
                title: oeuvre[0]
            });
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
    </script>
    <script>
                function initMap()
        {
            var myMapOptions = { clickableIcons: false }
            var styledMapType = new google.maps.StyledMapType(
                [
                  {
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#f5f5f5"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.icon",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#616161"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#f5f5f5"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#bdbdbd"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#eeeeee"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#757575"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#e5e5e5"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#9e9e9e"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#ffffff"
                      }
                    ]
                  },
                  {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#757575"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#dadada"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#616161"
                      }
                    ]
                  },
                  {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#9e9e9e"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#e5e5e5"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#eeeeee"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#c9c9c9"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#9e9e9e"
                      }
                    ]
                  }
                ],
                {name: 'Styled Map'});
            //options default la carte Google
            var oeuvre = ["<?php echo $description; ?>", <?php echo $coordonneeLatitude; ?>, <?php echo $coordonneeLongitude; ?>, "<?php echo $nom; ?>"];
            var options = {
                center: {lat: oeuvre[1], lng: oeuvre[2]},
                zoom: 17,
                minZoom : 11,
                maxZoom : 18,
                mapTypeControlOptions: {
                    mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                            'styled_map']
                  },
                disableDefaultUI: true,
                zoomControl: true,
                draggable : true
            }
            var map = new google.maps.Map(document.getElementById('map'), options);
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');
            setMarkers(map);
        }
    </script>

    </div>
    </div>
        </div>
    <div class="conteneur_btn_partager"><a href="#" class="btn"><i class="material-icons">share</i>Partager</a></div>




    </section>

</section>
