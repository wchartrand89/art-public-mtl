<?php 
// var_dump ($aData);
?>

<section>
    <h1><?php echo $Prenom ." ". $Nom?></h1>
    <p class="description"><?php echo $Description?></p>
</section>

<section class="sesOeuvres">
    <div class="slider">
        <div class="slide art fade">
            <a href="">
                <div class="img"></div>
            </a>
            <section class="infos">
                <h3 class="titreDetail">Nom de l'oeuvre</h3>
                <div class="txtLien">
                    <p>Plus de détails</p>
                    <a class="fleches">&#10095;</a>
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
        </div>

        <!-- Next and previous : fleches-->
        <a class="fleches prev">&#10094;</a>
        <a class="fleches next">&#10095;</a>
    </div>
    <br>

    <!-- Cercles -->
    <!-- <div class="points">
        <span class="point" data-slide="1"></span>
        <span class="point" data-slide="2"></span>
        <span class="point" data-slide="3"></span>
    </div> -->
</section>
			
