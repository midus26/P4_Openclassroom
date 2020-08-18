<?php
function getPosts($NumeroChapter){
	require("TryCatch.php");
	$req = $bdd->prepare('SELECT * FROM book WHERE NumeroChapitre =?');
	$req->execute(array($NumeroChapter));
	return $req;
}
function getPost($PostId)
{
	require("TryCatch.php");
	$req = $bdd->prepare('SELECT *,DatePublication(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM book WHERE id=?');
	$req->execute(array($PostId));
	$post = $req->fetch();
	return $post;
}
function getComment($NumeroChapter)
{
	require("TryCatch.php");
	$Comment = $bdd->prepare('SELECT * FROM commentaire WHERE Id_Chapter =?');
	$Comment->execute(array($NumeroChapter));
	return $Comment;
}