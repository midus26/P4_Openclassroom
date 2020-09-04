<?php
	require_once('Model/Manager.php');
class CommentManager extends Manager
{
	public function getComments($NumeroChapter)
	{
		$bdd= $this->bddConnect();
		$Comment = $bdd->prepare('SELECT commentaire.Message, client.Pseudo,commentaire.DatePublication,client.Id,commentaire.id FROM commentaire INNER JOIN client ON commentaire.Id_Client = client.Id WHERE Id_Chapter=? ORDER BY DatePublication DESC');
		$Comment->execute(array($NumeroChapter));
		return $Comment;
	}
	public function getComment($NumeroComment)
	{
		$bdd= $this->bddConnect();
		$SelectComment = $bdd->prepare('SELECT commentaire.Message, client.Pseudo,commentaire.id FROM commentaire INNER JOIN client ON commentaire.Id_Client = client.Id WHERE commentaire.id=?');
		$SelectComment->execute(array($NumeroComment));
		return $SelectComment;
	}
	public function ReturnNumberChapter()
	{
		$bdd = $this->bddConnect();
		$ChapterSelect = $bdd->prepare('SELECT Id_Chapter FROM commentaire WHERE id= :idComment');
		$ChapterSelect->execute(array(
		'idComment' => $_GET['idComment']));
		return $ChapterSelect;
	}
	public function postComment($Id_Chapter, $Id_Client, $commentMessage)
	{
	$bdd= $this->bddConnect();
    $comments = $bdd->prepare('INSERT INTO commentaire(Id_Chapter, Id_Client, Message, DatePublication) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($Id_Chapter, $Id_Client, $commentMessage));
    return $affectedLines;
	}
	public function UpdateCommentSelect()
	{
		$bdd= $this->bddConnect();
		$comment = $bdd->prepare('UPDATE commentaire SET Message= :ModifComment WHERE id= :Commentid');
		$comment->execute(array(
		'ModifComment' => $_POST['Message'],
		'Commentid' => $_GET['idComment']));
		echo 'Message mis à jour';
	}
	public function SignalComment()
	{
		$bdd= $this->bddConnect();
		$comment = $bdd->prepare('UPDATE commentaire SET AlertMsg = 1 WHERE id= :Commentid');
		$comment->execute(array(
		'Commentid' => $_GET['idComment']));
		echo 'Le commentaire à été signaler';
	}
	public function DeleteComment()
	{
		$bdd= $this->bddConnect();
		$comment = $bdd->prepare('DELETE FROM commentaire WHERE id= :Commentid');
		$comment->execute(array(
		'Commentid' => $_GET['idComment']));
		echo 'Message Supprimer';
	}
	public function ReturnAlertMsg()
	{
		$bdd= $this->bddConnect();
		$AlertMsg = $bdd->prepare('SELECT commentaire.Message,client.Pseudo FROM commentaire INNER JOIN client ON commentaire.Id_Client = client.Id WHERE AlertMsg= :Alert');
		$AlertMsg->execute(array(
		'Alert' => 1));
		return $AlertMsg;
	}
}