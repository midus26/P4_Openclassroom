<?php
session_start();
require("Request/RequestBookChapter.php");
require("Request/RequestSelectComment.php");
$Chapter = getBillet($_GET['NumeroChapter']);
$Post = getPosts($_GET['NumeroChapter']);
$SelectChapterComment = getComment($_GET['NumeroChapter']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jean Forteroche</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width"/>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<?php	require("Affichage/Header.php")?>
	<div id="Container">
		<div id="PageLivre">
			<?php
				while($ChapterSelect = $Chapter->fetch()){
			?>
				<?php echo "<h2>" . $ChapterSelect['Title'] . "</h2>";?>
				<?php echo "<p>" . $ChapterSelect['Texte'] . "</p>" ?>
			<?php
				}
			?>
		</div>
		<div id="Comment">
			<h2>Commentaire</h2>
				<div id="DisplayComment">
					<?php while($Comment = $SelectChapterComment->fetch()){ ?>
						<h3><?php echo $Comment['Pseudo'] ?></h3>
						<p><?php echo $Comment['Message']?></p>
					<?php } ?>
				</div>
				<div id="WriteComment">
				
				</div>
			</div>
	</div>
</body>
</html>