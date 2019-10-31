

	<?php
//	var_dump($aData);
//	die;
	?>




		 
		 	<aside id="menu_aside">
				<a id="menu_oeuvre" href="/art-public-mtl/api/admin/oeuvre"><img src="../../img/icons/imageBlanch.svg" alt="icon image"><p id="menuOeuvres" class="text_menu">Oeuvres</p></a>
				<a id="menu_artistes" href="/art-public-mtl/api/admin/artiste"><img src="../../img/icons/paletteBlanch.svg" alt="icon image"><p class="text_menu">Artistes</p></a>
				<a id="menu_utilisateurs" href="/art-public-mtl/api/admin/utilisateur"><img src="../../img/icons/personBlanch.svg" alt="icon image"><p class="text_menu">Utilisateurs</p></a>
				<a id="menu_contact" href="/art-public-mtl/api/admin/contact"><img src="../../img/icons/comment.png" alt="icon image"><p class="text_menu">Commentaires</p></a>
			</aside>
			<section class="contenu_listeOeuvres">
				<section class="recherche">
					<form action="">
						<div class=bar_image>
							<input id="bar_recherche" type="text" name="recherche" placeholder="Rechercher un titre">
							<!-- <img id="img_recherche" src="../../img/icons/search_40px.svg" alt="search"> -->
							<img id="img_recherche" src="../../img/icons/search_40px_1.png" alt="search">
						</div>	
                       <p><?php if(isset($_GET['update']) && $_GET['update']=="error") echo "Une erreur est survenue, veuillez vérifiez vos champs."; ?></p>					
                        <a href="/art-public-mtl/api/admin/oeuvre/ajout" id="btn_submit" alt="ajout"><img src="../../img/icons/plus.png" alt=""><p>Ajouter une oeuvre</p></a>
                        
						
						
					</form>
					
				</section>
				<section class="nomsChamps">
					<P>TITRE</P>
					<P>ARTISTE</P>
					<P>ARRONDISSEMENT</P>
					<p></p>
				</section>
				<section id="liste_oeuvres" class="oeuvres flex flex-col">
					<?php
					$compt=0;
					foreach ($aData as $cle => $oeuvre) {
						extract($oeuvre);  
						++$compt;
											
					?>

						<div class="info_oeuvre">
							<p class="valeur_info_oeuvre filtrer"><?php echo $Titre ?></p>
							<p class="valeur_info_oeuvre"><?php foreach($Artistes as $value=> $test){
                    if($test["Nom"]!=""){
                            echo $test["Nom"];
                            echo " ";
                            echo $test["Prenom"];
                    }
                        
                    if($test["NomCollectif"]!=""){
                        echo $test["NomCollectif"];
                    }
                            
                        
                       
                    } ?></p>
							<p class="valeur_info_oeuvre"><?php echo $Arrondissement ?></p>
							<span class="valeur_info_oeuvre liensIcones">
								<a href="/art-public-mtl/api/admin/oeuvre/<?php echo $id_oeuvre ?>/modifier"><img id='crayon' src="../../img/icons/crayon.svg" alt="Modifier"></a>
								<a data-href="/art-public-mtl/api/admin/oeuvre/<?php echo $id_oeuvre ?>/supprimer" class="modalPopup" onclick="handle(this);"><img id='poubelle' src="../../img/icons/poubelle.svg" alt="Supprimer"></a>
							</span>

						</div>
						
						<?php
					}
					?>	
						
				</section>
					
			</section>
                       
 <!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="confirm-buttons">
    <p>Etes-vous sur de vouloir supprimer cet oeuvre ?</p>
        <a href="" id="linkSupprimer" class="confirm-ok">Supprimer</a>
        <a class="close confirm-ok">Annuler</a>
    </div>
  </div>

</div>
                        

							
