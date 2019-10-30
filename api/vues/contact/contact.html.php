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
<section class="contenu-contact">
    <h3>Contact</h3>
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
                    <iframe src="https://www.google.com/maps/d/embed?mid=1nrpE60oVxUEQEUOvHFRT5c-33P5zf6Ix" width="640" height="480"></iframe>
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