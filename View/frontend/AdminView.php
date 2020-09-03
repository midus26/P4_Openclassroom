<?php $title="Jean Forteroche - Admin"?>
<?php ob_start(); ?>
	<div id="Container">
		<h1>Administrateur</h1>

		<h2>Le livre</h2>
		<a href="index.php?action=AddChapter"><button>Ajouter un chapitre</button></a>
		<table>
			<tr>
				<th>Titre</th>
				<th>Supprimer chapitre</th>
				<th>Modifier chapitre</th>
			</tr>
			<?php while ($ChapterSelect = $Chapter->fetch()){ ?>
				<tr>
					<td><?php echo $ChapterSelect['Title']; ?></td>
					<td><button>Modifier le chapitre</button></td>
					<td><button>Supprimez le chapitre</button></td>
				</tr>
			<?php } ?>
		</table>
		<h2>Les commentaires signalés</h2>
			<table>
				<tr>
					<th>Pseudo</th>
					<th>Message</th>
					<th>Supprimez commentaire</th>
					<th>Commentaire correct</th>
				</tr>
				<?php while($CommentAlert = $AlertMsg->fetch()){?>
					<tr>
						<td><?php echo $CommentAlert['Pseudo']; ?></td>
						<td><?php echo $CommentAlert['Message'];?></td>
						<td><a <?php echo 'href=index.php?action=AdminSuppComment&amp;idComment=' . $CommentAlert['Pseudo'];?>"><button>Supprimez</button></a></td>
						<td><button>Restaurer</button></td>
					</tr>
				<?php } ?>
			</table>
	</div>
<?php $AlertMsg->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>