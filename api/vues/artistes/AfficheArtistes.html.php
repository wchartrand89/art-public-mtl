<script type="text/javascript">
	let artistes = <?php echo json_encode($aData); ?>;
</script>
<aside class="choix">
	<p class="lettre">Y</p>
	<p class="lettre">Z</p>
	<div class="lettreChoisie">
		<a class="fleches next" href="#B">
			<i class="material-icons">keyboard_arrow_up</i>
		</a>
		<p class="lettre focus">A</p>
		<a class="fleches prev" href="#Z">
			<i class="material-icons">keyboard_arrow_down</i>
		</a>
	</div>
	<p class="lettre">B</p>
	<p class="lettre">C</p>
</aside>	
<section class="liste">
<?php

/*Tableau pour création des ancres dans les sections des lettres*/ 
$listeLettres = array(0=>array("lettre"=>"A","ok"=>false),
1=>Array("lettre"=>"B","ok"=>false),
2=>Array("lettre"=>"C","ok"=>false),
3=>Array("lettre"=>"D","ok"=>false),
4=>Array("lettre"=>"E","ok"=>false),
5=>Array("lettre"=>"F","ok"=>false),
6=>Array("lettre"=>"G","ok"=>false),
7=>Array("lettre"=>"H","ok"=>false),
8=>Array("lettre"=>"I","ok"=>false),
9=>Array("lettre"=>"J","ok"=>false),
10=>Array("lettre"=>"K","ok"=>false),
11=>Array("lettre"=>"L","ok"=>false),
12=>Array("lettre"=>"M","ok"=>false),
13=>Array("lettre"=>"N","ok"=>false),
14=>Array("lettre"=>"O","ok"=>false),
15=>Array("lettre"=>"P","ok"=>false),
16=>Array("lettre"=>"Q","ok"=>false),
17=>Array("lettre"=>"R","ok"=>false),
18=>Array("lettre"=>"S","ok"=>false),
19=>Array("lettre"=>"T","ok"=>false),
20=>Array("lettre"=>"U","ok"=>false),
21=>Array("lettre"=>"V","ok"=>false),
22=>Array("lettre"=>"W","ok"=>false),
23=>Array("lettre"=>"X","ok"=>false),
24=>Array("lettre"=>"Y","ok"=>false),
25=>Array("lettre"=>"Z","ok"=>false),);
?>
<?php

// VERSION OK SI ARTISTES pas bien classés (nom collectif/nom )
// foreach ($aData as $cle => $artiste) {
// 	extract($artiste);
// 	//var_dump($artiste);
// 	//$lettre1 = strpos($Nom, "A");
// 	//$lettre1Collectif = strpos($NomCollectif, "A");
// 		if(isset($Nom) && $Nom!=""){
// 			$aNoms[]= $artiste;

// 		//echo '<a class="lienArtiste" href="artiste/'.$id_artiste.'">'.$Nom .", ". $Prenom.'</a>';
// 	}
// 	else
// 	{
// 		$aNoms[]= $artiste;
// 		//echo '<a class="lienArtiste" href="">'.$NomCollectif.'</a>' ;
// 	}	
	
// }

$Noms=[];
$i=0;
/*Création d'un tableau contenant les noms et id des artistes à partir de $aData (pour classement alphabetique noms et noms collectifs confondus)*/
foreach ($aData as $cle => $artiste) {
	
		if(isset($artiste["Nom"]) && $artiste["Nom"]!=""){
			$Noms[$i]["nom"]=$artiste["Nom"]." ".$artiste["Prenom"];
			$Noms[$i]["id"]=$artiste["id_artiste"];
	}
	else
	{
		$Noms[$i]["nom"]= $artiste["NomCollectif"];
		$Noms[$i]["id"]=$artiste["id_artiste"];
	}	
	$i++;
}
/*Classement du tableau*/ 
sort($Noms);
$test=[];
/* Création des div avec les id pour lien vers ancres*/
foreach ($Noms as $cle => $artiste) {
	extract($artiste);
	$i=0;
	foreach($listeLettres as $cle => $lettre){
		if(!isset($test[$i])){
			$test[$i]=false;
		}
		if ($nom[0] == $lettre["lettre"] && $lettre["ok"] == false && $test[$i] !== true){
			echo '<div id="'.$lettre["lettre"].'"></div>';
			$test[$i]=true;
		}
		$i++;

	}
	/*Affichage des noms des artistes en lien vers leur page personnelle */
	if(isset($nom) && $nom!=""){
	echo '<a class="lienArtiste'.$nom[0].'" href="artiste/'.$id.'">'.$nom .'</a>';
	}else{
		echo '<a class="lienArtiste" href="artiste/'.$id.'">'.$nom.'</a>' ;
	}	
}

?>
</section>