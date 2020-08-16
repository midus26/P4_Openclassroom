<?php 
session_start();
require("RequestBookChapter.php");
$Chapter = getBillets();
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
				<a href="index.php"><li>Accueil</li></a>
				<a href="Biographie.php"><li>Biographie</li></a>
				<a href="Contact.php"><li>Contact</li></a>
				<a href="Authentification.php"><li>Connexion</li></a>
			</ul>
		</nav>
		</div>
	</header>
	<div id="Container">
		<div id="Livre">
			<img src="Image/Couverture_Alaska.png" alt="Couverture livre"/>
			<h2 id="Titre">" Billet simple pour l'Alaska "</h2>
			
			<?php
	while ($SelectChapter = $Chapter->fetch()){
?>
	<div id="PageLivre">
		<h3>
			<?php echo $SelectChapter['NumeroChapitre'] . ' . ' . $SelectChapter['Chapitre'] ?>
		</h3>
		<p>
			<?php echo $SelectChapter['Texte'] ?>
		</p>
		<a href="<?php echo "Commentaire.php?NumeroChapter=" . $SelectChapter['NumeroChapitre'];?>">Commentaire</a>
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