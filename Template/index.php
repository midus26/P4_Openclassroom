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
				<li><a href="index.html">Accueil</a></li>
				<li><a href="Biographie.html">Biographie</a></li>
				<li><a href="Contact.html">Contact</a></li>
				<li><a href="Connexion.html"><img src="Image/IconeProfile.png" alt="IconeVisiteur" id="IconeProfile"/></a></li>
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
	<h2>
		<?php echo $donnees['NumeroChapitre'] . ' ' . $donnees['Chapitre'] ?>
	</h2>
	<p>
		<?php echo $donnees['Texte'] ?>
	</p>
<?php
	}
?>
		</div>
	</div>
	<footer>
	
	</footer>
</body>
</html>