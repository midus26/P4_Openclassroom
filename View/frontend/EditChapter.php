<?php $title = "Modifier Chapitre" ?>
<?php ob_start(); ?>
	<div id="Container">
		<form method="post" action="index.php?action=EditChapter">
			<label for="Title">Titre du chapitre</label>
			<input type="text" name="Title" id="Title"/>
			<label for="Texte">Texte du chapitre</label>
			<input type="text" name="Texte" id="Texte"/>
			<button type="submit">Modifier le chapitre</button>
		</form>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>