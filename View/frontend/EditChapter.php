<?php $title = "Modifier Chapitre" ?>
<?php ob_start(); ?>
	<div id="Container">
	<?php while($ChapterSelect = $Chapter->fetch()){ ?>
		<form method="post" action='index.php?action=EditChapterPost&amp;NumberChapter=<?php echo $ChapterSelect['id']; ?>'>
			<label for="Title">Titre du chapitre</label>
			<input type="text" name="Title" id="Title" value="<?php echo $ChapterSelect['Title']; ?>"/>
			<label for="Texte">Texte du chapitre</label>
			<textarea type="text" name="Texte" id="Texte"><?php echo $ChapterSelect['Texte']; ?> </textarea>
			<button type="submit">Modifier le chapitre</button>
		</form>
		<?php } ?>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>