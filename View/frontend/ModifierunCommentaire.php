<?php $title = "Modifier un commentaire"; ?>
<?php ob_start(); ?>
	<div id="Container">
		<h1>Modifier un commentaire</h1>
			<div id="ReadComment">
				<?php while($Comment = $Comments->fetch()){ ?>
					<h2>Ancien Message</h2>
					<h3><?php echo $Comment['Pseudo']; ?></h3>
					<p><?php echo $Comment['Message']; ?></p>
				<?php } ?>
			</div>
			<h3>Nouveau Message</h3>
			<form method="post" action="">
				<label for="Message">Message :</label>
				<input type="text" name="Message" id="Message" />
				<button type="submit">Envoyer</button>
			</form>
	</div>
	
<?php $Comments->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require("template.php");?>