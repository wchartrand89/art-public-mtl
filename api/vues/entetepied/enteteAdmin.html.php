
		
		
		<!DOCTYPE html>
		<html lang="fr">
		
		<head>
		    <title>L'art public à Montréal - admin</title>
		    <meta charset="UTF-8">
            <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		    <meta name="description" content="">
			<meta name="viewport" content="width=device-width">
		    
		    <script src="./js/define.js"></script>
		    <script src="./js/admin.js"></script>
		    <script src="../../js/modal.js"></script>
		    <script src="../../js/filtreAdmin.js"></script>
		    
			<?php 
            
			if($page=="modifier")
			{
				
				echo'<link rel="stylesheet" href="../../../../css/headerAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/adminmain.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/formulairesAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/var.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/flex.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/text.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/footer.css" type="text/css" media="screen">';


			}else if($page=="ajout"){
				echo'<link rel="stylesheet" href="../../../css/headerAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../css/adminmain.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../css/formulairesAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../css/var.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../css/flex.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../css/text.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../css/footer.css" type="text/css" media="screen">';
			}else{
				
				echo'<link rel="stylesheet" href="../../css/headerAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/adminmain.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/var.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/modal.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/flex.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/text.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/footerAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/footer.css" type="text/css" media="screen">';

			}
			?>
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Pacifico&display=swap" rel="stylesheet">
		    		
						
		</head>
		<body>

			<header class="appbar">	
				
				<a class="logo" href=""><img src="<?php if($page=="modifier"){echo"../../";}else if($page=="ajout"){echo"../";}?>../../img/icons/logoAP.png" alt="Logo Art public Montréal"></a>				
				<div id="divInter_deconn">
					<a class = "Inter" href="#">En</a>
					<form id='deconnexion' action="?action=deconnexion" method="post">	
						<div>
							<input class = "Deconn" type="submit" value="Déconnexion">
						</div>		
					</form>
				</div>				
			</header>
			<main>
