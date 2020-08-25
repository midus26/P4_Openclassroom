<!DOCTYPE html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width"/>
		<link rel="stylesheet" href="public/css/style.css" />
	</head>
	
	<body>
		<header>
		<div id="En-tete">
			<div id="En-tete_Left">
				<a href="index.php" id ="LogoAccueil">
					<img src="public/Image/icone.png" alt="Logo de livre" id="Logo"/>
					<h1 id="Auteur">Jean Forteroche</h1>
				</a>
			</div>
			<nav>
				<ul>
					<a href="index.php"><li>Accueil</li></a>
					<a href="index.php?action=Bio"><li>Biographie</li></a>
					<?php
						if (isset($_SESSION['Pseudo'])){
							echo '<a href="index.php?action=Connexion"><li>' . $_SESSION['Pseudo'] . '</li></a>';
						}
						else{
							echo '<a href="index.php?action=Connexion"><li>Connexion</li></a>';
						}
					?>
				</ul>
			</nav>
		</div>
		</header>
		<?= $content ?>
	</body>
</html>