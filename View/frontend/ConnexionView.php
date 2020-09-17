<?php $title="Jean Forteroche - Connexion" ?>
<?php ob_start(); ?>
	<div id="Connexion">
		<h1>Connexion</h1>
		<?php 
			if (!empty($_SESSION['Pseudo'])){
				echo '<form method="post" id="Deconnexion" action="index.php?action=Disconnect">
					<button id="Deconnexion" type="submit">Deconnexion</button>
					</form>';
			}
			else{
				echo '<form method="post" action="index.php?action=ConnexionPost">
					<label for="Pseudo">Pseudo :</label>
					<input type="text" name="Pseudo" id="Pseudo" required/>
					<label for="Password">Mot de passe :</label>
					<input type="Password" name="Password" id="Password" required/>
					<button type="submit">Connexion</button>
				</form>';
			}
			?>
	</div>
	<div id="Inscription">
		<h2>Pas encore de Compte?</h2>
		<p>En vous inscrivant via le formulaire ci-dessous, vous pourrez commenter les différents chapitres que vous souhaitez</p>
		<form method="post" action="index.php?action=AddClient">
			<label for="Pseudo">Pseudo :</label>
				<input type="text" name="Pseudo" id="Pseudo" required />
			<label for="Password">Mot de passe :</label>
				<input type="password" name="Password" id="Password" required />
			<label for="VerifPassword">Retaper votre mot de passe :</label>
				<input type="password" name="VerifPassword" id="VerifPassword" required />
			<button type="submit">Inscription</button>
		</form>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php')?>