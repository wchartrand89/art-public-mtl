<?php

    $document = cookie();

    //Créer des variables pour chaque élément de texte à utiliser dans la page
    $texte_connexion = $document->getElementById("connexion")->nodeValue; 
    $texte_user = $document->getElementById("user")->nodeValue; 
    $texte_pass = $document->getElementById("pass")->nodeValue; 
?>

<h2><?php echo $texte_connexion ?></h2><br>
            <form id='connection' action="/art-public-mtl/api/compte/connexion" method="post">	
                <div>
                    <label for="name"><p class="pConnexion"><?php echo $texte_user ?></p></label>
                    <input class = "inputText" type="text" id="name" name="login">
                </div><br><br>
                <div>
                    <label for="mdp"><p class="pConnexion"><?php echo $texte_pass ?></p></label>
                    <input class = "inputText" type="password" id="mdp" name="mdp">
                </div><br><br>
                <div>
                    <input class = "btnConnexion" type="submit" id="envoyer" value="Connexion">
                </div>		
            </form>
</main>
