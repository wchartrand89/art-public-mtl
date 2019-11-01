<?php error_reporting(E_ALL ^ E_WARNING);  ?>
<?php
        $document = cookie();
        $texte_connexion = $document->getElementById("connexion")->nodeValue;
        $texte_user = $document->getElementById("user")->nodeValue;
        $texte_pass = $document->getElementById("pass")->nodeValue;
        $texte_pas_de_compte = $document->getElementById("pas_de_compte")->nodeValue;
        $texte_inscrire = $document->getElementById("s_inscrire")->nodeValue;
?>
<section class="connexion">
    <h2><?php echo $texte_connexion ?></h2>
    <form id='connection' action="/art-public-mtl/api/compte/connexion" method="post">
        <div>
            <label for="name">
                <p class="pConnexion titreBtn"><?php echo $texte_user; ?></p>
            </label>
            <input class="inputText" type="text" id="name" name="login">
        </div>
        <div>
            <label for="mdp">
                <p class="pConnexion titreBtn"><?php echo $texte_pass; ?></p>
            </label>
            <input class="inputText" type="password" id="mdp" name="mdp">
        </div>
        <div>
            <input class="btnConnexion btnLarge" type="submit" id="envoyer" value="<?php echo $texte_connexion ?>">
        </div>
    </form>
</section>

<section class="inscription">
    <div>
        <p><?php echo $texte_pas_de_compte; ?></p>
        <div class="lienInscription">
            <a href="/art-public-mtl/api/compte/inscription" class="txtLien"><?php echo $texte_inscrire; ?><i class="material-icons">chevron_right</i></a>
        </div>
    </div>
        
        
    </section>
</main>

