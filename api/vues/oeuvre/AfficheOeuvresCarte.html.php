
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
        ["Source", 45.4664050, -73.6316480, 2010],
        ["Porte de jour", 45.5120900, -73.5509790, 2004],
        ["Regarder les pommetiers", 45.5615850, -73.5626730, 2007],
        ["Le malheureux magnifique", 45.5169070, -73.5678460, 1972],
        ["Les clochards célestes", 45.5168530, -73.5551530, 1983],
        ["Discours du roi poète", 45.4723900, -73.5847040, 1982],
        ["Hommage à Jérôme Le Royer De La Dauversière", 45.5084930, -73.5533000, 1999],
        ["Obélisque oblique", 45.5060460, -73.5267060, 1967],
        ["La source", 45.5347520, -73.6178450, 1998],
        ["Vous êtes ici", 45.5511830, -73.5405390, 2006],
        ["Non titré (Murale en relief et sculpture)", 45.5397130, -73.5761100, 1962],
        ["Non titré (Vitraux)", 45.5088160, -73.5540690, ],
        ["Non titré (Vitraux)", 45.5217780, -73.6015480, ],
        ["Non titré (Vitraux)", 45.5227410, -73.5653310, 1917],
        ["Non titré (Vitraux)", 45.5318140, -73.5871310, 1930],
        ["Non titré (Murale inuit)", 45.5037920, -73.5293220, 1967],
        ["Non titré (Murale peinte)", 45.6766030, -73.4914230, ],
        ["Non titré (Fontaine, mosaïque)", 45.4723080, -73.5729440, ],
        ["Bibliotheca Universalis", 45.5031300, -73.6369470, 2006],
        ["Chibouki", 45.5033020, -73.6367760, 2006],
        ["La mort de Dante", 45.5344450, -73.6117210, 1921],
        ["Champlain visite de nouveau le site de Montréal en 1611", 45.5039090, -73.5874520, ],
        ["Monument à Jean Vauquelin", 45.5085880, -73.5546550, 1927],
        ["Smoke and steel", 45.5827050, -73.5857740, ],
        ["Le cycliste", 45.4566550, -73.5427460, 1990],
        ["Contournement", 45.5609420, -73.6352330, 2008],
        ["L'arbre des générations", 45.4306990, -73.6661130, 1987],
        ["Vire au vent", 45.4284800, -73.6824510, 1988],
        ["Sans titre", 45.5582180, -73.5636440, 1961],
        ["Carte du site de Montréal par Champlain en 1611", 45.5039860, -73.5875850, ],
        ["Les voyages de Jacques Cartier au Canada en 1534 et 1535", 45.5039610, -73.5876570, ],
        ["Les voyages de Jacques Cartier au Canada en 1534 et 1535", 45.5039610, -73.5876570, ],
        ["Montréal de 1645 à 1672", 45.5039450, -73.5876970, ],
        ["Montréal en 1760", 45.5039180, -73.5877310, ],
        ["Jacques Cartier est reçu par le chef Agouhana", 45.5038420, -73.5877070, ],
        ["Jacques Cartier est reçu par le chef Agouhana", 45.5038420, -73.5877070, ],
        ["Parades Parures", 45.6498030, -73.5789610, 1999],
        ["Le village imaginé. «Le renard l'emporte, le suit à la trace…»", 45.4751580, -73.5588620, 2005],
        ["Monument à Jean Drapeau", 45.5085300, -73.5534200, 2001],
        ["Hommage à Maurice Richard", 45.5626820, -73.5469570, ],
        ["La montagne des jours", 45.5070690, -73.5900310, 1991],
        ["Mémoire ardente", 45.5089320, -73.5510620, 1994],
        ["Les jours d'été quand le fleuve monte à l'assaut des murs, hommage à Marie Uguay", 45.5031300, -73.6369470, 2006],
        ["Monument à sir Wilfrid Laurier", 45.4994744, -73.5710610, 1953],
        ["Monument au frère André", 45.5033090, -73.5666000, 1986],
        ["Neuf couleurs au vent", 45.5217090, -73.5657760, 1984],
        ["Sans titre", 45.4993270, -73.5946040, 1964],
        ["Table Ronde", 45.4281340, -73.6617710, 1984],
        ["Trois disques", 45.5106580, -73.5368370, 1967],
        ["Hermès", 45.4287520, -73.6834350, 1986],
        ["Sans titre", 45.5000360, -73.5949960, 1964],
        ["Non titré", 45.5190700, -73.5560710, 1981],
        ["Trilogie", 45.4301060, -73.6667570, 1985],
        ["Communion", 45.4239580, -73.5985740, 1990],
        ["Non titré (mosaïque en céramique)", 45.4664250, -73.5958110, ],
        ["Monument à Giovanni Caboto", 45.4894900, -73.5836520, 1931],
        ["Non titré ", 45.5128320, -73.5345730, 1952],
        ["La femme-fontaine", 45.4483990, -73.5776210, 1967],
        ["Le carrousel sauvage", 45.5011690, -73.5940400, 1964],
        ["Le carrousel sauvage", 45.5011690, -73.5940400, 1964],
        ["Le carrousel sauvage", 45.5011690, -73.5940400, 1964],
        ["Décor", 45.4298750, -73.6664090, 1965],
        ["L'eau et la nourriture", 45.4250530, -73.6190430, 1977],
        ["Le mélomane", 45.5622000, -73.6008520, 2011],
        ["Mélangez le Tout", 45.5343400, -73.5527330, 2011],
        ["Caesura", 45.5375120, -73.6280200, 1991],
        ["Theatre for Sky Blocks", 45.4338930, -73.6967500, 1992],
        ["Les graminées du jardin Saint-Sulpice", 45.5593480, -73.6416080, 2007],
        ["Give Peace a Chance", 45.5050070, -73.5838200, 2009],
        ["Monument au frère Marie-Victorin", 45.5572810, -73.5559030, 1951],
        ["Le lion de La Feuillée", 45.5587960, -73.5556370, ],
        ["Agora", 45.5120750, -73.5548190, 1983],
        ["Mastodo", 45.5118000, -73.5546810, 1984],
        ["Cailloudo", 45.5124570, -73.6767990, 1990],
        ["Hommage à Claude Jutra", 45.5132400, -73.5729450, 1997],
        ["La ville imaginaire", 45.5126970, -73.5377140, 1997],
        ["Révolutions", 45.5239850, -73.5527310, 2003],
        ["L'arc", 45.5058550, -73.5277410, 2009],
        ["Buste du Dr. José P. Rizal", 45.4910140, -73.6340790, 1999],
        ["Monument à Christophe Colomb", 45.5451140, -73.6101940, 1976],
        ["Cosmos", 45.6681310, -73.4946210, 1966],
        ["Obélisque en hommage à Charles de Gaulle", 45.5261070, -73.5647590, 1992],
        ["China Wall", 45.4285620, -73.6816820, 1988],
        ["Maisonneuve fonde Montréal le 18 mai 1642", 45.5038190, -73.5876410, ],
        ["Portail avec bas-reliefs", 45.5134270, -73.5468860, 1987],
        ["Place du Temple", 45.4236200, -73.6249150, 1990],
        ["Fontaine de vie", 45.4331620, -73.6812580, 1977],
        ["Buste de Simon Bolivar", 45.4894860, -73.5809190, 1991],
        ["Albarello", 45.4299400, -73.6668440, 1994],
        ["À la croisée des mots", 45.4837970, -73.5751050, 2004],
        ["Mots choisis", 45.6681310, -73.4946210, 2006],
        ["Hommage aux forces vitales du Québec", 45.4200520, -73.6033720, 1987],
        ["Monument aux braves de N.D.G.", 45.4724990, -73.6137260, 1919],
        ["Optimax", 45.5009110, -73.5932880, 1964],
        ["Non titré", 45.4456920, -73.6513310, ],
        ["Non titré", 45.4456920, -73.6513310, ],
        ["Les baigneurs", 45.4663390, -73.5956150, ],
        ["Les baigneurs", 45.5624640, -73.5473040, ],
        ["L'eau et la santé", 45.4250530, -73.6190430, 1977],
        ["Une leçon d'histoire", 45.5330420, -73.5518580, 1986],
        ["Delos, septième porte de la perfection et de l'immortalité, Convoi III", 45.5344960, -73.5622380, 2006],
        ["Champlain explore le site de Montréal en 1603", 45.5038770, -73.5874920, ],
        ["Nous deux", 45.4299830, -73.6669890, 1972],
        ["Colonne", 45.5189920, -73.5819930, 1985],
        ["États de choc", 45.4384290, -73.7182090, 1985],
        ["La ville blanche", 45.4284480, -73.6803500, 1986],
        ["Espace cubique ou hommage à Malevitch", 45.4299010, -73.6665790, 1992],
        ["Le jardin de Lyon", 45.5124700, -73.5554610, 2000],
        ["Le jardin de Lyon", 45.5124700, -73.5554610, 2000],
        ["Orbite optique no 2", 45.5225070, -73.5346490, 1967],
        ["Fontaine", 45.5139580, -73.5529210, 1984],
        ["Athéna", 45.5277400, -73.6242820, 1997],
        ["Hommage à Mihai Eminescu, poète roumain", 45.5147960, -73.5764590, 2005],
        ["Trait d'union", 45.5864720, -73.5971390, 1984],
        ["Les leçons singulières (volet 1)", 45.5215800, -73.5704560, 1990],
        ["Les leçons singulières (volet 2)", 45.5234170, -73.5685570, 1991],
        ["Détour : le grand jardin", 45.4283730, -73.6811150, 1994],
        ["Le carrousel de l’île", 45.4658110, -73.5447780, 2005],
        ["Un jardin à soi", 45.5609560, -73.5658220, 2010],
        ["Monument pour L", 45.4347600, -73.6998920, 1992],
        ["Volatiles", 45.4366610, -73.6077680, ],
        ["Nef pour quatorze reines", 45.4960420, -73.6177020, 1999],
        ["Hommage aux travailleurs", 45.6007020, -73.6384560, 1973],
        ["Monument à Émile Nelligan", 45.5162150, -73.5702840, 2005],
        ["Monument à Émile Nelligan", 45.5162150, -73.5702840, 2005],
        ["Songes", 45.6165400, -73.6209700, 2006],
        ["Jacques Cartier atterit à Hochelaga en 1535", 45.5039070, -73.5874280, ],
        ["Monument à sir Louis-Hippolyte La Fontaine", 45.5230170, -73.5663280, 1930],
        ["Monument aux braves d'Outremont", 45.5177530, -73.6041030, 1925],
        ["L'habitation en milieu urbain", 45.4576940, -73.5955150, 1982],
        ["Monument à Paul de Chomedey, sieur de Maisonneuve", 45.5048000, -73.5572600, ],
        ["Monument à Louis-Octave Crémazie", 45.5173880, -73.5695810, 1906],
        ["Monument à John Young", 45.5001120, -73.5534270, 1911],
        ["Monument à Édouard VII", 45.5037240, -73.5685070, 1914],
        ["Acier", 45.5043070, -73.5265350, 1967],
        ["Le lion de Belfort", 45.4997040, -73.5702730, ],
        ["Monument aux héros de la guerre des Boers", 45.4996100, -73.5709670, 1907],
        ["Monument à sir George-Étienne Cartier", 45.5142310, -73.5852500, 1919],
        ["Départ de La Salle pour aller à la découverte du Mississipi", 45.5039460, -73.5873780, ],
        ["Totem Kwakiutl", 45.5049950, -73.5292840, 1967],
        ["Iris", 45.5055320, -73.5277510, 1967],
        ["Monument à Émilie Gamelin", 45.5148600, -73.5597070, 1999],
        ["Les allusifs", 45.4788390, -73.5753390, 2002],
        ["Lanka Mata", 45.4577510, -73.5954860, ],
        ["L'attente", 45.5326970, -73.7258440, 2009],
        ["La façade", 45.5227670, -73.5626700, 2011],
        ["La fermière", 45.5535610, -73.5396980, 1915],
        ["Les petits baigneurs", 45.5533590, -73.5384340, 1916],
        ["Monument à Dollard des Ormeaux", 45.5255940, -73.5730550, 1920],
        ["Monument aux braves de Lachine", 45.4365550, -73.7067380, 1925],
        ["Monument aux Patriotes", 45.5234110, -73.5462120, 1926],
        ["Signal dans l'espace", 45.4241500, -73.6233110, 1984],
        ["Temps d'heures", 45.5413760, -73.6131770, 1987],
        ["Anamorphose d’une fenêtre", 45.5955130, -73.5237880, ],
        ["Monument à John F. Kennedy", 45.5033670, -73.5736890, 1986],
        ["Monument à Joseph Beaubien", 45.5151610, -73.6078000, 2003],
        ["Buste du cardinal Paul-Émile Léger", 45.5095490, -73.5613330, 2007],
        ["Debout", 45.5267170, -73.5710360, 1990],
        ["La porte de l’avenir", 45.4572150, -73.5470320, 2000],
        ["Deux murales", 45.5559690, -73.5571840, 1956],
        ["Le théâtre de papier", 45.5473600, -73.5983750, 1986],
        ["Et pourtant elle tourne", 45.4894250, -73.8825440, 1992],
        ["La réparation", 45.5349940, -73.6799980, 1998],
        ["Temple du troisième millénaire", 45.4972860, -73.6896940, 1990],
        ["Monica", 45.4324330, -73.6834430, 1985],
        ["Monument à Jackie Robinson", 45.5558460, -73.5510880, 1987],
        ["Joseph-Xavier Perrault", 45.5011930, -73.5615720, 1987],
        ["Hommage à Marguerite Bourgeoys", 45.5073730, -73.5550630, 1988],
        ["Forces", 45.4859710, -73.6749620, 1986],
        ["Pont d'Arles en transfert", 45.4299640, -73.6661670, 1985],
        ["Pont d'Arles en transfert", 45.4299640, -73.6661670, 1985],
        ["Signal pour Takis", 45.4287540, -73.6827890, 1986],
        ["Lieux sans temple 3", 45.4299240, -73.6666030, 1987],
        ["Lieux sans temple 4", 45.4299230, -73.6665670, 1987],
        ["Lieux sans temple 5", 45.4298820, -73.6665700, 1987],
        ["Souvenir de 1955 ou 2026 Roberval", 45.4291230, -73.6818090, 1992],
        ["Fontaine Wallace", 45.5054190, -73.5281200, ],
        ["Triptyque sur le paysage", 45.5754430, -73.6616640, 1997],
        ["Signe solaire", 45.5132470, -73.5308890, 1967],
        ["Ashapmouchouan", 45.5268610, -73.5864450, 1964],
        ["Éclosion", 45.4301040, -73.6667610, 1972],
        ["À voile déchirée", 45.5301320, -73.5482580, 1972],
        ["Sublime", 45.4779990, -73.5562370, 1978],
        ["Évolution de joie", 45.5242250, -73.5744700, 1973],
        ["Sans titre", 45.5248310, -73.5823130, 1984],
        ["Colonne stèle", 45.5248310, -73.5823130, 1987],
        ["Regard sur le fleuve", 45.4356090, -73.7064100, 1992],
        ["Table des matières de supports du savoir", 45.5312550, -73.6285760, 2002],
        ["Tango de Montréal", 45.5242290, -73.5814630, 1999],
        ["Les sons de la musique", 45.5070740, -73.5609270, 1984],
        ["Cheval à plume", 45.4279850, -73.6792420, 1988],
        ["Monument aux braves de Verdun", 45.4588820, -73.5723140, ],
        ["After Babel, a Civic Square", 45.5099630, -73.5672020, 1993],
        ["Les sports", 45.5624640, -73.5473040, 1960],
        ["La joie", 45.5620470, -73.5500760, 1960],
        ["La peur", 45.5013610, -73.5552190, 1993],
        ["Monument à la Pointe", 45.4760150, -73.5734490, 2001],
        ["Daleth", 45.5345060, -73.6784360, 2010],
        ["Trajectoire no 2", 45.4305420, -73.6668520, 1982],
        ["Trame d’appel", 45.4875390, -73.8834360, 1990],
        ["La naissance", 45.4485860, -73.5776110, 1993],
        ["Le coup de départ", 45.5054150, -73.7186340, 2009],
        ["Monument à Nelson", 45.5081860, -73.5538450, ],
        ["Site/interlude", 45.4277770, -73.6769730, 1994],
        ["Non titré (Fontaine Les chérubins)", 45.5178950, -73.6044640, 1927],
        ["La pierre et le feu", 45.4289460, -73.6829770, 1985],
        ["Temps d’arrêt", 45.5490620, -73.5926620, 2006],
        ["L'eau et le transport", 45.4250530, -73.6190430, 1977],
        ["Courbes et vent", 45.4959370, -73.8474290, 1990],
        ["Fontaine du square Saint-Louis", 45.5170410, -73.5699640, ],
        ["Sculpture-fontaine, square Sir-George-Étienne-Cartier", 45.4734130, -73.5863900, ],
        ["Du long du long", 45.4311190, -73.6734130, 1985],
        ["Les voûtes d'Ulysse", 45.4289160, -73.6822270, 1992],
        ["L'eau et les sports", 45.4250530, -73.6190430, 1979],
        ["From A", 45.4287430, -73.6860010, 1986],
        ["Force et progrès", 45.4310310, -73.6701240, 1985],
        ["Écluses", 45.4282150, -73.6782370, 1988],
        ["Jour ou nuit inconnue", 45.6680730, -73.4947820, 1998],
        ["Jour ou nuit inconnue", 45.6680730, -73.4947820, 1998],
        ["Ce qui reste 1997-2001", 45.5010790, -73.5555150, 2001],
        ["Le roi Singe", 45.5069070, -73.5605900, 1984],
        ["Espace vert", 45.5195790, -73.6192470, 2006],
        ["Espace vert", 45.5195790, -73.6192470, 2006],
        ["Être +", 45.5596850, -73.5815820, ],
        ["Le serment de Dollard des Ormeaux et de ses compagnons", 45.5039650, -73.5873280, ],
        ["Le serment de Dollard des Ormeaux et de ses compagnons", 45.5039650, -73.5873280, ],
        ["Monument à Jean-Olivier Chénier", 45.5110420, -73.5549600, ],
        ["Sans titre", 45.4999940, -73.5944890, 1964],
        ["Maisonneuve érige une croix sur la montagne", 45.5039950, -73.5872780, ],
        ["Monument à Isabelle la Catholique", 45.5310790, -73.5860230, 1958],
        ["Épisode", 45.5604830, -73.5585570, 1966],
        ["Continuum 2009 (à la mémoire de Pierre Perrault)", 45.6042490, -73.5095480, 2009],
        ["Explorer", 45.4288900, -73.6808530, 1994],
        ["Sans titre", 45.5000250, -73.5940550, 1964],
        ["Non titré", 45.4960730, -73.6221160, 1983],
        ["Non titré (Portes)", 45.4756050, -73.6145870, 1983],
        ["Le phare d'Archimède", 45.4291610, -73.6882050, 1986],
        ["Le déjeuner sur l’herbe", 45.4284820, -73.6775760, 1997],
        ["Girafes", 45.5200490, -73.5320320, 1966],
        ["Migration", 45.5140750, -73.5346550, 1967],
        ["Hommage à René Lévesque", 45.4287490, -73.6871240, 1988],
        ["Lieu", 45.5163500, -73.7253940, 1990],
        ["Les promeneurs", 45.5272730, -73.6868820, 1990],
        ["Trampolino", 45.5857230, -73.5966440, 2001],
        ["Dex", 45.4304290, -73.6662290, 1977],
        ["Affinités", 45.4958320, -73.5961900, 1967],
        ["Puerta de la Amistad", 45.5110150, -73.5333860, 1993],
        ["Monument à Norman Bethune", 45.4959700, -73.5794600, 1977],
        ["Sans titre", 45.5005000, -73.5943350, 1964],
        ["Les sœurs cardinales", 45.4998810, -73.5948160, 1964],
        ["L'ange de pierre", 45.5004210, -73.5937590, 1964],
        ["Non titré", 45.5820480, -73.5824850, 1986],
        ["La fondation de Montréal est décidée à Paris", 45.5040200, -73.5872380, ],
        ["Polaris en lumière", 45.5046360, -73.5571280, 2012],
        ["Équinoxe", 45.5081800, -73.5512900, 1998],
        ["Force", 45.5126250, -73.5538210, 1985],
        ["Murale céramique", 45.5620470, -73.5500760, 1960],
        ["Monument à Nicolas Copernic", 45.5606410, -73.5493750, 1967],
        ["Dollard des Ormeaux meurt à Long-Sault pour sauver la colonie", 45.5041050, -73.5872590, ],
        ["Buste de José de San Martin", 45.4893650, -73.5808910, 2000],
        ["Spatio-mobile #1", 45.4303170, -73.6663150, 1966]
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
			