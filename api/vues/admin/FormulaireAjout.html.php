
<?php

$info2= $data2;
$info3= $data3;
 
     
?>

            <form id='ajouterOeuvre' action="/art-public-mtl/api/admin/oeuvre/ajouterOeuvre/" method="post">	
                <h1>Formulaire d'ajout d'une oeuvre</h1>              
                <div>
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" value="" id="Titre">
                </div>                
                <div>
                    <label for="titre">NomCollection</label>
                    <input type="text" name="nomCollection" value="" id="NomCollection">
                </div>                
                <div>
                    <label for="titre">NomCollectionAng</label>
                    <input type="text" name="nomCollectionAng" value="" id="NomCollectionAng">
                </div>                
                <div>
                    <label for="titre">Technique</label>
                    <input type="text" name="technique" value="" id="Technique">
                </div>                
                <div>
                    <label for="titre">TechniqueAng</label>
                    <input type="text" name="techniqueAng" value="" id="TechniqueAng">
                </div>                
                <div>
                    <label for="titre">Dimensions</label>
                    <input type="text" name="dimensions" value="" id="Dimensions">
                </div>                
                <div>
                    <label for="titre">Arrondissement</label>
                    <input type="text"  name="arrondissement" value="" id="Arrondissement">
                </div>
                <div>
                    <label for="titre">Batiment</label>
                    <input type="text"  name="batiment" value="" id="Batiment">
                </div>
                <div>
                    <label for="titre">AdresseCivique</label>
                    <input type="text" name="adresseCivique" class="geocoding" value="" id="AdresseCivique">
                </div>
                <div>
                    <label for="titre">dateCreation</label>
                    <input type="text" name="dateCreation" value="" id="dateCreation" >
                </div>
                <div>
                    <label for="titre">Matériaux</label>
                    <input type="text" name="materiaux" value="" id="Matériaux" >
                </div>                                   
                <div>
                    <label for="titre">Catégorie</label>
                    <select name="categorie">
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
                    <label for="titre">Sous catégorie</label>
                    <select name="sousCategorie">
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
                
                <h1>ARTISTE</h1>
                <div>
                    <label for="titre">Nom</label>
                    <input type="text" name="nom" value="" id="nom" >
                </div>
                <div>
                    <label for="titre">Prénom</label>
                    <input type="text" name="prenom" value="" id="prenom" >
                </div>	
               
        



                 <h1>NOM COLLECTIF</h1>
                <div>
                    <label for="titre">Nom du collectif</label>
                    <input type="text" name="nomCollectif" value="" id="nom" >
                </div>
                <div>
                    <input type="submit" id="envoyer" value="Modifier">
                </div>		
            </form>
            
