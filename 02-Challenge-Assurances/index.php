<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet"  href="./css/style.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,900;1,400;1,900&display=swap" rel="stylesheet">
		<title>O'ssurance</title>
	</head>
	<body>
		<main>
		<h1>O'ssurance</h1>
		<h2>Calcul du tarif de votre client</h2>

		<form action="index.php" method="POST">
			
			<div>
			<label for="calcul-age">Âge:</label><br>
			<input type="number" name="age" id="calcul-age" placeholder="Votre âge" required></div>

			<div>
			<label for="calcul-permis">Années de permis:</label><br>
			<input type="number" name="permis" id="calcul-permis" placeholder="Votre permis" required></div>
			
			<div>
			<label for="calcul-accident">Nombre d'accidents reponsables:</label><br>
			<input type="number" name="nbAccident"  id="calcul-accident" placeholder="Nombre d'accident:" required></div>

			<div>
			<label for="calcul-assurance">Années chez son assureur:</label><br>
			<input type="number" name="nbAnnee" id="calcul-assurance" placeholder="Année d'assurance" required></div>

			<input class="button" type="submit" value="Calculer le tarif">
		</form>

		<?php

		if(empty($_POST == false)) {
			$tarif = "";
			$palier = 1;
			$age = $_POST["age"];
			$anciennete_permis = $_POST["permis"];
			$nbAccident = $_POST["nbAccident"];
			$anciennete_assureur = $_POST["nbAnnee"];

			if($nbAccident >= 1) {
				$palier = $palier - $nbAccident;
			}

			if($anciennete_permis >= 2) {
				$palier = $palier + 1;
			}

			if($age >= 25) {
				$palier = $palier + 1;
			}

			if($anciennete_assureur >= 5 && $palier > 0) {
				$palier = $palier +1;
			}

			if($palier < 0) {
				$palier = 0;
			}
				

			//	Premiere solution avec des if et elseif
			//
			//	if($palier <= 0) {
			//		echo "<p>Votre client à droit au tarif <strong>Refus d'assurer<strong></p>";
			//	}
			//
			//	elseif($palier == 2) {
			//		echo "<p>Votre client à droit au tarif <strong class=\"palier-orange\">Orange</strong></p>";
			//	}
			//	
			//	elseif($palier == 3) {
			//		echo "<p>Votre client à droit au tarif <strong class=\"palier-vert\">Vert</strong></p>";
			//	}
			//
			//	elseif($palier == 4) {
			//		echo "<p>Votre client à droit au tarif <strong class=\"palier-bleu\">Bleu</strong></p>"; 
			//	}
			//
			// else {
			//		echo "<p>Votre client à droit au tarif <strong class=\"palier-rouge\">Rouge</strong></p>";
			//	}
			

			// Seconde solution avec le switch
			switch($palier) {
				case 0:
					echo "<p>Votre client à droit au tarif <strong>Refus d'assurer</strong></p>";
					break;
					
				case 1:
					echo "<p>Votre client à droit au tarif <strong class=\"palier-rouge\">Rouge</strong></p>";
					break;

				case 2:
					echo "<p>Votre client à droit au tarif <strong class=\"palier-orange\">Orange</strong></p>";
					break;

				case 3:
					echo "<p>Votre client à droit au tarif <strong class=\"palier-vert\">Vert</strong></p>";
					break;

				case 4:
					echo "<p>Votre client à droit au tarif <strong class=\"palier-bleu\">Bleu</strong></p>";
					break;
			}

			// Dernière solution avec un tableau
			$tarifcouleur = [
				"<strong>Refus d'assurer",
				"<strong class=\"palier-rouge\">Rouge",
				"<strong class=\"palier-orange\">Orange",
				"<strong class=\"palier-vert\">Vert",
				"<strong class=\"palier-rouge\">Rouge",
			];

			echo "<p>Votre client à droit au tarif " . $tarifcouleur[$palier] . " .</strong></p>";
		}
		?>
		</main>
		
		<aside>
		<img src="./images/voitures.jpg" alt="">
		</aside>

	</body>
</html>
