<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', 'root');
$reponse = $bdd->query('SELECT * FROM commentaire');
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
		<h2>Commentaire</h2>
		<?php
		while($donnees = $reponse->fetch()){
		?>
		<h3><?php echo $donnees['Prenom'] . $donnees['Nom']?></h3>
		<p><?php echo $donnees['Message']?></p>
	</div>
	<?php
		}
	?>
</body>
</html>