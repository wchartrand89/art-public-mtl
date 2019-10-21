<h2>Connexion</h2><br>
<form id='connection' action="/art-public-mtl/api/compte/connexion" method="post">
    <div>
        <label for="name">
            <p class="pConnexion">Nom d'utilisateur</p>
        </label>
        <input class="inputText" type="text" id="name" name="login">
    </div>
    <div>
        <label for="mdp">
            <p class="pConnexion">Mot de passe</p>
        </label>
        <input class="inputText" type="password" id="mdp" name="mdp">
    </div>
    <a href="/art-public-mtl/api/compte/inscription">Cliquez ici pour vous inscrire</a>
    <div>
        <input class="btnConnexion" type="submit" id="envoyer" value="Connexion">
    </div>
</form>
</main>