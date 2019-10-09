<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>      
<script>
        var map;
        function initMap() 
        {     
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
            
            var options = {
                center: {lat: 45.553873, lng: -73.7041081},
                zoom: 11,
                minZoom : 11,
                maxZoom : 18,
                mapTypeControlOptions: {
                    mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                            'styled_map']
                  },
                disableDefaultUI: true,
                zoomControl: true,
//                draggable : false
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
            
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map')
            
            var contentString = 'string1';
            var infowindow = new google.maps.InfoWindow({
            content: contentString
            });
            setMarkers(map);
        }
        
    //data oeuvres
        
        
    var oeuvres = [
        ["Source", 45.4664050, -73.6316480, "Coutu", 2010, 1],
        ["Porte de jour", 45.5120900, -73.5509790, "Alloucherie", 2004, 2],
        ["Regarder les pommetiers", 45.5615850, -73.5626730, "Alloucherie", 2007, 3],
        ["Le malheureux magnifique", 45.5169070, -73.5678460, "Angers", 1972, 4],
        ["Les clochards célestes", 45.5168530, -73.5551530, "Angers", 1983, 5],
        ["Discours du roi poète", 45.4723900, -73.5847040, "Arsenault", 1982, 6],
        ["Hommage à Jérôme Le Royer De La Dauversière", 45.5084930, -73.5533000, 1999, 7],
        ["Obélisque oblique", 45.5060460, -73.5267060, "Adam", 1967, 8],
        ["La source", 45.5347520, -73.6178450, "Antoci", 1998, 9],
        ["Vous êtes ici", 45.5511830, -73.5405390, "Aquino", 2006, 10],
        ["Non titré (Murale en relief et sculpture)", 45.5397130, -73.5761100, "Streubel", 1962, 11],
        ["Non titré (Vitraux)", 45.5088160, -73.5540690, "Inconnu", , 12],
        ["Non titré (Vitraux)", 45.5217780, -73.6015480, "Inconnu", , 13],
        ["Non titré (Vitraux)", 45.5227410, -73.5653310, "Inconnu", 1917, 14],
        ["Non titré (Vitraux)", 45.5318140, -73.5871310, "Inconnu", 1930, 15],
        ["Non titré (Murale inuit)", 45.5037920, -73.5293220, "Inconnu", 1967, 16],
        ["Non titré (Murale peinte)", 45.6766030, -73.4914230, "Inconnu", , 17],
        ["Non titré (Fontaine, mosaïque)", 45.4723080, -73.5729440, "Baier", , 18],
        ["Bibliotheca Universalis", 45.5031300, -73.6369470, "Baier", 2006, 19],
        ["Chibouki", 45.5033020, -73.6367760, "Balboni", 2006, 20],
        ["La mort de Dante", 45.5344450, -73.6117210, "Bélanger", 1921, 21],
        ["Champlain visite de nouveau le site de Montréal en 1611", 45.5039090, -73.5874520, "Benet", , 22],
        ["Monument à Jean Vauquelin", 45.5085880, -73.5546550, "Bergeron", 1927, 23],
        ["Smoke and steel", 45.5827050, -73.5857740, "Bérubé", , 24],
        ["Le cycliste", 45.4566550, -73.5427460, "Boisvert", 1990, 25],
        ["Contournement", 45.5609420, -73.6352330, "Borduas", 2008, 26],
        ["L'arbre des générations", 45.4306990, -73.6661130, "Borduas", 1987, 27],
        ["Vire au vent", 45.4284800, -73.6824510, "Borduas", 1988, 28],
        ["Sans titre", 45.5582180, -73.5636440, "Borduas", 1961, 29],
        ["Carte du site de Montréal par Champlain en 1611", 45.5039860, -73.5875850, "Borduas", , 30],
        ["Les voyages de Jacques Cartier au Canada en 1534 et 1535", 45.5039610, -73.5876570, "Cerceau", , 32],
        ["Les voyages de Jacques Cartier au Canada en 1534 et 1535", 45.5039610, -73.5876570, "Boudot", , 32],
        ["Montréal de 1645 à 1672", 45.5039450, -73.5876970, "Bourassa", , 33],
        ["Montréal en 1760", 45.5039180, -73.5877310, "Bourgeau", , 34],
        ["Jacques Cartier est reçu par le chef Agouhana", 45.5038420, -73.5877070, "Lasalle", , 36],
        ["Jacques Cartier est reçu par le chef Agouhana", 45.5038420, -73.5877070, "Bourgeau", , 36],
        ["Parades Parures", 45.6498030, -73.5789610, "Boyer", 1999, 37],
        ["Le village imaginé. «Le renard l'emporte, le suit à la trace…»", 45.4751580, -73.5588620, "Boyer", 2005, 38],
        ["Monument à Jean Drapeau", 45.5085300, -73.5534200, "Brunet", 2001, 39],
        ["Hommage à Maurice Richard", 45.5626820, -73.5469570, "Brunet", , 40],
        ["La montagne des jours", 45.5070690, -73.5900310, "Buren", 1991, 41],
        ["Mémoire ardente", 45.5089320, -73.5510620, "Burman", 1994, 42],
        ["Les jours d'été quand le fleuve monte à l'assaut des murs, hommage à Marie Uguay", 45.5031300, -73.6369470, "Calder", 2006, 43],
        ["Monument à sir Wilfrid Laurier", 45.4994744, -73.5710610, "Cantieni", 1953, 44],
        ["Monument au frère André", 45.5033090, -73.5666000, "Cardenas", 1986, 45],
        ["Neuf couleurs au vent", 45.5217090, -73.5657760, "Carpentier", 1984, 46],
        ["Sans titre", 45.4993270, -73.5946040, "Carpentier", 1964, 47],
        ["Table Ronde", 45.4281340, -73.6617710, "Carpentier", 1984, 48],
        ["Trois disques", 45.5106580, -73.5368370, "Cartier", 1967, 49],
        ["Hermès", 45.4287520, -73.6834350, "Casini", 1986, 50],
        ["Sans titre", 45.5000360, -73.5949960, "Cavalli", 1964, 51],
        ["Non titré", 45.5190700, -73.5560710, "Chavignier", 1981, 52],
        ["Trilogie", 45.4301060, -73.6667570, "Comtois", 1985, 53],
        ["Communion", 45.4239580, -73.5985740, 1990, 54],
        ["Non titré (mosaïque en céramique)", 45.4664250, -73.5958110, , 55],
        ["Monument à Giovanni Caboto", 45.4894900, -73.5836520, "Covit", 1931, 56],
        ["Non titré ", 45.5128320, -73.5345730, "Covit", 1952, 57],
        ["La femme-fontaine", 45.4483990, -73.5776210, "Covit", 1967, 58],
        ["Le carrousel sauvage", 45.5011690, -73.5940400, "Hardy et associés", 1964, 61],
        ["Le carrousel sauvage", 45.5011690, -73.5940400, "Séguin", 1964, 61],
        ["Le carrousel sauvage", 45.5011690, -73.5940400, "Covit", 1964, 61],
        ["Décor", 45.4298750, -73.6664090, "Daoust", 1965, 62],
        ["L'eau et la nourriture", 45.4250530, -73.6190430, "Dardel", 1977, 63],
        ["Le mélomane", 45.5622000, -73.6008520, "Daudelin", 2011, 64],
        ["Mélangez le Tout", 45.5343400, -73.5527330, "Daudelin", 2011, 65],
        ["Caesura", 45.5375120, -73.6280200, "Daudelin", 1991, 66],
        ["Theatre for Sky Blocks", 45.4338930, -73.6967500, "De Almeida", 1992, 67],
        ["Les graminées du jardin Saint-Sulpice", 45.5593480, -73.6416080, "De Broin", 2007, 68],
        ["Give Peace a Chance", 45.5050070, -73.5838200, "De Leon Imao", 2009, 69],
        ["Monument au frère Marie-Victorin", 45.5572810, -73.5559030, "De Palma", 1951, 70],
        ["Le lion de La Feuillée", 45.5587960, -73.5556370, "De Tonnancour", , 71],
        ["Agora", 45.5120750, -73.5548190, "Debré", 1983, 72],
        ["Mastodo", 45.5118000, -73.5546810, "Delavalle", 1984, 73],
        ["Cailloudo", 45.5124570, -73.6767990, "Delfosse", 1990, 74],
        ["Hommage à Claude Jutra", 45.5132400, -73.5729450, "Démidoff-Séguin", 1997, 75],
        ["La ville imaginaire", 45.5126970, -73.5377140, "Démidoff-Séguin", 1997, 76],
        ["Révolutions", 45.5239850, -73.5527310, "Dubois", 2003, 77],
        ["L'arc", 45.5058550, -73.5277410, "Dubray", 2009, 78],
        ["Buste du Dr. José P. Rizal", 45.4910140, -73.6340790, "Dumouchel", 1999, 79],
        ["Monument à Christophe Colomb", 45.5451140, -73.6101940, "Duval", 1976, 80],
        ["Cosmos", 45.6681310, -73.4946210, "Dyens", 1966, 81],
        ["Obélisque en hommage à Charles de Gaulle", 45.5261070, -73.5647590, "Edstrom", 1992, 82],
        ["China Wall", 45.4285620, -73.6816820, "Eloul", 1988, 83],
        ["Maisonneuve fonde Montréal le 18 mai 1642", 45.5038190, -73.5876410, "Faniel", , 84],
        ["Portail avec bas-reliefs", 45.5134270, -73.5468860, "Farley", 1987, 85],
        ["Place du Temple", 45.4236200, -73.6249150, "Filion", 1990, 86],
        ["Fontaine de vie", 45.4331620, -73.6812580, "Filion", 1977, 87],
        ["Buste de Simon Bolivar", 45.4894860, -73.5809190, "Fortin", 1991, 88],
        ["Albarello", 45.4299400, -73.6668440, "Fournelle", 1994, 89],
        ["À la croisée des mots", 45.4837970, -73.5751050, "Fournelle", 2004, 90],
        ["Mots choisis", 45.6681310, -73.4946210, "Fournelle", 2006, 91],
        ["Hommage aux forces vitales du Québec", 45.4200520, -73.6033720, "Fournelle", 1987, 92],
        ["Monument aux braves de N.D.G.", 45.4724990, -73.6137260, "Fournelle", 1919, 93],
        ["Optimax", 45.5009110, -73.5932880, "Galipeau", 1964, 94],
        ["Non titré", 45.4456920, -73.6513310, "Gavoty", , 96],
        ["Non titré", 45.4456920, -73.6513310, "Péré", , 96],
        ["Les baigneurs", 45.4663390, -73.5956150, "Gladstone", , 97],
        ["Les baigneurs", 45.5624640, -73.5473040, "Gnass", , 98],
        ["L'eau et la santé", 45.4250530, -73.6190430, "Gokakis", 1977, 99],
        ["Une leçon d'histoire", 45.5330420, -73.5518580, "Gorduz", 1986, 100],
        ["Delos, septième porte de la perfection et de l'immortalité, Convoi III", 45.5344960, -73.5622380, "Goulet", 2006, 101],
        ["Champlain explore le site de Montréal en 1603", 45.5038770, -73.5874920, "Goulet", , 102],
        ["Nous deux", 45.4299830, -73.6669890, "Goulet", 1972, 103],
        ["Colonne", 45.5189920, -73.5819930, "Goulet", 1985, 104],
        ["États de choc", 45.4384290, -73.7182090, "Goulet", 1985, 105],
        ["La ville blanche", 45.4284480, -73.6803500, "Goulet", 1986, 106],
        ["Espace cubique ou hommage à Malevitch", 45.4299010, -73.6665790, "Goulet", 1992, 107],
        ["Le jardin de Lyon", 45.5124700, -73.5554610, "Robert", 2000, 109],
        ["Le jardin de Lyon", 45.5124700, -73.5554610, "Goulet", 2000, 109],
        ["Orbite optique no 2", 45.5225070, -73.5346490, "Granche", 1967, 110],
        ["Fontaine", 45.5139580, -73.5529210, "Granet", 1984, 111],
        ["Athéna", 45.5277400, -73.6242820, "Granet", 1997, 112],
        ["Hommage à Mihai Eminescu, poète roumain", 45.5147960, -73.5764590, "Hayeur", 2005, 113],
        ["Trait d'union", 45.5864720, -73.5971390, "Hébert", 1984, 114],
        ["Les leçons singulières (volet 1)", 45.5215800, -73.5704560, "Hébert", 1990, 115],
        ["Les leçons singulières (volet 2)", 45.5234170, -73.5685570, "Hébert", 1991, 116],
        ["Détour : le grand jardin", 45.4283730, -73.6811150, "Hébert", 1994, 117],
        ["Le carrousel de l’île", 45.4658110, -73.5447780, "Hébert", 2005, 118],
        ["Un jardin à soi", 45.5609560, -73.5658220, "Heyvaert", 2010, 119],
        ["Monument pour L", 45.4347600, -73.6998920, "Hill", 1992, 120],
        ["Volatiles", 45.4366610, -73.6077680, "Hill", , 121],
        ["Nef pour quatorze reines", 45.4960420, -73.6177020, "Hill", 1999, 122],
        ["Hommage aux travailleurs", 45.6007020, -73.6384560, "Holgate", 1973, 123],
        ["Monument à Émile Nelligan", 45.5162150, -73.5702840, "Hunt", 2005, 125],
        ["Monument à Émile Nelligan", 45.5162150, -73.5702840, "Hunt", 2005, 125],
        ["Songes", 45.6165400, -73.6209700, "Hunter", 2006, 126],
        ["Jacques Cartier atterit à Hochelaga en 1535", 45.5039070, -73.5874280, "Jarnuszkiewicz", , 127],
        ["Monument à sir Louis-Hippolyte La Fontaine", 45.5230170, -73.5663280, "Keyt", 1930, 128],
        ["Monument aux braves d'Outremont", 45.5177530, -73.6041030, "Lachapelle", 1925, 129],
        ["L'habitation en milieu urbain", 45.4576940, -73.5955150, "Laliberté", 1982, 130],
        ["Monument à Paul de Chomedey, sieur de Maisonneuve", 45.5048000, -73.5572600, "Laliberté", , 131],
        ["Monument à Louis-Octave Crémazie", 45.5173880, -73.5695810, "Laliberté", 1906, 132],
        ["Monument à John Young", 45.5001120, -73.5534270, "Laliberté", 1911, 133],
        ["Monument à Édouard VII", 45.5037240, -73.5685070, "Laliberté", 1914, 134],
        ["Acier", 45.5043070, -73.5265350, "Lamarche", 1967, 135],
        ["Le lion de Belfort", 45.4997040, -73.5702730, "Lancz", , 136],
        ["Monument aux héros de la guerre des Boers", 45.4996100, -73.5709670, "Lancz", 1907, 137],
        ["Monument à sir George-Étienne Cartier", 45.5142310, -73.5852500, "Lancz", 1919, 138],
        ["Départ de La Salle pour aller à la découverte du Mississipi", 45.5039460, -73.5873780, "Langevin", , 139],
        ["Totem Kwakiutl", 45.5049950, -73.5292840, "Langevin", 1967, 140],
        ["Iris", 45.5055320, -73.5277510, "Lapalme", 1967, 141],
        ["Monument à Émilie Gamelin", 45.5148600, -73.5597070, "Lapointe", 1999, 142],
        ["Les allusifs", 45.4788390, -73.5753390, "Larivée", 2002, 143],
        ["Lanka Mata", 45.4577510, -73.5954860, "Larivière", , 144],
        ["L'attente", 45.5326970, -73.7258440, "Lasalle", 2009, 145],
        ["La façade", 45.5227670, -73.5626700, "Lasalle", 2011, 146],
        ["La fermière", 45.5535610, -73.5396980, "Lasalle", 1915, 147],
        ["Les petits baigneurs", 45.5533590, -73.5384340, "Lasalle", 1916, 148],
        ["Monument à Dollard des Ormeaux", 45.5255940, -73.5730550, "Lasalle", 1920, 149],
        ["Monument aux braves de Lachine", 45.4365550, -73.7067380, "Lawson", 1925, 150],
        ["Monument aux Patriotes", 45.5234110, -73.5462120, "Leblanc", 1926, 151],
        ["Signal dans l'espace", 45.4241500, -73.6233110, "Leblanc", 1984, 152],
        ["Temps d'heures", 45.5413760, -73.6131770, "Leblanc", 1987, 153],
        ["Anamorphose d’une fenêtre", 45.5955130, -73.5237880, "Leblanc", , 154],
        ["Monument à John F. Kennedy", 45.5033670, -73.5736890, "Leblanc", 1986, 155],
        ["Monument à Joseph Beaubien", 45.5151610, -73.6078000, "Lebourg", 2003, 156],
        ["Buste du cardinal Paul-Émile Léger", 45.5095490, -73.5613330, "Leclerc", 2007, 157],
        ["Debout", 45.5267170, -73.5710360, "Lemieux", 1990, 158],
        ["La porte de l’avenir", 45.4572150, -73.5470320, "Lemieux", 2000, 159],
        ["Deux murales", 45.5559690, -73.5571840, "Lemieux", 1956, 160],
        ["Le théâtre de papier", 45.5473600, -73.5983750, "Lemieux", 1986, 161],
        ["Et pourtant elle tourne", 45.4894250, -73.8825440, "Lemieux", 1992, 162],
        ["La réparation", 45.5349940, -73.6799980, "Lemieux", 1998, 163],
        ["Temple du troisième millénaire", 45.4972860, -73.6896940, "Lemieux", 1990, 164],
        ["Monica", 45.4324330, -73.6834430, "Lemieux", 1985, 165],
        ["Monument à Jackie Robinson", 45.5558460, -73.5510880, "Lui", 1987, 166],
        ["Joseph-Xavier Perrault", 45.5011930, -73.5615720, "Maler", 1987, 167],
        ["Hommage à Marguerite Bourgeoys", 45.5073730, -73.5550630, "Maler", 1988, 168],
        ["Forces", 45.4859710, -73.6749620, "McCarthy", 1986, 169],
        ["Pont d'Arles en transfert", 45.4299640, -73.6661670, "Hilton-Moore", 1985, 171],
        ["Pont d'Arles en transfert", 45.4299640, -73.6661670, "McEwen", 1985, 171],
        ["Signal pour Takis", 45.4287540, -73.6827890, "Merola", 1986, 172],
        ["Lieux sans temple 3", 45.4299240, -73.6666030, "Merola", 1987, 173],
        ["Lieux sans temple 4", 45.4299230, -73.6665670, "Mihalcean", 1987, 174],
        ["Lieux sans temple 5", 45.4298820, -73.6665700, "Mihalcean", 1987, 175],
        ["Souvenir de 1955 ou 2026 Roberval", 45.4291230, -73.6818090, "Mihalcean", 1992, 176],
        ["Fontaine Wallace", 45.5054190, -73.5281200, "Millette", , 177],
        ["Triptyque sur le paysage", 45.5754430, -73.6616640, "Millette", 1997, 178],
        ["Signe solaire", 45.5132470, -73.5308890, "Millette", 1967, 179],
        ["Ashapmouchouan", 45.5268610, -73.5864450, "Mitchell", 1964, 180],
        ["Éclosion", 45.4301040, -73.6667610, "Moore", 1972, 181],
        ["À voile déchirée", 45.5301320, -73.5482580, "Moreau", 1972, 182],
        ["Sublime", 45.4779990, -73.5562370, "Morin", 1978, 183],
        ["Évolution de joie", 45.5242250, -73.5744700, "Morin", 1973, 184],
        ["Sans titre", 45.5248310, -73.5823130, "Morosoli", 1984, 185],
        ["Colonne stèle", 45.5248310, -73.5823130, "Mott", 1987, 186],
        ["Regard sur le fleuve", 45.4356090, -73.7064100, "Mott", 1992, 187],
        ["Table des matières de supports du savoir", 45.5312550, -73.6285760, "Nadeau", 2002, 188],
        ["Tango de Montréal", 45.5242290, -73.5814630, "Narita", 1999, 189],
        ["Les sons de la musique", 45.5070740, -73.5609270, "Nepveu", 1984, 190],
        ["Cheval à plume", 45.4279850, -73.6792420, "Olariu", 1988, 191],
        ["Monument aux braves de Verdun", 45.4588820, -73.5723140, "Paiement", , 193],
        ["After Babel, a Civic Square", 45.5099630, -73.5672020, "Pang", 1993, 194],
        ["Les sports", 45.5624640, -73.5473040, "Pellerin", 1960, 195],
        ["La joie", 45.5620470, -73.5500760, "Pelletier", 1960, 196],
        ["La peur", 45.5013610, -73.5552190, "Pellus", 1993, 197],
        ["Monument à la Pointe", 45.4760150, -73.5734490, "Pillhofer", 2001, 198],
        ["Daleth", 45.5345060, -73.6784360, "Pilot", 2010, 199],
        ["Trajectoire no 2", 45.4305420, -73.6668520, "Planes", 1982, 200],
        ["Trame d’appel", 45.4875390, -73.8834360, "Poliquin", 1990, 201],
        ["La naissance", 45.4485860, -73.5776110, "Poulin", 1993, 202],
        ["Le coup de départ", 45.5054150, -73.7186340, "Prent", 2009, 203],
        ["Monument à Nelson", 45.5081860, -73.5538450, "Reddy", , 204],
        ["Site/interlude", 45.4277770, -73.6769730, "Rochette", 1994, 205],
        ["Non titré (Fontaine Les chérubins)", 45.5178950, -73.6044640, "Rolland", 1927, 206],
        ["La pierre et le feu", 45.4289460, -73.6829770, "Roussil", 1985, 207],
        ["Temps d’arrêt", 45.5490620, -73.5926620, "Roussil", 2006, 208],
        ["L'eau et le transport", 45.4250530, -73.6190430, "Roussil", 1977, 209],
        ["Courbes et vent", 45.4959370, -73.8474290, "Roussil", 1990, 210],
        ["Fontaine du square Saint-Louis", 45.5170410, -73.5699640, "Sandonato", , 211],
        ["Sculpture-fontaine, square Sir-George-Étienne-Cartier", 45.4734130, -73.5863900, "Santini", , 212],
        ["Du long du long", 45.4311190, -73.6734130, "Saxe", 1985, 213],
        ["Les voûtes d'Ulysse", 45.4289160, -73.6822270, "Schleeh", 1992, 214],
        ["L'eau et les sports", 45.4250530, -73.6190430, "Sebastian", 1979, 215],
        ["From A", 45.4287430, -73.6860010, "Si Tu", 1986, 216],
        ["Force et progrès", 45.4310310, -73.6701240, "Signori", 1985, 217],
        ["Écluses", 45.4282150, -73.6782370, "Sklavos", 1988, 218],
        ["Jour ou nuit inconnue", 45.6680730, -73.4947820, "Zaccarella", 1998, 220],
        ["Jour ou nuit inconnue", 45.6680730, -73.4947820, "Taccola", 1998, 220],
        ["Ce qui reste 1997-2001", 45.5010790, -73.5555150, "Taylor", 2001, 221],
        ["Le roi Singe", 45.5069070, -73.5605900, "Tett", 1984, 222],
        ["Espace vert", 45.5195790, -73.6192470, "Yamazaki", 2006, 224],
        ["Espace vert", 45.5195790, -73.6192470, "Tett", 2006, 224],
        ["Être +", 45.5596850, -73.5815820, "Théberge", , 225],
        ["Le serment de Dollard des Ormeaux et de ses compagnons", 45.5039650, -73.5873280, "Gendreau", , 227],
        ["Le serment de Dollard des Ormeaux et de ses compagnons", 45.5039650, -73.5873280, "Théberge", , 227],
        ["Monument à Jean-Olivier Chénier", 45.5110420, -73.5549600, "Thorvaldsen", , 228],
        ["Sans titre", 45.4999940, -73.5944890, "Topham", 1964, 229],
        ["Maisonneuve érige une croix sur la montagne", 45.5039950, -73.5872780, "Toto", , 230],
        ["Monument à Isabelle la Catholique", 45.5310790, -73.5860230, "Trudeau", 1958, 231],
        ["Épisode", 45.5604830, -73.5585570, "Trudeau", 1966, 232],
        ["Continuum 2009 (à la mémoire de Pierre Perrault)", 45.6042490, -73.5095480, "Trudeau", 2009, 233],
        ["Explorer", 45.4288900, -73.6808530, "Vaillancourt", 1994, 234],
        ["Sans titre", 45.5000250, -73.5940550, "Vaillancourt", 1964, 235],
        ["Non titré", 45.4960730, -73.6221160, "Vaillancourt", 1983, 236],
        ["Non titré (Portes)", 45.4756050, -73.6145870, "Vaillancourt", 1983, 237],
        ["Le phare d'Archimède", 45.4291610, -73.6882050, "Vaillancourt", 1986, 238],
        ["Le déjeuner sur l’herbe", 45.4284820, -73.6775760, "Valade", 1997, 239],
        ["Girafes", 45.5200490, -73.5320320, "Valade", 1966, 240],
        ["Migration", 45.5140750, -73.5346550, "Valade", 1967, 241],
        ["Hommage à René Lévesque", 45.4287490, -73.6871240, "Van Der Heide", 1988, 242],
        ["Lieu", 45.5163500, -73.7253940, "Vazan", 1990, 243],
        ["Les promeneurs", 45.5272730, -73.6868820, "Vazan", 1990, 244],
        ["Trampolino", 45.5857230, -73.5966440, "Vazan", 2001, 245],
        ["Dex", 45.4304290, -73.6662290, "Vermette", 1977, 246],
        ["Affinités", 45.4958320, -73.5961900, "Viger", 1967, 247],
        ["Puerta de la Amistad", 45.5110150, -73.5333860, "Vincent", 1993, 248],
        ["Monument à Norman Bethune", 45.4959700, -73.5794600, "Vivot", 1977, 249],
        ["Sans titre", 45.5005000, -73.5943350, "Wade", 1964, 250],
        ["Les sœurs cardinales", 45.4998810, -73.5948160, "Widgery", 1964, 251],
        ["L'ange de pierre", 45.5004210, -73.5937590, "Widgery", 1964, 252],
        ["Non titré", 45.5820480, -73.5824850, "Winant", 1986, 253],
        ["La fondation de Montréal est décidée à Paris", 45.5040200, -73.5872380, "Witebsky", , 254],
        ["Polaris en lumière", 45.5046360, -73.5571280, "Wood", 2012, 255],
        ["Équinoxe", 45.5081800, -73.5512900, "Hannah", 1998, 256],
        ["Force", 45.5126250, -73.5538210, "Bélanger", 1985, 257],
        ["Murale céramique", 45.5620470, -73.5500760, "Besner", 1960, 258],
        ["Monument à Nicolas Copernic", 45.5606410, -73.5493750, 1967, 259],
        ["Dollard des Ormeaux meurt à Long-Sault pour sauver la colonie", 45.5041050, -73.5872590, "Montillaud", , 260],
        ["Buste de José de San Martin", 45.4893650, -73.5808910, "Wilson", 2000, 261],
        ["Spatio-mobile #1", 45.4303170, -73.6663150, 1966, 262]
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
            var style = ''
            var content = '<div><p style="color:#103C61; font-size:30px; font-family: Open Sans; font-style: normal; font-weight: bold; font-size: 18px; line-height: 25px; display: flex; align-items: center; text-transform: uppercase;">'+oeuvre[0]+'</p>'+'<p style="color:#103C61;">'+oeuvre[3]+', '+oeuvre[4]+'</p>'+'<a href="../../oeuvre/'+oeuvre[5]+'" style="color:#DF8E32; text-decoration:none;">'+"Plus d'informations >"+'</a></div>';
            var infowindow = new google.maps.InfoWindow();

//            console.log(oeuvre[0]);
            var marker = new google.maps.Marker({
                position: {lat: oeuvre[1], lng: oeuvre[2]},
                map: map,
                icon: icon,
                shape: shape,
                title: oeuvre[0]
//                zIndex: oeuvre[3]
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
            // Bounds for North America
               var allowedBounds = new google.maps.LatLngBounds(
                 new google.maps.LatLng(45.4079982, -73.9446209), 
                 new google.maps.LatLng(45.6876557, -73.5051969));

               // Listen for the dragend event
               google.maps.event.addListener(map, 'dragend', function() {
                 if (allowedBounds.contains(map.getCenter())) return;

                 // Out of bounds - Move the map back within the bounds

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8S4xg4xxyN0iGGBdUOpR3xRa4DIkD710&callback=initMap"
    async defer></script>
  </body>
</html>