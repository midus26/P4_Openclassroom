<?php $title = 'CommentaireChapitre' . $_GET['NumberChapter'] ?>
<?php ob_start(); ?>
	<div id="Container">
		<?php echo "<h1>Commentaire du chapitre" . $_GET['NumberChapter'] . "</h1>" ?>
		<div id="PageLivre">
			<?php
				while($ChapterSelect = $Chapter->fetch()){
			?>
				<?php echo "<h2>" . $ChapterSelect['Title'] . "</h2>";?>
				<?php echo "<p>" . $ChapterSelect['Texte'] . "</p>" ?>
			<?php
				}
			?>
			<a href="index.php?action=ListChapter">Retour à l'accueil</a>
		</div>
		<div id="Comment">
			<h2>Commentaire</h2>
				<div id="DisplayComment">
					<?php while($Comment = $SelectChapterComment->fetch()){ ?>
						<h3><?php echo $Comment['Pseudo'] ?></h3>
						<p><?php echo $Comment['Message']?></p>
					<?php } ?>
				</div>
			</div>
	</div>
<?php $Chapter->closeCursor(); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>