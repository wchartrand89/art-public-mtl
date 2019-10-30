	<?php error_reporting(E_ALL ^ E_WARNING);  ?>
    <?php

        $document = cookie();
        $text_presentation = $document->getElementById("presentation")->nodeValue;
        $text_pres_contenu_p1 = $document->getElementById("pres_contenu_p1")->nodeValue;
        $text_pres_contenu_p2 = $document->getElementById("pres_contenu_p2")->nodeValue;
        $text_faq = $document->getElementById("faq")->nodeValue;
        $text_faq_q1 = $document->getElementById("faq_q1")->nodeValue;
        $text_faq_q1_p1 = $document->getElementById("faq_q1_p1")->nodeValue;
        $text_faq_q1_p2 = $document->getElementById("faq_q1_p2")->nodeValue;
        $text_faq_q1_p3 = $document->getElementById("faq_q1_p3")->nodeValue;
        $text_faq_q1_p4 = $document->getElementById("faq_q1_p4")->nodeValue;
        $text_faq_q1_p5 = $document->getElementById("faq_q1_p5")->nodeValue;
        $text_faq_q1_p6 = $document->getElementById("faq_q1_p6")->nodeValue;
        $text_faq_q1_p7 = $document->getElementById("faq_q1_p7")->nodeValue;
        $text_faq_q1_p8 = $document->getElementById("faq_q1_p8")->nodeValue;
        $text_faq_q1_p9 = $document->getElementById("faq_q1_p9")->nodeValue;
        $text_faq_q2 = $document->getElementById("faq_q2")->nodeValue;
        $text_faq_q2_p1 = $document->getElementById("faq_q2_p1")->nodeValue;
        $text_faq_q2_p1 = $document->getElementById("faq_q2_p1")->nodeValue;
        $text_faq_q2_p1 = $document->getElementById("faq_q2_p1")->nodeValue;
        $text_faq_q3 = $document->getElementById("faq_q3")->nodeValue;
        $text_faq_q3_p1 = $document->getElementById("faq_q3_p1")->nodeValue;
        $text_faq_q3_p2 = $document->getElementById("faq_q3_p2")->nodeValue;
        $text_faq_q3_p3 = $document->getElementById("faq_q3_p3")->nodeValue;
        $text_faq_q3_p4 = $document->getElementById("faq_q3_p4")->nodeValue;
?>
<section class="contenu-apropos">
    <h3>À propos</h3>
    <div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_details" onclick="javascript:change_onglet('details');"><?php echo $text_presentation; ?></span>
            <span class="onglet_0 onglet" id="onglet_artiste" onclick="javascript:change_onglet('artiste');"><?php echo $text_faq; ?></span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_details">
                <section class="texte">
                    <p><?php echo $text_pres_contenu_p1; ?>
                    </p>
                    <br>
                    <p>
                    <?php echo $text_pres_contenu_p2; ?>
                    </p>
                </section>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_artiste">
                <h2></h2>

                <button class="accordion"><?php echo $text_faq_q1; ?></button>
                <div class="panel">
                    <p><?php echo $text_faq_q1_p1; ?></p>
                    <br>
                    <strong><?php echo $text_faq_q1_p2; ?></strong> 
                    <br>
                    <p><?php echo $text_faq_q1_p3; ?></p>
                    <br>
                    <strong><?php echo $text_faq_q1_p4; ?></strong>
                    <br>
                    <p><?php echo $text_faq_q1_p5; ?></p>
                    <br>
                    <strong><?php echo $text_faq_q1_p6; ?></strong>
                    <br>
                    <p><?php echo $text_faq_q1_p7; ?></p>
                    <br>
                    <p><?php echo $text_faq_q1_p8; ?></p>
                    <br>
                    <p><?php echo $text_faq_q1_p9; ?></p>
                </div>

                <button class="accordion"><?php echo $text_faq_q2; ?></button>
                <div class="panel">
                    <p><?php echo $text_faq_q2_p1; ?></p>
                    <br>
                    <p><?php echo $text_faq_q2_p2; ?></p>
                    <br>
                    <p><?php echo $text_faq_q2_p3; ?></p>
                </div>

                <button class="accordion"><?php echo $text_faq_q3; ?></button>
                <div class="panel">
                    <p><?php echo $text_faq_q3_p1; ?><p>
                    <br>
                    <strong><?php echo $text_faq_q3_p2; ?></strong>
                    <br>
                    <p><?php echo $text_faq_q3_p3; ?></p>
                    <br>
                    <p><?php echo $text_faq_q3_p4; ?></p>
                </div>
            </div>	
		</div>
	</div>
</section>