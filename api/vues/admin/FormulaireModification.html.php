
<?php

$info= $data;
$info2= $data2;
$info3= $data3;
$info4= $data4;
                
?>  
            <aside id="menu_aside">
				<a id="menu_oeuvre" href="/art-public-mtl/api/admin/oeuvre"><img src="../../../../img/icons/imageBlanch.svg" alt="icon image"><p class="text_menu">Oeuvres</p></a>
				<a id="menu_artistes" href="/art-public-mtl/api/admin/artiste"><img src="../../../../img/icons/paletteBlanch.svg" alt="icon image"><p class="text_menu">Artistes</p></a>
				<a id="menu_utilisateurs" href="/art-public-mtl/api/admin/utilisateur"><img src="../../../../img/icons/personBlanch.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
                <a id="menu_contact" href="/art-public-mtl/api/admin/contact"><img src="../../../../img/icons/comment.png" alt="icon image"><p class="text_menu">Commentaires</p></a>
                
			</aside>
            <div id="formAdmin">
                <span id="retour">
                    <a id="a_image" href="javascript:history.back()"><img src="../../../../img/icons/retour_fleche.svg" alt=""><p>Retour</p></a>                   
                </span>
                <p id="text_form_admin">MODIFICATION DE L'OEUVRE</p>
                <form id='inputs_form' action="/art-public-mtl/api/admin/oeuvre/modification/" method="post">	
                    
                     <div>
                        <input type="hidden" name="ID" value="<?php echo $info["id_oeuvre"]; ?>" readonly/>
                    </div>                
                    <div>
                        <input type="hidden" name="id_artiste" value="<?php echo $info["id_artiste"]; ?>" readonly/>
                    </div> 
                    <div class="div_form">
                        <label for="titre">Titre</label>
                        <input class="box" type="text" name="titre" value="<?php echo $info["titre"];  ?>" id="Titre">
                    </div>
                    <div class="div_form">
                        <label for="titre">Catégorie</label>
                        <select class="box" name="categorie">
                        <?php                     
                            
                            foreach($info2 as $key=>$value){
                                $value=array_map('utf8_encode', $value);
                                foreach($value as $val){
                                    if($val==$info["categorie"]){
                                        echo "<option value='$val' selected>$val</option>";
                                    }else{
                                        echo "<option value='$val'>$val</option>";
                                    }
                                    
                                }
                            
                            }
                            
                            ?>
                
                        </select>
                    </div>
                    <div class="div_form">
                        <label for="titre">Sous catégorie</label>
                        <select class="box" name="sousCategorie">
                         <?php 
                            foreach($info3 as $key=>$value){
                                $value=array_map('utf8_encode', $value);
                                foreach($value as $val){
                                    if($val==$info["sous_categorie"]){
                                        echo "<option value='$val' selected>$val</option>";
                                    }else{
                                        echo "<option value='$val'>$val</option>";
                                    }
                                }
                            
                            }
                            
                            ?>
                
                        </select>
                    </div> 
                    <div class="div_form">
                       <a titre = "Pour modifier des matériaux, utilisez la syntaxe suivante : Matériau1, Matériau2">
                        <label for="titre" id="mat">Matériaux</label>
                        </a>
                        <input class="box" type="text" name="materiaux" value="<?php echo $info["materiaux"];  ?>" id="Matériaux" >
                    </div>               
                    <div class="div_form">
                        <label for="titre">Collection</label>
                        <input class="box" type="text" name="nomCollection" value="<?php echo $info["nomCollection"];  ?>" id="NomCollection">
                    </div> 
                    <div class="div_form">
                        <label for="titre">Collection (ENG)</label>
                        <input class="box" type="text" name="nomCollectionAng" value="<?php echo $info["nomCollectionAng"];  ?>" id="NomCollectionAng">
                    </div>   
                    <div class="div_form">
                        <label for="titre">Technique</label>
                        <input class="box" type="text" name="technique" value="<?php echo $info["technique"];  ?>" id="Technique">
                    </div>
                    <div class="div_form">
                        <label for="titre">Technique (ENG)</label>
                        <input class="box" type="text" name="techniqueAng" value="<?php echo $info["techniqueAng"];  ?>" id="TechniqueAng">
                    </div>       
                    <div class="div_form">
                        <label for="titre">Dimensions</label>
                        <input class="box" type="text" name="dimensions" value="<?php echo $info["dimensions"];  ?>" id="Dimensions">
                    </div>
                    <div class="div_form">
                        <label for="titre">Arrondissement</label>
                        <select class="box" name="arrondissement">
                         <?php 
                            foreach($info4 as $key=>$value){
                                $value=array_map('utf8_encode', $value);
                                foreach($value as $val){
                                    if($val==$info["arrondissement"]){
                                        echo "<option value='$val' selected>$val</option>";
                                    }else{
                                        echo "<option value='$val'>$val</option>";
                                    }
                                }
                            
                            }
                            
                            ?>
                
                        </select>
                    </div> 
                    <div class="div_form">
                        <label for="titre">Batiment</label>
                        <input class="box" type="text"  name="batiment" value="<?php echo $info["batiment"];  ?>" id="Batiment">
                    </div> 
                    <div class="div_form">
                        <label for="titre">Adresse de l'oeuvre</label>
                        <input class="box" type="text" name="adresseCivique" value="<?php echo $info["adresseCivique"];  ?>" id="AdresseCivique">
                    </div> 
                    <div class="div_form">
                        <label for="titre">Date de création</label>
                        <input class="box" type="text" name="dateCreation" value="<?php echo $info["dateCreation"];  ?>" id="dateCreation" >
                    </div>                                  
                     
                      
                    <?php
                    if(isset($info["nom"]) && $info["nom"]!=""){

                
                    ?>   
                    
                    <div class="div_form">
                        <label for="titre">Nom de l'artiste</label>
                        <input class="box" type="text" name="nom" value="<?php echo $info["nom"];  ?>" id="nom" >
                    </div>
                    <div class="div_form">
                        <label for="titre">Prénom de l'artiste</label>
                        <input class="box" type="text" name="prenom" value="<?php echo $info["prenom"];  ?>" id="prenom" >
                    </div>

            
                <?php

                
                }

                if(isset($info["nomCollectif"]) && $info["nomCollectif"]!="" ){
                ?>



                    <div class="div_form">
                        <label for="titre">Nom du collectif</label>
                        <input class="box" type="text" name="nomCollectif" value="<?php echo $info["nomCollectif"];  ?>" id="nom" >
                    </div>

            
           <?php
            }
       
      
          
          ?>
                    <div id=btns_form>
                        <a href="/art-public-mtl/api/admin/oeuvre">Annuler</a>
                        <input type="submit" id="envoyer" value="Modifier">  
                    </div>		 
            </form> 
            </div>        
            