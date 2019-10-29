    <?php
        $document = cookie();
        $text_retour = $document->getElementById("retour")->nodeValue;
        $text_plus_info = $document->getElementById("plus_info")->nodeValue;
        $text_partager = $document->getElementById("partager")->nodeValue;
        $text_siteweb = $document->getElementById("siteweb")->nodeValue;
    ?>
<section class="retour txtLien">
    
        <a href="/art-public-mtl/api/artiste" class="flecheLien">&#10094;</a>
        <a href="javascript:history.back()"><?php echo $text_retour; ?></a>
   
</section>
<section class="titre">
    <h1><?php echo $Prenom ." ". $Nom?></h1>
    <p class="description"><?php echo $Description?></p>
</section>
<section class="sesOeuvres">
    <div class="slider">
        
<?php
//var_dump($aData['oeuvres']);	
foreach ($aData['oeuvres'] as $cle => $oeuvre) {
	extract($oeuvre);
?>
<div class="slide slideA art fade">
<?php
    echo "<a href='/art-public-mtl/api/oeuvre/".$id_oeuvre."'>";
?>
    <div class="img" data-img="<?php if(isset($NoImage) && !empty($NoImage)){ echo $NoImage;}else{ echo "default";}?>"></div>
</a>
<section class="infos">
                <p class="titreDetail artiste"><?php echo $Titre; ?></p>
                <p class="description"><?php echo $Description; ?></p>
                <div class="txtLien">
                    <a href="/art-public-mtl/api/oeuvre/<?php echo $id_oeuvre; ?>"><?php echo $text_plus_info; ?></a>
                    <a href="/art-public-mtl/api/oeuvre<?php echo $id_oeuvre; ?>"class="flecheLien">&#10095;</a>
                </div>
            </section>
        </div><?php
}
//Ne mettre les fleches que si il y a plus d'une oeuvre
if(count($aData["oeuvres"])>1){
?>
<!-- Next and previous : fleches-->
<a class="fleches flechesA prev">&#10094;</a>
        <a class="fleches flechesA next">&#10095;</a>
        <?php
}
?>

       
    </div>
</section>
<!-- 
<section class="sesOeuvres" id="prochainSprint">
    <div class="slider">
        <div class="slide art fade">
            <a href="">
                <div class="img"></div>
            </a>
            <section class="infos">
                <p class="titreDetail artiste">Nom de l'oeuvre</p>
                <p class="description">Description de L'oeuvre, cette oeuvre est une sculpture réalisée en 1983.</p>
                <div class="txtLien">
                    <a href="/art-public-mtl/api/oeuvre">Plus de détails</a>
                    <a href="/art-public-mtl/api/oeuvre"class="flecheLien">&#10095;</a>
                </div>
            </section>

        </div>
        <div class="slide art fade">
            <a href="">
                <div class="img"></div>
            </a>
            <div class="titreDetail">Nom de l'oeuvre</div>
        </div>
        <div class="slide fade">
            <a href="">
                <div class="img"></div>
            </a>
            <div class="titreDetail">Nom de l'oeuvre</div>
        </div> -->

        <!-- Next and previous : fleches-->
        <!-- <a class="fleches prev">&#10094;</a>
        <a class="fleches next">&#10095;</a>
    </div>
    </section> -->
			
    <section class="liensExt" id="prochainSprint">
        <div class="reseaux btn">
            <a class="btn" href=""><?php echo $text_partager; ?></a>
            <a class="hidden" href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg></a>
			<a class="hidden" href="https://twitter.com/ArtPMTL"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg></a>
			<a class="hidden" href="https://www.facebook.com/artpublicmtl?ref=hl"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg></a>
        </div>
        
        
        <a class= "btn" href=""><?php echo $text_siteweb; ?></a>
    </section>
    


