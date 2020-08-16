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
			<h2>Créer son compte</h2>
			<p>Pour créer son compte rien de plus simple, que de remplir les champs ci-dessous.<br/>Vous pourrez aprés votre inscritpion commenter tous les chapitres du nouveau livre .</p>
		</div>
		<form method="post" action="CreateComptePost.php">
			<label>Pseudonyme :</label>
			<input type="text" for="Identifiant"/>
			<label>Mot de passe :</label>
			<input type="text" for="password" />
			<button type="submit">Validé</button>
		</form>
	</div>
</body>
</html>