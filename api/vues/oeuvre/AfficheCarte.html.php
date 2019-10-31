<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8S4xg4xxyN0iGGBdUOpR3xRa4DIkD710&callback=initMap"
async defer>
</script>
<div id="map" class="carte"></div> 
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
        var favori = element["favori"];
        var aVisiter = element["aVisiter"];
        if(date=="NULL" || typeof date != "string"){
            date="";
        }else{
            date = date.substr(6,4);
        }
        var id = element["id_oeuvre"];
        var oeuvre = [];
//        oeuvre.push(titre+", "+lat+", "+lng+", "+nom+", "+date+", "+id);
        oeuvre.push(titre,parseFloat(lat),parseFloat(lng),nom,date,parseFloat(id),favori,aVisiter);
        oeuvres.push(oeuvre);
    })
    //console.log(oeuvres);
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
			let aVis="star_border";
			if(oeuvre[7] !== null){
				aVis="star";
			}
			let fav="favorite_border";
			if(oeuvre[8] !== undefined){
				aVis="favorite";
			}
			var content = '<div><p style="color:#103C61; font-size:30px; font-family: Open Sans; font-style: normal; font-weight: bold; font-size: 18px; line-height: 25px; display: flex; align-items: center; text-transform: uppercase;">'+oeuvre[0]+'</p>'+'<p style="color:#103C61;">'+oeuvre[3]+', '+oeuvre[4]+'</p>'+'<a href="oeuvre/'+oeuvre[5]+'" style="color:#DF8E32; text-decoration:none;">'+"Plus d'informations >"+'</a></div>';
            var infowindow = new google.maps.InfoWindow();
            
            //paramètres des marqueurs
            var marker = new google.maps.Marker({
                position: {lat: oeuvre[1], lng: oeuvre[2]},
                map: map,
                icon: icon,
				title: oeuvre[0],
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
