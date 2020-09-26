<?php $title="Ajout d'un chapitre"?>
<?php ob_start(); ?>
	<script src="https://cdn.tiny.cloud/1/qrrducpd3zxnxunv816kspfdlo439952uwbaqdw5mv985chm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
      tinymce.init({
        selector: '#TexteChapitre',
		menubar : false,
      });
    </script>
	<div id="Container">
		<h1>Ajout d'un chapitre</h1>
		<form method="post" action="index.php?action=AddChapterPost">
			<label for="TitleChapitre">Titre du chapitre</label>
			<input type="text" name="TitleChapitre" id="TitleChapitre" required />
			<label for="TexteChapitre">Contenu du chapitre</label>
			<textarea type="text" name="TexteChapitre" id="TexteChapitre"  ></textarea>
			<button type="submit">Ajouter</button>
		</form>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>