
<section class="contenu-contact">

    <?php if($message!=null) {
        echo($message);
    }
    ?>
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
                <form action="/art-public-mtl/api/contact" method="post">
                    <fieldset>
                        <h3>Contactez-nous</h3>
                        Nom:<br>
                        <input type="text" name="nom" value="">
                        <br>
                        Pr&eacute;nom:<br>
                        <input type="text" name="prenom" value="">
                        <br>
                        Courriel:<br>
                        <input type="text" name="courriel" value="">
                        <br>
                        Sujet :
                        <select name="sujet">
                            <option value="Proposition">Proposition d'oeuvre</option>
                            <option value="Demande">Demande de compte</option>
                            <option value="Signaler">Signaler des domages d'une oeuvre</option>
                            <option value="Autre">Autre</option>
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
