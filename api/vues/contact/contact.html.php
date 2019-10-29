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
                <form action="mailto:contact@artpublicmontreal.ca">
                    <fieldset>
                        <h3>Contactez-nous</h3>
                        Nom:<br>
                        <input type="text" name="firstname" value="">
                        <br>
                        Pr&eacute;nom:<br>
                        <input type="text" name="lastname" value="">
                        <br>
                        Courriel:<br>
                        <input type="text" name="lastname" value="">
                        <br>
                        Sujet :
                        <select name="sujet">
                            <option value="volvo">Proposition d'oeuvre</option>
                            <option value="saab">Demande de compte</option>
                            <option value="fiat">Signaler des domages d'une oeuvre</option>
                            <option value="audi">Autre</option>
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