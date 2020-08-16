<?php
function getPost($NumeroChapter){
	require("TryCatch.php");
	$req = $bdd->query('SELECT * FROM livre WHERE NumeroChapitre =' . $NumeroChapter);
	return $req;
}
function getComment($NumeroChapter)
{
	require("TryCatch.php");
	$Comment = $bdd->query('SELECT * FROM commentaire WHERE Chapitre =' . $NumeroChapter);
	return $Comment;
}