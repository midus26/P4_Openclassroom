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
	<header>
		<div id="En-tete">
			<div id="En-tete_Left">
				<a href="index.php" id ="LogoAccueil">
				<img src="Image/icone.png" alt="Logo de livre" id="Logo"/>
				<h1 id="Auteur">Jean Forteroche</h1>
				</a>
			</div>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="Biographie.php">Biographie</a></li>
				<li><a href="Contact.php">Contact</a></li>
				<li><a href="Connexion.php"><img src="Image/IconeProfile.png" alt="IconeVisiteur" id="IconeProfile"/></a></li>
			</ul>
		</nav>
		</div>
	</header>
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