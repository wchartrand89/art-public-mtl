
		
		
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
		    
			<?php 
			if($page=="modifier")
			{
				echo'<link rel="stylesheet" href="../../../../css/headerAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/adminmain.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/formulairesAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/var.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/flex.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/text.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/text.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../../../css/footerAdmin.css" type="text/css" media="screen">';


			}else{
				echo'<link rel="stylesheet" href="../../css/headerAdmin.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/adminmain.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/var.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/flex.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/text.css" type="text/css" media="screen">';
				echo'<link rel="stylesheet" href="../../css/footerAdmin.css" type="text/css" media="screen">';

			}
			?>
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Pacifico&display=swap" rel="stylesheet">
<<<<<<< HEAD
		    		
						
=======
		    <link rel="stylesheet" href="../../css/flex.css" type="text/css" media="screen">							
			<link rel="stylesheet" href="../../css/text.css" type="text/css" media="screen">
			<link rel="stylesheet" href="../../css/var.css" type="text/css" media="screen">
			<link rel="stylesheet" href="../../css/adminmain.css" type="text/css" media="screen">
			<link rel="stylesheet" href="../../css/headerAdmin.css" type="text/css" media="screen">
<!--			<link rel="stylesheet" href="../../css/footerAdmin.css" type="text/css" media="screen">-->
			<link rel="stylesheet" href="../../css/modal.css" type="text/css" media="screen">
			
>>>>>>> 4d90e9ea3665622614c38ebf8fa07230dbd06c1d
		</head>
		<body>

			<header class="appbar">	

				<a class="logo" href="/art-public-mtl/api/"><img src="<?php if($page=="modifier"){echo"../../";}?>../../img/icons/logoAP.png" alt="Logo Art public Montréal"></a>
				<a class = "Inter" href="#">En</a>
				<a class = "Deconn" href="#">Déconnexion</a>			
				
			</header>
			<main>
