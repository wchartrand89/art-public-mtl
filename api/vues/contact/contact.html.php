<?php error_reporting(E_ALL ^ E_WARNING);  ?>
<?php 
    $document = cookie();
    $text_localisation = $document->getElementById("localisation")->nodeValue;
    $text_adresse1 = $document->getElementById("adresse1")->nodeValue;
    $text_adresse2 = $document->getElementById("adresse2")->nodeValue;
    $text_adresse3 = $document->getElementById("adresse3")->nodeValue;
    $text_adresse4 = $document->getElementById("adresse4")->nodeValue;
    $text_ecrivez = $document->getElementById("ecrivez_nous")->nodeValue;
    $text_e_nom = $document->getElementById("e_nom")->nodeValue;
    $text_e_prenom = $document->getElementById("e_prenom")->nodeValue;
    $text_e_courriel = $document->getElementById("e_courriel")->nodeValue;
    $text_e_sujet = $document->getElementById("e_sujet")->nodeValue;
    $text_e_suj1 = $document->getElementById("e_suj1")->nodeValue;
    $text_e_suj2 = $document->getElementById("e_suj2")->nodeValue;
    $text_e_suj3 = $document->getElementById("e_suj3")->nodeValue;
    $text_e_suj4 = $document->getElementById("e_suj4")->nodeValue;
    $text_e_commentaire = $document->getElementById("e_commentaire")->nodeValue;
    $text_e_envoyer = $document->getElementById("e_envoyer")->nodeValue;
    $text_e_medias = $document->getElementById("medias")->nodeValue;
?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8S4xg4xxyN0iGGBdUOpR3xRa4DIkD710&callback=initMap"
    async defer>
    </script>
<script>
        var map;
    //data oeuvres
    function setMarkers(map)
    {
        var oeuvre = ["<?php echo $text_adresse1; ?>", 45.551088, -73.5557277, ""];
        //marqueur pour chaque oeuvre
        var icon = {
            url: "../img/icons/mapmarker.png", // url
             scaledSize: new google.maps.Size(28, 40), // size
        };
            //paramètres des marqueurs
            var marker = new google.maps.Marker({
                position: {lat:  45.551088, lng: -73.5557277},
                map: map,
                icon: icon,
                title: "Campus Principal"
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
            var oeuvre = ["<?php echo $text_adresse1; ?>", 45.551088, -73.5557277, ""];
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
<section class="contenu-contact">
    <?php if($message!=null) {
        echo($message);
    }
    ?>
    <div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_details" onclick="javascript:change_onglet('details');"><?php echo $text_localisation; ?></span>
            <span class="onglet_0 onglet" id="onglet_artiste" onclick="javascript:change_onglet('artiste');"><?php echo $text_ecrivez; ?></span>
            <span class="onglet_0 onglet" id="onglet_carte" onclick="javascript:change_onglet('carte');"><?php echo $text_e_medias; ?></span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_details">
                <section class="texte">
                    <p>
                    <strong><?php echo $text_adresse1; ?></strong>
                    <br>
                    <?php echo $text_adresse2; ?>
                    <br>
                    <?php echo $text_adresse3; ?>
                    <br>
                    <?php echo $text_adresse4; ?>
                    </p>
                    <div class="carte_contact">
                    <div id="map" class="carte" style="height:480px; width:640px;"></div>
<!--                    <iframe src="https://www.google.com/maps/d/embed?mid=1nrpE60oVxUEQEUOvHFRT5c-33P5zf6Ix" width="640" height="480"></iframe>-->
                    </div>
                </section>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_artiste">
                <form action="/art-public-mtl/api/contact" method="post">
                    <fieldset>
                        <h3><?php echo $text_ecrivez; ?></h3>
                        <?php echo $text_e_nom; ?><br>
                        <input type="text" name="nom" value="">
                        <br>
                        <?php echo $text_e_prenom; ?><br>
                        <input type="text" name="prenom" value="">
                        <br>
                        <?php echo $text_e_courriel; ?><br>
                        <input type="text" name="courriel" value="">
                        <br>
                        <?php echo $text_e_sujet; ?>
                        <select name="sujet">
                            <option value="Proposition"><?php echo $text_e_suj1; ?></option>
                            <option value="Demande"><?php echo $text_e_suj2; ?></option>
                            <option value="Signaler"><?php echo $text_e_suj3; ?></option>
                            <option value="Autre"><?php echo $text_e_suj4; ?></option>
                        </select>
                        <br>
                        <p><?php echo $text_e_commentaire; ?></p>
                        <br>
                        <textarea name="message" rows="10" cols="30"></textarea>
                        <br><br>
                        <input type="submit" value="<?php echo $text_e_envoyer; ?>">
                    </fieldset>
                </form>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_carte">
                <section class="medias">
                    <div><i class="fa fa-linkedin" style="font-size:48px;color:dimgray"></i>Linkedin</div>
                    <div><i class="fa fa-pinterest-p" style="font-size:48px;color:dimgray"></i>Pinterest</div>
                </section>
            </div>
		</div>
	</div>
</section>
