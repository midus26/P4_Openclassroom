<?php 
session_start();
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
		<h2>Identifiez-vous</h2>
		<p>En vous connectant vous pourrez participez à la communauté, des passionnés du nouvel ouvrage.<br/>
		Alors n'hésitez pas à vous inscrire</p>
		</div>
		<form method="post" action="index.html">
			<label>Identifiant :</label>
			<input type="text" name="Identifiant"/>
			<label>Mot de passe :</label>
			<input type="password" name="motdePasse"/>
		</form>
	</div>
</body>
</html>