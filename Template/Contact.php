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
		<h2>Contact</h2>
		<p>Vous souhaitez me contacter ?<br/>
		Vous pouvez remplir le formulaire ci-dessous, et je vous répondrez dans les plus bref délai.</p>
		</div>
		<div id="DecorationFormulaire">
			<h3>Formulaire de contact</h3>
			<form method="post">
				<label for="Nom">Votre Nom</label>
				<input type="text" value="" name="Nom"/>
				<label for="Prenom">Votre prénom</label>
				<input type="text" value="" name="Prenom"/>
				<label for="e-mail">Votre e-mail</label>
				<input type="text" value="" name="e-mail"/>
				<label for="Message">Votre message</label>
				<textarea name="Message"></textarea>
				<button>Envoyer</button>
			</form>
		</div>
	</div>
	<footer>
	
	</footer>
</body>
</html>