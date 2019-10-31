	<?php error_reporting(E_ALL ^ E_WARNING);  ?>
<?php extract($mail); ?>
   <section class='mesInfos'>
    <div class="mesDonnes">
        <div class="infosPersos">
          <p><?php 
              if(isset($_GET['update']) && $_GET['update']=="error"){
                echo "Une erreur est survenue, veuillez vérifiez vos champs.";  
              }  
              else if (isset($_GET['update']) && $_GET['update']=="ok"){
                echo "Votre mot de passe a été modifié.";  
              } ?></p>
           <h4>INFOS PERSONNELLES</h4>
            <p>Nom d'utilisateur :
                <?php echo $_SESSION["username"]; ?>
            </p>
            <p>Mot de passe :
                <?php 
            echo '*********'; 
            ?>
            </p>
            <a href="#" id='test'>Modifier mon mot de passe</a>
        </div>

        <form action="/art-public-mtl/api/compte/modifierPW" id="form" method="post">
            <div class='cacher teste'>
                <div>
                    <input type="hidden" value='<?php echo $password; ?>' name='oldPW' id='oldPW'>
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
                    <input type="submit" id="modifier" value="Modifier">
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
            <form id='deconnexion' action="/art-public-mtl/api/compte/deconnexion" method="post">	
                <div>
                    <input type="submit" id="envoyer" value="Déconnexion">
                </div>		
            </form>

</section>