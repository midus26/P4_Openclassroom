<?php $title="Jean Forteroche - Connexion" ?>
<?php ob_start(); ?>
	<div id="Connexion">
		<h1>Connexion</h1>
		<form method="post" action="index.php?AddClient.php">
			<label>Pseudo :</label>
			<input type="text" for="Pseudo"/>
			<label>Mot de passe :</label>
			<input type="text" for="Password"/>
			<button type="submit">Connexion</button>
		</form>
	</div>
	<div id="Inscription">
		<h2>Pas encore de Compte?</h2>
		<p>En vous inscrivant via le formulaire ci-dessous, vous pourrez commenter les différents chapitres que vous souhaitez</p>
		<form method="post" action="index.php?action=AddClient">
			<label for="Pseudo">Pseudo</label>
				<input type="text" name="Pseudo" id="Pseudo"/>
			<label for="Password">Mot de passe :</label>
				<input type="text" name="Password" id="Password"/>
			<label for="VerifPassword">Retaper votre mot de passe :</label>
				<input type="text" name="VerifPassword" id="VerifPassword"/>
			<button type="submit">Inscription</button>
		</form>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php')?>