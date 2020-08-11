<?php 
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', 'root');
$reponse = $bdd->query('SELECT * FROM livre ORDER BY NumeroChapitre');
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
				<a href="index.html" id ="LogoAccueil">
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
		<div id="Livre">
			<img src="Image/Couverture_Alaska.png" alt="Couverture livre"/>
			<h2 id="Titre">" Billet simple pour l'Alaska "</h2>
			
			<?php
	while ($donnees = $reponse->fetch()){
?>
	<div id="PageLivre">
		<h3>
			<?php echo $donnees['NumeroChapitre'] . ' . ' . $donnees['Chapitre'] ?>
		</h3>
		<p>
			<?php echo $donnees['Texte'] ?>
		</p>
		<a href="Commentaire.php" method="post">Commentaire</a>
	</div>
<?php
	}
?>
		</div>
	</div>
	<footer>
	
	</footer>
</body>
</html>