
<?php

$info= $data;
//var_dump($info);

//var_dump($info);
  
                
?>  
            <aside id="menu_aside">
				<a id="menu_oeuvre" href="/art-public-mtl/api/admin/oeuvre"><img src="../../../../img/icons/imageBlanch.svg" alt="icon image"><p class="text_menu">Oeuvres</p></a>
				<a id="menu_artistes" href="/art-public-mtl/api/admin/artiste"><img src="../../../../img/icons/paletteBlanch.svg" alt="icon image"><p class="text_menu">Artistes</p></a>
				<a id="menu_utilisateurs" href="/art-public-mtl/api/admin/utilisateur"><img src="../../../../img/icons/personBlanch.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
			</aside>
            <div id="formAdmin">
                <span id="retour">
                    <a id="a_image" href="/art-public-mtl/api/admin/artiste"><img src="../../../../img/icons/retour_fleche.svg" alt=""></a>
                    <p>Retour</p>
                </span>
                <p id="text_form_admin">MODIFICATION DE L'OEUVRE</p>
                <form id='inputs_form' action="/art-public-mtl/api/admin/artiste/modification/" method="post">	
                              
                    <div>
                        <input type="hidden" name="id_artiste" value="<?php echo $info["id_artiste"]; ?>" readonly/>
                    </div> 
                      
                    <?php
                    if(isset($info["Nom"]) && $info["Nom"]!=""){

                
                    ?>   
                    
                    <div class="div_form">
                        <label for="titre">Nom de l'artiste</label>
                        <input class="box" type="text" name="nom" value="<?php echo $info["Nom"];  ?>" id="nom" >
                    </div>
                    <br>
                    <div class="div_form">
                        <label for="titre">Prénom de l'artiste</label>
                        <input class="box" type="text" name="prenom" value="<?php echo $info["Prenom"];  ?>" id="prenom" >
                    </div>	
            
                <?php

                
                }

                if(isset($info["NomCollectif"]) && $info["NomCollectif"]!="" ){
                ?>


                    <div class="div_form">
                        <label for="titre">Nom du collectif</label>
                        <input class="box" type="text" name="nomCollectif" value="<?php echo $info["NomCollectif"];  ?>" id="nomCollectif" >
                    </div>

            
           <?php
            }
       
      
          
          ?>
                    <div class="div_form">
                        <label for="titre">Description</label>
                        <input class="box" type="text" name="description" value="<?php echo $info["Description"];  ?>" id="description" >
                    </div>               
                    <div class="div_form">
                        <label for="titre">Site Web</label>
                        <input class="box" type="text" name="siteWeb" value="<?php echo $info["site_web"];  ?>" id="siteWeb">
                    </div> 
                    <div id=btns_form>
                        <input type="button" id="annuler" value="Annuler">
                        <input type="submit" id="envoyer" value="Modifier">  
                    </div>		 
                </form>  
            </div>        
            