<?php extract($mail); ?>
   

   <section class='mesInfos'>
    <div class="mesDonnes">
        <div class="infosPersos">
           <h4>INFOS PERSONNELLES</h4>
            <p>Nom d'utilisateur :
                <?php echo $_SESSION["username"]; ?>
            </p>
            <p>Mot de passe :
                <?php 
            $password = str_repeat("*", strlen($_SESSION["pw"])); 
            echo $password; 
            ?>
            </p>
            <a href="#" id='test'>Modifier mon mot de passe</a>
        </div>

        <form action="/art-public-mtl/api/compte/modifierPW" id="form" method="post">
            <div class='cacher teste'>
                <div>
                    <label for="">Mon mot de passe :</label>
                    <input type="password" value='<?php echo $_SESSION["pw"]; ?>' name='oldPW' id='oldPW'>
                </div>
                <div>
                    <label for="">Nouveau mot de passe :</label>
                    <input type="password" value='' name='newPW' id="newPW">   
                    <p id="msgErreurRegex"></p>
                </div>
                <div>
                    <label for="">Confirmer le nouveau mot de passe :</label>
                    <input type="password" value='' name='confirmNewPW' id='confirmNewPW'>
                    <p id="msgErreurConfirm"></p>
                </div>
                <div id=btns_form>
                    <input type="button" id="annuler" value="Annuler">
                    <input type="submit" id="modifier" value="Ajouter">
                </div>
            </div>
        </form>
    </div>
    <div class="mesDonnes">
      <div class="autresInfos">
          <h4>AUTRES INFOS</h4>
        <p>Adresse mail : <?php echo $courriel; ?></p>
      </div>
    </div>
</section>