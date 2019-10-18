<section>
   <h2>SÉCURITÉ</h2>
    <div>
        <p>Nom d'utilisateur : <?php echo $_SESSION["username"]; ?> </p>
        <p>Mot de passe : <?php 
            $password = str_repeat("*", strlen($_SESSION["pw"])); 
            echo $password; 
            ?> 
        </p>
        <a href="#" id='test'>Modifier mon mot de passe</a>
    </div>
    
    <form action="/art-public-mtl/api/compte/modifierPW">
        <div class='cacher'>
           <div>
               <label for="">Mon mot de passe :</label>
               <input type="password" value='<?php echo $password; ?>' name='oldPW'>
           </div>
            <div>
               <label for="">Nouveau mot de passe :</label>
               <input type="password" value='' name='newPW'>
           </div>
            <div>
               <label for="">Confirmer le nouveau mot de passe :</label>
               <input type="password" value='' name='confirmNewPW'>
           </div>
            <div id=btns_form>
                <input type="button" id="annuler" value="Annuler">
                <input type="submit" id="modifier" value="Ajouter">                        
            </div>	
        </div> 
    </form>
    
    <div>
      <p>Adresse mail : loremIpsum@gmail.com </p>  
    </div>
</section>



