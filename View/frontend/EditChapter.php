<?php $title = "Modifier Chapitre" ?>
<?php ob_start(); ?>
	<script src="https://cdn.tiny.cloud/1/qrrducpd3zxnxunv816kspfdlo439952uwbaqdw5mv985chm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
      tinymce.init({
        selector: '#Texte',
		menubar : false,
      });
    </script>
	<div id="Container">
	<?php while($ChapterSelect = $Chapter->fetch()){ ?>
		<form method="post" action='index.php?action=EditChapterPost&amp;NumberChapter=<?php echo $ChapterSelect['id']; ?>'>
			<label for="Title">Titre du chapitre</label>
			<input type="text" name="Title" id="Title" value="<?php echo $ChapterSelect['Title']; ?>" required />
			<label for="Texte">Texte du chapitre</label>
			<textarea type="text" name="Texte" id="Texte"><?php echo $ChapterSelect['Texte']; ?> </textarea>
			<button type="submit">Modifier le chapitre</button>
		</form>
		<?php } ?>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>