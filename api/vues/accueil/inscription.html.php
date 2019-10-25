<section class="inscrip">
    <h2>Inscription</h2>
    <form id='inscription' action="" method="post">
        <div>
            <label for="mail">
                <p class="pConnexion titreBtn">Adresse mail</p>
            </label>
            <input class="inputText" type="text" id="mail" name="mail" value="" placeholder='Entrez votre adresse mail'>
        </div>
        <div>
            <label for="name">
                <p class="pConnexion titreBtn">Nom d'utilisateur</p>
            </label>
            <input class="inputText" type="text" id="login" name="login" value="">
        </div>
        <div>
            <label for="mdp">
                <p class="pConnexion titreBtn">Mot de passe</p>
            </label>
            <input class="inputText" type="password" id="mdp" name="mdp" value="">
        </div>
        <div>
            <label for="mdpConfirm">
                <p class="pConnexion titreBtn">Confirmez le mot de passe</p>
            </label>
            <input class="inputText" type="password" id="mdpConfirm" name="mdpConfirm" value="">
        </div>
        <div>
            <input class="btnConnexion btnLarge" type="button" id="envoyer" value="Connexion">
        </div>
    </form>
    <p><?php  if(isset($_GET['update']) && $_GET['update']=="login"){
                echo "Votre nom de compte est déjà utilisé.";  
              }  
              else if (isset($_GET['update']) && $_GET['update']=="mail"){
                echo "Votre adresse mail est déjà utilisée.";  
              }else if (isset($_GET['update']) && $_GET['update']=="loginmail"){
                echo "Votre adresse mail et votre nom d'utilisateur sont déjà utilisés.";  
              } ?></p>
</main>
</section>
<section class="connex">
    <p>Déja un compte ?</p>
    <div class="lienInscription">
        <a href="/art-public-mtl/api/compte/connexion" class="txtLien">Se connecter <i class="material-icons">chevron_right</i></a>
    </div>
</section>

