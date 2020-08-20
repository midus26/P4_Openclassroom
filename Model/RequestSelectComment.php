<?php
function getPosts($NumeroChapter){
	require("Model/TryCatch.php");
	$req = $bdd->prepare('SELECT * FROM book WHERE NumeroChapitre =?');
	$req->execute(array($NumeroChapter));
	return $req;
}
function getPost($PostId)
{
	require("Model/TryCatch.php");
	$Chapter = $bdd->prepare('SELECT *,DatePublication(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM book WHERE id_Post=?');
	$Chapter->execute(array($PostId));
	return $Chapter;
}
function getComments($NumeroChapter)
{
	require("Model/TryCatch.php");
	$Comment = $bdd->prepare('SELECT * FROM commentaire WHERE Id_Chapter =?');
	$Comment->execute(array($NumeroChapter));
	return $Comment;
}