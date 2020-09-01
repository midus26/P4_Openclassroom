<?php $title="Jean Forteroche - Admin"?>
<?php ob_start(); ?>
	<div id="Container">
		<h1>Administrateur</h1>

		<h2>Le livre</h2>
		<button>Ajouter un chapitre</button>
		<button>Modifier un chapitre</button>
		<button>Supprimez un chapitre</button>
		<h2>Les utilisateurs</h2>
		//Tableau des inscrits
		<h2>Les commentaires</h2>
			<table>
				<tr>
					<td>Pseudo</td>
					<td>Message</td>
					<td>Option</td>
				</tr>
				<?php while($CommentAlert = $AlertMsg->fetch()){?>
					<tr>
						<td><?php echo $CommentAlert['Pseudo']; ?></td>
						<td><?php echo $CommentAlert['Message'];?></td>
						<td><button>Supprimez</button></td>
					</tr>
				<?php } ?>
			</table>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>