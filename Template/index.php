<?php 
session_start();
require("Request/RequestBookChapter.php");
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
<?php	require("Affichage/Header.php")?>
	<div id="Container">
		<div id="Livre">
			<img src="Image/Couverture_Alaska.png" alt="Couverture livre"/>
			<h2 id="Titre">" Billet simple pour l'Alaska "</h2>
			
			<?php
	while ($SelectChapter = $Chapter->fetch()){
?>
	<div id="PageLivre">
		<h3>
			<?php echo htmlspecialchars($SelectChapter['NumeroChapitre']) . ' . ' . htmlspecialchars($SelectChapter['Chapitre']) ?>
		</h3>
		<p>
			<?php echo htmlspecialchars($SelectChapter['Texte']) ?>
		</p>
		<a href="<?php echo "Commentaire.php?NumeroChapter=" . htmlspecialchars($SelectChapter['NumeroChapitre']);?>">Commentaire</a>
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