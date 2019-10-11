
            <aside id="menu_aside">
				<a id="menu_oeuvre" href="/art-public-mtl/api/admin/oeuvre"><img src="../../../img/icons/imageBlanch.svg" alt="icon image"><p class="text_menu">Oeuvres</p></a>
				<a id="menu_artistes" href="/art-public-mtl/api/admin/artiste"><img src="../../../img/icons/paletteBlanch.svg" alt="icon image"><p class="text_menu">Artistes</p></a>
				<a id="menu_utilisateurs" href=""><img src="../../../img/icons/personBlanch.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
			</aside>
            <div id="formAdmin">
                <span id="retour">
                    <a id="a_image" href="javascript:history.back()"><img src="../../../img/icons/retour_fleche.svg" alt=""></a>
                    <p>Retour</p>
                </span>
                <p id="text_form_admin">AJOUT D'UN ARTISTE</p>
                <form id='inputs_form' action="/art-public-mtl/api/admin/artiste/ajouterArtiste" method="post">	

                    <div class="div_form">
                        <label for="titre">Nom de l'artiste</label>
                        <input class="box" type="text" name="nom" value="" id="nom">
                    </div>
                    <div class="div_form">
                        <label for="titre">Prenom de l'artiste</label>
                        <input class="box" type="text" name="prenom" value="" id="prenom">
                    </div>
                    <div class="div_form">
                        <label for="titre">Nom de collectif</label>
                        <input class="box" type="text" name="nomCollectif" value="" id="nomCollectif">
                    </div> 
                    <div class="div_form">
                        <label for="titre">Description de l'artiste</label>
                        <input class="box" type="text" name="description" value="" id="description" >
                    </div>               
                    <div class="div_form">
                        <label for="titre">Site web de l'artiste</label>
                        <input class="box" type="text" name="siteWeb" value="" id="siteWeb">
                    </div> 
                    <div id=btns_form>
                        <input type="button" id="annuler" value="Annuler">
                        <input type="submit" id="envoyer" value="Ajouter">                        
                    </div>			 
            </form>
            
               
            </div>        
            