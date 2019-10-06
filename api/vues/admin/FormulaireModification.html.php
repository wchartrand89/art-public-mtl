
<?php

$info= array_map('utf8_encode', $data);
$info2= $data2;
$info3= $data3;
  
                
?>
            <form id='modification' action="/art-public-mtl/api/admin/oeuvre/modification/" method="post">	
                <h1>INFO DE L'OEUVRE</h1>
                <div>
                    <input type="hidden" name="ID" value="<?php echo $info["id_oeuvre"]; ?>" readonly/>
                </div>                
                <div>
                    <input type="hidden" name="id_artiste" value="<?php echo $info["id_artiste"]; ?>" readonly/>
                </div>
                <div>
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" value="<?php echo $info["titre"];  ?>" id="Titre">
                </div>                
                <div>
                    <label for="titre">NomCollection</label>
                    <input type="text" name="nomCollection" value="<?php echo $info["nomCollection"];  ?>" id="NomCollection">
                </div>                
                <div>
                    <label for="titre">NomCollectionAng</label>
                    <input type="text" name="nomCollectionAng" value="<?php echo $info["nomCollectionAng"];  ?>" id="NomCollectionAng">
                </div>                
                <div>
                    <label for="titre">Technique</label>
                    <input type="text" name="technique" value="<?php echo $info["technique"];  ?>" id="Technique">
                </div>                
                <div>
                    <label for="titre">TechniqueAng</label>
                    <input type="text" name="techniqueAng" value="<?php echo $info["techniqueAng"];  ?>" id="TechniqueAng">
                </div>                
                <div>
                    <label for="titre">Dimensions</label>
                    <input type="text" name="dimensions" value="<?php echo $info["dimensions"];  ?>" id="Dimensions">
                </div>                
                <div>
                    <label for="titre">Arrondissement</label>
                    <input type="text"  name="arrondissement" value="<?php echo $info["arrondissement"];  ?>" id="Arrondissement">
                </div>
                <div>
                    <label for="titre">Batiment</label>
                    <input type="text"  name="batiment" value="<?php echo $info["batiment"];  ?>" id="Batiment">
                </div>
                <div>
                    <label for="titre">AdresseCivique</label>
                    <input type="text" name="adresseCivique" value="<?php echo $info["adresseCivique"];  ?>" id="AdresseCivique">
                </div>
                <div>
                    <label for="titre">CoordonneeLatitude</label>
                    <input type="text" name="coordonneeLatitude" value="<?php echo $info["coordonneeLatitude"];  ?>" id="CoordonneeLatitude">
                </div>
                <div>
                    <label for="titre">CoordonneeLongitude</label>
                    <input type="text" name="coordonneeLongitude" value="<?php echo $info["coordonneeLongitude"];  ?>" id="CoordonneeLongitude">
                </div>
                <div>
                    <label for="titre">dateCreation</label>
                    <input type="text" name="dateCreation" value="<?php echo $info["dateCreation"];  ?>" id="dateCreation" >
                </div>
                <div>
                    <label for="titre">Matériaux</label>
                    <input type="text" name="materiaux" value="<?php echo $info["materiaux"];  ?>" id="Matériaux" >
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
                <?php
                if(isset($info["nom"]) && $info["nom"]!=""){

               
                ?>   
                <h1>ARTISTE</h1>
                <div>
                    <label for="titre">Nom</label>
                    <input type="text" name="nom" value="<?php echo $info["nom"];  ?>" id="nom" >
                </div>
                <div>
                    <label for="titre">Prénom</label>
                    <input type="text" name="prenom" value="<?php echo $info["prenom"];  ?>" id="prenom" >
                </div>
                <div>
                    <input type="submit" id="envoyer" value="Modifier">
                </div>		
            </form>
        
            <?php

            
            }

            if(isset($info["nomCollectif"]) && $info["nomCollectif"]!="" ){
            ?>


                 <h1>NOM COLLECTIF</h1>
                <div>
                    <label for="titre">Nom du collectif</label>
                    <input type="text" name="nomCollectif" value="<?php echo $info["nomCollectif"];  ?>" id="nom" >
                </div>
                <div>
                    <input type="submit" id="envoyer" value="Modifier">
                </div>		
            </form>
            
           <?php
            }
       
      
          
          ?>
               