<?php $title = "Modifier Chapitre" ?>
<?php ob_start(); ?>
	<div id="Container">
		<form method="post" action="index.php?action=EditChapter">
		<?php while($ChapterSelect = $Chapter->fetch()){ ?>
			<label for="Title">Titre du chapitre</label>
			<input type="text" name="Title" id="Title" value = <?php echo $ChapterSelect['Title']; ?>/>
			<label for="Texte">Texte du chapitre</label>
			<textarea type="text" name="Texte" id="Texte"><?php echo $ChapterSelect['Texte']; ?> </textarea>
			<button type="submit">Modifier le chapitre</button>
		<?php } ?>
		</form>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>