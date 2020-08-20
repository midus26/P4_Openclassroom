	<?php ob_start(); ?>
	<?php $title = "Mon Blog"; ?>
	<div id="Container">
		<div id="Livre">
			<img src="public/Image/Couverture_Alaska.png" alt="Couverture livre"/>
			<h2 id="Titre">" Billet simple pour l'Alaska "</h2>
			
			<?php
				while ($SelectChapter = $Chapter->fetch()){
			?>
	<div id="PageLivre">
		<h3>
			<?php echo htmlspecialchars($SelectChapter['NumberTitle']) . ' . ' . htmlspecialchars($SelectChapter['Title']) ?>
		</h3>
		<p>
			<?php echo htmlspecialchars($SelectChapter['Texte']) ?>
		</p>
		<a href="<?php echo "index.php?action=post&amp;NumberChapter=" . htmlspecialchars($SelectChapter['id']);?>">Commentaire</a>
	</div>
			<?php
			}
			$Chapter->closeCursor();
			?>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require("template.php");
