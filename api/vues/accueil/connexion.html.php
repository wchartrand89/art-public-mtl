<section class="connexion">
    <h2>Se connecter</h2>
    <form id='connection' action="/art-public-mtl/api/compte/connexion" method="post">
        <div>
            <label for="name">
                <p class="pConnexion titreBtn">Nom d'utilisateur</p>
            </label>
            <input class="inputText" type="text" id="name" name="login">
        </div>
        <div>
            <label for="mdp">
                <p class="pConnexion titreBtn">Mot de passe</p>
            </label>
            <input class="inputText" type="password" id="mdp" name="mdp">
        </div>
        <div>
            <input class="btnConnexion btnLarge" type="submit" id="envoyer" value="Connexion">
        </div>
    </form>
</section>

<section class="inscription">
        <p>Pas encore de compte ?</p>
        <div class="lienInscription">
            <a href="/art-public-mtl/api/compte/inscription" class="txtLien">S'inscrire <i class="material-icons">
chevron_right
</i></a>
            <!-- <a href="/art-public-mtl/api/compte/inscription" class="txtLien"> ></a> -->
        </div>
        
    </section>
</main>