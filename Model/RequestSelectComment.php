<?php
function getPosts($NumeroChapter){
	require("Model/TryCatch.php");
	$req = $bdd->prepare('SELECT * FROM book WHERE id =?');
	$req->execute(array($NumeroChapter));
	return $req;
}
function getPost($PostId)
{
	require("Model/TryCatch.php");
	$Chapter = $bdd->prepare('SELECT *,DatePublication(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM book WHERE id=?');
	$Chapter->execute(array($PostId));
	return $Chapter;
}
function getComments($NumeroChapter)
{
	require("Model/TryCatch.php");
	$Comment = $bdd->prepare('SELECT commentaire.Message, client.Pseudo,commentaire.DatePublication,client.Id,commentaire.id FROM commentaire INNER JOIN client ON commentaire.Id_Client = client.Id WHERE Id_Chapter=? ORDER BY DatePublication DESC');
	$Comment->execute(array($NumeroChapter));
	return $Comment;
}
function getComment($NumeroComment)
{
	require("Model/TryCatch.php");
	$SelectComment = $bdd->prepare('SELECT commentaire.Message, client.Pseudo,commentaire.id FROM commentaire INNER JOIN client ON commentaire.Id_Client = client.Id WHERE commentaire.id=?');
	$SelectComment->execute(array($NumeroComment));
	return $SelectComment;
}
function postComment($Id_Chapter, $Id_Client, $commentMessage)
{
	require("Model/TryCatch.php");
    $comments = $bdd->prepare('INSERT INTO commentaire(Id_Chapter, Id_Client, Message, DatePublication) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($Id_Chapter, $Id_Client, $commentMessage));

    return $affectedLines;
}
function UpdateCommentSelect()
{
	require("TryCatch.php");
	$comment = $bdd->prepare('UPDATE commentaire SET Message= :ModifComment WHERE id= :Commentid');
	$comment->execute(array(
	'ModifComment' => $_POST['Message'],
	'Commentid' => $_GET['idComment']));
	echo "Message mis à jour";
}