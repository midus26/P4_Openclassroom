<?php $title="Ajout d'un chapitre"?>
<?php ob_start(); ?>
	<div id="Container">
		<h1>Ajout d'un chapitre</h1>
		<form method="post" action="index.php?action=AddChapterPost">
			<label for="TitleChapitre">Titre du chapitre</label>
			<input type="text" name="TitleChapitre" id="TitleChapitre" required />
			<label for="TexteChapitre">Contenu du chapitre</label>
			<textarea type="text" name="TexteChapitre" id="TexteChapitre" required ></textarea>
			<button type="submit">Ajouter</button>
		</form>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>