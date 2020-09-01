<?php $title = "Modifier un commentaire"; ?>
<?php ob_start(); ?>
	<div id="Container">
		<h1>Modifier un commentaire</h1>
			<div id="ReadComment">
			<h3>Nouveau Message</h3>
				<?php while($Comment = $Comments->fetch()){ ?>
					<form method="post" action="index.php?action=ModifierCommentairePost&amp;idComment=<?php echo $_GET['Comment'] ?>">
						<label for="Message">Message :</label>
						<input type="text" name="Message" id="Message" value="<?php echo $Comment['Message'];?>"/>
						<button type="submit">Envoyer</button>
					</form>
				<?php } ?>
			</div>
	</div>
	
<?php $Comments->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require("template.php");?>