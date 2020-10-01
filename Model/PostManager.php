<?php
	require_once('Model/Manager.php');
class PostManager extends Manager
{
	//Recuperer un chapitre précis
	public function getBillet($NumeroChapitre){
		$bdd= $this->bddConnect();
		$Chapter = $bdd->prepare('SELECT * FROM book WHERE id=?');
		$Chapter->execute(array($NumeroChapitre));
		return $Chapter;
	}
	//Recuperer tous les chapitres
	public function getBillets()
	{
		$bdd= $this->bddConnect();
		$Chapters = $bdd->query('SELECT * FROM book ORDER BY id');
		return $Chapters;
	}
	//Ajout d'un chapitre
	public function AddBillet($Titre,$Texte){
		$bdd = $this->bddConnect();
		$Chapter = $bdd->prepare('INSERT INTO book(Title, Texte) VALUES (?,?)');
		$Chapter->execute(array($Titre,$Texte));
		echo 'Ajout du nouveau chapitre';
	}
	//Modification d'un chapitre
	public function EditChapter($Titre,$Texte,$NumberChapter){
		$bdd = $this->bddConnect();
		$Chapter = $bdd->prepare('UPDATE book SET Title = ?,Texte= ? WHERE id= ?');
		$Chapter->execute(array($Titre,$Texte,$NumberChapter));
		echo "Contenu du chapitre modifié";
	}
	//Supprimer  un chapitre
	public function DeleteChapter($NumberChapter){
		$bdd = $this->bddConnect();
		$ChapterDelete = $bdd->prepare('DELETE FROM book WHERE id= ?');
		$ChapterDelete->execute(array($NumberChapter));
		echo "Chapitre Supprimer";
	}
}