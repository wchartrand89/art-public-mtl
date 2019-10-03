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
foreach ($aData as $cle => $artiste) {
	extract($artiste);
	$lettre1 = strpos($Nom, "A");
	$lettre1Collectif = strpos($NomCollectif, "A");
		if(isset($Nom) && $Nom!="" && $lettre1 === 0){
		echo '<a class="lienArtiste" href="artiste/'.$id_artiste.'">'.$Nom .", ". $Prenom.'</a>';
	}
	else if($lettre1Collectif === 0)
	{
		echo '<a class="lienArtiste" href="">'.$NomCollectif.'</a>' ;
	}
		
		
?>
	
	<?php 
	}
	?>

</section>