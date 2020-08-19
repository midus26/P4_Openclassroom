<?php 
session_start();
require("TryCatch.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Jean Forteroche</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width"/>
		<link rel="stylesheet" href="style.css" />
	</head>
<body>
	<?php	require("Affichage/Header.php")?>
	<div id="Container">
		<div id="TexteCentrer">
			<h2>Inscription/Connexion </h2>
			<p>En vous inscrivant, vous pourrez participer à la communauté du livre. Commenter les Chapitres, en écrivant votre ressentit vis à vie du chapitre .</p>
		</div>
		<div id="InscriptionConnection">
			<div id="Connect">
				<h3>Connexion</h3>
				<form method="post" action="AuthentificationPost.php">
					<label>Identifiant :</label>
					<input type="text" for="Prenom"/>
					<label>Mot de passe</label>
					<input type="password" for="Password"/>
					<button type="submit">Validé</button>
				</form>
			</div>
			<div id="Inscription">
				<h3>Inscription</h3>
				<p>C'est rapide, gratuit, et vous permettra de réserver votre pseudo sur les forums, afin que personne d'autre que vous ne puisse l'utiliser...</p>
				<a href="CreateCompte.php"><button>Créer un compte</button></a>
			</div>
		</div>
	</div>
</body>
</html>