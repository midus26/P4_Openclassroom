<?php
session_start();
require("RequestBookChapter.php");
require("RequestSelectComment.php");
$Chapter = getBillet($_GET['NumeroChapter']);
$Post = getPost($_GET['NumeroChapter']);
$SelectChapterComment = getComment($_GET['NumeroChapter']);
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
		<div id="PageLivre">
			<?php
				while($ChapterSelect = $Chapter->fetch()){
			?>
				<?php echo "<h2>" . $ChapterSelect['Chapitre'] . "</h2>";?>
				<?php echo "<p>" . $ChapterSelect['Texte'] . "</p>" ?>
			<?php
				}
			?>
		</div>
		<div id="Comment">
			<h2>Commentaire</h2>
				<div id="DisplayComment">
					<?php while($Comment = $SelectChapterComment->fetch()){ ?>
						<h3><?php echo $Comment['Prenom']. " " . $Comment['Nom']?></h3>
						<p><?php echo $Comment['Message']?></p>
					<?php } ?>
				</div>
				<div id="WriteComment">
				
				</div>
			</div>
	</div>
</body>
</html>