
<?php

$info2= $data2;
$info3= $data3;
$info4= $data4;

//var_dump($info);
  
                
?>  
            <aside id="menu_aside">
				<a id="menu_oeuvre" href="/art-public-mtl/api/admin/oeuvre"><img src="../../../img/icons/imageBlanch.svg" alt="icon image"><p class="text_menu">Oeuvres</p></a>
				<a id="menu_artistes" href="/art-public-mtl/api/admin/artiste"><img src="../../../img/icons/paletteBlanch.svg" alt="icon image"><p class="text_menu">Artistes</p></a>
				<a id="menu_utilisateurs" href=""><img src="../../../img/icons/personBlanch.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
			</aside>
            <div id="formAdmin">
                <span id="retour">
                    <a id="a_image" href="/art-public-mtl/api/admin/oeuvre"><img src="../../../img/icons/retour_fleche.svg" alt=""></a>
                    <p>Retour</p>
                </span>
                <p id="text_form_admin">AJOUT D'UNE OEUVRE</p>
                <form id='inputs_form' action="/art-public-mtl/api/admin/oeuvre/ajouterOeuvre" method="post">	
                    
                     <div>
                        <input type="hidden" name="ID" value="" readonly/>
                    </div>                
                    <div>
                        <input type="hidden" name="id_artiste" value="" readonly/>
                    </div> 
                    <div class="div_form">
                        <label for="titre">Titre</label>
                        <input class="box" type="text" name="titre" value="" id="Titre">
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
                        <label for="titre">Matériaux</label>
                        <input class="box" type="text" name="materiaux" value="" id="Matériaux" >
                    </div>               
                    <div class="div_form">
                        <label for="titre">Collection</label>
                        <input class="box" type="text" name="nomCollection" value="" id="NomCollection">
                    </div> 
                    <div class="div_form">
                        <label for="titre">NomCollectionAng</label>
                        <input class="box" type="text" name="nomCollectionAng" value="" id="NomCollectionAng">
                    </div>   
                    <div class="div_form">
                        <label for="titre">Technique</label>
                        <input class="box" type="text" name="technique" value="" id="Technique">
                    </div>
                    <div class="div_form">
                        <label for="titre">TechniqueAng</label>
                        <input class="box" type="text" name="techniqueAng" value="" id="TechniqueAng">
                    </div>       
                    <div class="div_form">
                        <label for="titre">Dimensions</label>
                        <input class="box" type="text" name="dimensions" value="" id="Dimensions">
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
                        <input class="box" type="text"  name="batiment" value="" id="Batiment">
                    </div> 
                    <div class="div_form">
                        <label for="titre">AdresseCivique</label>
                        <input class="box" type="text" name="adresseCivique" value="" id="AdresseCivique">
                    </div> 
                    <div class="div_form">
                        <label for="titre">dateCreation</label>
                        <input class="box" type="text" name="dateCreation" value="" id="dateCreation" >
                    </div>                                  
                     
                      
                    
                    <div class="div_form">
                        <label for="titre">Nom artiste</label>
                        <input class="box" type="text" name="nom" value="" id="nom" >
                    </div>
                    <div class="div_form">
                        <label for="titre">Prénom artiste</label>
                        <input class="box" type="text" name="prenom" value="" id="prenom" >
                    </div>

          

                    <div class="div_form">
                        <label for="titre">Nom du collectif</label>
                        <input class="box" type="text" name="nomCollectif" value="" id="nom" >
                    </div>
                    <div id=btns_form>
                        <input type="button" id="annuler" value="Annuler">
                        <input type="submit" id="envoyer" value="Ajouter">                        
                    </div>			 
            </form>
            
               
            </div>        
            