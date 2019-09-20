
<?php


$info=$_SESSION['res'];
 

        
  
      
               
                
?>
            <form id='modification' action="/art-public-mtl/api/admin/oeuvre/modification/" method="post">	
                <div>
                    <label for="name">ID</label>
                    <input type="text" name="ID" value="<?php echo $info["id_oeuvre"]; ?>" readonly/>
                </div>
                <div>
                    <label for="titre">Titre</label>
                    <input type="text" name="Titre" value="<?php echo $info["Titre"];  ?>" id="Titre">
                </div>                
                <div>
                    <label for="titre">NomCollection</label>
                    <input type="text" name="NomCollection" value="<?php echo $info["NomCollection"];  ?>" id="NomCollection">
                </div>                
                <div>
                    <label for="titre">NomCollectionAng</label>
                    <input type="text" name="NomCollectionAng" value="<?php echo $info["NomCollectionAng"];  ?>" id="NomCollectionAng">
                </div>                
                <div>
                    <label for="titre">Technique</label>
                    <input type="text" name="Technique" value="<?php echo $info["Technique"];  ?>" id="Technique">
                </div>                
                <div>
                    <label for="titre">TechniqueAng</label>
                    <input type="text" name="TechniqueAng" value="<?php echo $info["TechniqueAng"];  ?>" id="TechniqueAng">
                </div>                
                <div>
                    <label for="titre">Dimensions</label>
                    <input type="text" name="Dimensions" value="<?php echo $info["Dimensions"];  ?>" id="Dimensions" readonly>
                </div>                
                <div>
                    <label for="titre">Arrondissement</label>
                    <input type="text"  name="Arrondissement" value="<?php echo $info["Arrondissement"];  ?>" id="Arrondissement">
                </div>
                <div>
                    <label for="titre">Batiment</label>
                    <input type="text"  name="Batiment" value="<?php echo $info["Batiment"];  ?>" id="Batiment">
                </div>
                <div>
                    <label for="titre">AdresseCivique</label>
                    <input type="text" name="AdresseCivique" value="<?php echo $info["AdresseCivique"];  ?>" id="AdresseCivique">
                </div>
                <div>
                    <label for="titre">CoordonneeLatitude</label>
                    <input type="text" name="CoordonneeLatitude" value="<?php echo $info["CoordonneeLatitude"];  ?>" id="CoordonneeLatitude">
                </div>
                <div>
                    <label for="titre">CoordonneeLongitude</label>
                    <input type="text" name="CoordonneeLongitude" value="<?php echo $info["CoordonneeLongitude"];  ?>" id="CoordonneeLongitude">
                </div>
                <div>
                    <label for="titre">dateCreation</label>
                    <input type="text" name="dateCreation" value="<?php echo $info["dateCreation"];  ?>" id="dateCreation">
                </div>
                <div>
                    <input type="submit" id="envoyer" value="Modifier">
                </div>		
            </form>
        
<?php

           
   
               
?>