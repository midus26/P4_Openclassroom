<?php $title="Ajout d'un chapitre"?>
<?php ob_start(); ?>
	<div id="Container">
		<h1>Ajout d'un commentaire</h1>
		<form method="post" action="index.php?action=AddChapter">
			<label for="Title">Titre du chapitre</label>
			<input type="text" for="Title" id="Title" required />
			<label for="Texte">Contenu du chapitre</label>
			<input type="text" for="Texte" id="Texte" required />
			<button type="submit">Ajouter</button>
		</form>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>