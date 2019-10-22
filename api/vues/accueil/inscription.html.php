<h2>Inscription</h2><br>
<form id='inscription' action="/art-public-mtl/api/compte/inscriptionForm" method="post">
    <div>
        <label for="mail">
            <p class="pConnexion">Adresse mail</p>
        </label>
        <input class="inputText" type="email" id="mail" name="mail" value="" placeholder='Entrez votre adresse mail' required>
    </div>
    <div>
        <label for="name">
            <p class="pConnexion">Nom d'utilisateur</p>
        </label>
        <input class="inputText" type="text" id="login" name="login" value="">
    </div>
    <div>
        <label for="mdp">
            <p class="pConnexion">Mot de passe</p>
        </label>
        <input class="inputText" type="password" id="mdp" name="mdp" value="">
        <p id="msgErreurRegex"></p>
    </div>
    <div>
        <label for="mdpConfirm">
            <p class="pConnexion">Confirmez le mot de passe</p>
        </label>
        <input class="inputText" type="password" id="mdpConfirm" name="mdpConfirm" value="">
        <p id="msgErreurConfirm"></p>
    </div>
    <div>
        <input class="btnConnexion" type="submit" id="envoyer" value="Connexion">
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