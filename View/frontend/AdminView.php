<?php $title="Jean Forteroche - Admin"?>
<?php ob_start(); ?>
	<div id="Container">
		<h1>Administrateur</h1>

		<h2>Le livre</h2>
		<a href="index.php?action=AddChapter" id="AddChapter"><button>Ajouter un chapitre</button></a>
		<table>
			<tr>
				<th>Titre</th>
				<th>Modifier chapitre</th>
				<th>Supprimer chapitre</th>
			</tr>
			<?php while ($ChapterSelect = $Chapter->fetch()){ ?>
				<tr>
					<td><?php echo $ChapterSelect['Title']; ?></td>
					<td><a href='index.php?action=EditChapter&amp;NumberChapter=<?php echo $ChapterSelect['id'];?>'><button>Modifier le chapitre</button></a></td>
					<td><a href='index.php?action=DeleteChapter&amp;NumberChapter=<?php echo $ChapterSelect['id'];?>'><button>Supprimez le chapitre</button></a></td>
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
						<td><?php echo htmlspecialchars($CommentAlert['Message']);?></td>
						<td><a <?php echo 'href=index.php?action=AdminSuppComment&amp;idComment=' . $CommentAlert['id'];?>><button>Supprimez</button></a></td>
						<td><a <?php echo 'href=index.php?action=RestoreComment&amp;idComment=' . $CommentAlert['id'];?>><button>Restaurer</button></a></td>
					</tr>
				<?php } ?>
			</table>
	</div>
<?php $AlertMsg->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>