<?php error_reporting(E_ALL ^ E_WARNING);  ?>
<?php
    $document = cookie();
    $texte_connexion = $document->getElementById("connexion")->nodeValue;
    $texte_inscription = $document->getElementById("inscription")->nodeValue;
    $texte_user = $document->getElementById("user")->nodeValue;
    $texte_pass = $document->getElementById("pass")->nodeValue;
    $texte_t_email = $document->getElementById("text_email")->nodeValue;
    $texte_t_email_ph = $document->getElementById("text_email_ph")->nodeValue;
    $texte_confirmer = $document->getElementById("confirmer")->nodeValue;
    $texte_deja_compte = $document->getElementById("deja_compte")->nodeValue;
    $texte_se_connecter = $document->getElementById("se_connecter")->nodeValue;

    $texte_err1 = $document->getElementById("err1")->nodeValue;
    $texte_err2 = $document->getElementById("err2")->nodeValue;
    $texte_err3 = $document->getElementById("err3")->nodeValue;




?>
<section class="inscrip">
        <h2><?php echo $texte_inscription; ?></h2>
        <form id='inscription' action="" method="post">
            <div>
                <label for="mail">
                    <p class="pConnexion titreBtn"><?php  echo $texte_t_email; ?></p>
                </label>
                <input class="inputText" type="text" id="mail" name="mail" value="" placeholder='<?php  echo $texte_t_email_ph; ?>'>
            </div>
            <div>
                <label for="name">
                    <p class="pConnexion titreBtn"><?php  echo $texte_user; ?></p>
                </label>
                <input class="inputText" type="text" id="login" name="login" value="">
            </div>
            <div>
                <label for="mdp">
                    <p class="pConnexion titreBtn"><?php  echo $texte_pass; ?></p>
                </label>
                <input class="inputText" type="password" id="mdp" name="mdp" value="">
            </div>
            <div>
                <label for="mdpConfirm">
                    <p class="pConnexion titreBtn"><?php  echo $texte_confirmer; ?></p>
                </label>
                <input class="inputText" type="password" id="mdpConfirm" name="mdpConfirm" value="">
            </div>
            <div>
                <input class="btnConnexion btnLarge" type="button" id="envoyer" value="<?php  echo $texte_connexion; ?>">
            </div>
        </form>
        <p><?php  if(isset($_GET['update']) && $_GET['update']=="login"){
                    echo $text_err1;  
                }  
                else if (isset($_GET['update']) && $_GET['update']=="mail"){
                    echo $text_err2;  
                }else if (isset($_GET['update']) && $_GET['update']=="loginmail"){
                    echo $text_err3;  
                } ?></p>
    </section>
    <section class="connex">
        <div>
            <p><?php  echo $texte_deja_compte; ?></p>
            <div class="lienInscription">
                <a href="/art-public-mtl/api/compte/connexion" class="txtLien"><?php  echo $texte_se_connecter; ?><i class="material-icons">chevron_right</i></a>
            </div>
        </div>
    </section>
</main>

