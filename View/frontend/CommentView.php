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
				<?php if (!empty($_SESSION['id'])){
					echo '<div id="EditComment">
						<h3>Ajouter un commentaire</h3>
						<form method="post" action="index.php?action=AddComment&amp;NumberChapter=' . $_GET['NumberChapter'] . '">
							<label for="Message">Message</label>
							<input type="text" name="Message" id="Message" />
							<button type="submit">Envoyer</button>
						</form>
					</div>';
				}?>
				<div id="DisplayComment">
					<?php while($Comment = $SelectChapterComment->fetch()){ ?>
						<div id="ReadComment">
							<h3><?php echo htmlspecialchars($Comment['Pseudo']) ?></h3>
							<p><?php echo htmlspecialchars($Comment['Message'])?></p>
							<a href="<?php echo 'index.php?action=AlertComment?amp;Comment=' . $Comment['id'] ;?>"><img src="public/Image/CommentAlert.png" alt="Signaler" id="CommentSignal" /></a>
						</div>
					<?php } ?>
				</div>
		</div>
	</div>
<?php $Chapter->closeCursor(); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>