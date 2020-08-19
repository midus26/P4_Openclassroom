<?php
session_start();
require("Model/RequestBookChapter.php");
require("Model/RequestSelectComment.php");
if (isset($_GET['NumeroChapter']) && $_GET['NumeroChapter'] > 0)
{
	$Chapter = getBillet($_GET['NumeroChapter']);
	$SelectChapterComment = getComment($_GET['NumeroChapter']);
	require("View/CommentaireView.php");
}
else
{
	echo "Erreur : Aucun identifiant de Chapitre";
}
?>