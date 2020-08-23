<?php $title = "Jean Forteroche - Connexion" ?>
<?php ob_start(); ?>
<h1>Connexion</h1>

<form method="post" action="index.php?action=ConnexionPost.php">
	<label>Pseudo</label>
	<input type="text" />
	<label>Mot de passe :</label>
	<input type="text" />
	<label>Retaper le mot de passe :</label>
	<input type="text" />
	<button type="submit">Connexion</button>
</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');