<?php


$test=modifierOeuvre($_POST);

if($test==1){
    echo "Votre oeuvre a bien été modifié.";
    echo "<a href='/art-public-mtl/api/admin/menu'>Retournez a l'accueil</a>";
}else{
    echo "Vous ne pouvez pas modifier l'oeuvre.";
}


function modifierOeuvre($array){
    
             $dsn = 'mysql:host=localhost;dbname=artpublicmontreal';
         $connexion = new PDO($dsn, "root","");
    

    
    $ID=htmlspecialchars($array["ID"]);
    $Titre=htmlspecialchars($array["Titre"]);
    $NomCollection=htmlspecialchars($array["NomCollection"]);
    $NomCollectionAng=htmlspecialchars($array["NomCollectionAng"]);
    $Technique=htmlspecialchars($array["Technique"]);
    $TechniqueAng=htmlspecialchars($array["TechniqueAng"]);
    $Dimensions=htmlspecialchars($array["Dimensions"]);
    $Arrondissement=htmlspecialchars($array["Arrondissement"]);
    $Batiment=htmlspecialchars($array["Batiment"]);
    $AdresseCivique=htmlspecialchars($array["AdresseCivique"]);
    $CoordonneeLatitude=htmlspecialchars($array["CoordonneeLatitude"]);
    $CoordonneeLongitude=htmlspecialchars($array["CoordonneeLongitude"]);
    $dateCreation=htmlspecialchars($array["dateCreation"]);
    
    $request="UPDATE oeuvre
SET Titre = '$Titre', NomCollection ='$NomCollection', NomCollectionAng='$NomCollectionAng',Technique='$Technique', TechniqueAng='$TechniqueAng', Dimensions='$Dimensions', Arrondissement='$Arrondissement', Batiment='$Batiment', AdresseCivique='$AdresseCivique', CoordonneeLatitude='$CoordonneeLatitude', CoordonneeLongitude='$CoordonneeLongitude', dateCreation= '$dateCreation'
WHERE id_oeuvre='$ID';";
    
    $result = $connexion->exec($request);
    
    if ($result !== FALSE) 
    {
        return true;              
    } 
    else 
    {
        return "wrong code";
    }


}

?>