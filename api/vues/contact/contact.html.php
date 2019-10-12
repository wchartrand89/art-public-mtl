
<section class="contenu-contact">
    <h3>Contactez-nous</h3>

    <div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_details" onclick="javascript:change_onglet('details');">Localisation</span>
            <span class="onglet_0 onglet" id="onglet_artiste" onclick="javascript:change_onglet('artiste');">&Eacute;crivez-nous</span>
            <span class="onglet_0 onglet" id="onglet_carte" onclick="javascript:change_onglet('carte');">M&eacute;dias</span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_details">
                <section class="texte">
                    <p>
                    <strong>Campus principal</strong>
                    <br>
                    3800, rue Sherbrooke Est
                    <br>
                    Montr&eacute;al (Qu&eacute;bec) H1X 2A2
                    <br>
                    T&eacute;l.: 514 254-7131
                    </p>
                    <div class="carte_contact">
                    <iframe src="https://www.google.com/maps/d/embed?mid=1nrpE60oVxUEQEUOvHFRT5c-33P5zf6Ix" width="640" height="480"></iframe>
                    </div>
                </section>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_artiste">
                <form action="/action_page.php">
                    <fieldset>
                        <legend>Contactez-nous</legend>
                        Nom:<br>
                        <input type="text" name="firstname" value="Mickey">
                        <br>
                        Pr&eacute;nom:<br>
                        <input type="text" name="lastname" value="Mouse">
                        <br>
                        Courriel:<br>
                        <input type="text" name="lastname" value="Mouse">
                        <br>
                        <select name="cars">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="fiat">Fiat</option>
                            <option value="audi">Audi</option>
                        </select>
                        <br>
                        <p>Commentaire :</p>
                        <br>
                        <textarea name="message" rows="10" cols="30"></textarea>
                        <br><br>
                        <input type="submit" value="Envoyer">
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