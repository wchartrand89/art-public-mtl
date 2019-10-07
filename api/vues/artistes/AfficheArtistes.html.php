<script type="text/javascript">
	let artistes = <?php echo json_encode($aData); ?>;
</script>
<aside class="choix" id="prochainSprint">
	<p class="lettre">Y</p>
	<p class="lettre">Z</p>
	<div class="lettreChoisie">
		<a class="fleches prev">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12 8l-6 6 1.41 1.41L12 10.83l4.59 4.58L18 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
			</a>
		<p class="lettre focus">A</p>
		<a class="fleches next">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/><path d="M0 0h24v24H0z" fill="none"/></svg></a>
	</div>
	
	<p class="lettre">B</p>
	<p class="lettre">C</p>
	<!-- <p class=" hidden lettre">F</p> -->
</aside>	
<section class="liste">
<?php

$listeLettres = array(
	0=>array(
	"lettre"=>"A",
	 "ok"=>false),
	1=>Array(
	"lettre"=>"B",
	 "ok"=>false),
	2=>Array(
	"lettre"=>"C",
	 "ok"=>false),
	3=>Array(
	"lettre"=>"D",
	 "ok"=>false),
	4=>Array(
	"lettre"=>"E",
	 "ok"=>false),
	5=>Array(
	"lettre"=>"F",
	 "ok"=>false),
	6=>Array(
	"lettre"=>"G",
	 "ok"=>false),
	7=>Array(
	"lettre"=>"H",
	 "ok"=>false),
	8=>Array(
	"lettre"=>"I",
	 "ok"=>false),
	9=>Array(
	"lettre"=>"J",
	 "ok"=>false),
	10=>Array(
	"lettre"=>"K",
	 "ok"=>false),
	11=>Array(
	"lettre"=>"L",
	 "ok"=>false),
	12=>Array(
	"lettre"=>"M",
	 "ok"=>false),
	13=>Array(
	"lettre"=>"N",
	 "ok"=>false),
	14=>Array(
	"lettre"=>"O",
	 "ok"=>false),
	15=>Array(
	"lettre"=>"P",
	 "ok"=>false),
	16=>Array(
	"lettre"=>"Q",
	 "ok"=>false),
	17=>Array(
	"lettre"=>"R",
	 "ok"=>false),
	18=>Array(
	"lettre"=>"S",
	 "ok"=>false),
	19=>Array(
	"lettre"=>"T",
	 "ok"=>false),
	20=>Array(
	"lettre"=>"U",
	 "ok"=>false),
	21=>Array(
	"lettre"=>"V",
	 "ok"=>false),
	22=>Array(
	"lettre"=>"W",
	 "ok"=>false),
	23=>Array(
	"lettre"=>"X",
	 "ok"=>false),
	24=>Array(
	"lettre"=>"Y",
	 "ok"=>false),
	25=>Array(
	"lettre"=>"Z",
	 "ok"=>false),
	);
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
sort($Noms);
$test=[];
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
	
	if(isset($nom) && $nom!=""){
		
	echo '<a class="lienArtiste '.$nom[0].'" href="artiste/'.$id.'">'.$nom .'</a>';
}
else
{
	echo '<a class="lienArtiste '.$nom[0].'" href="artiste/'.$id.'">'.$nom.'</a>' ;
}	
	
	
}
//var_dump($Noms);
?>
</section>