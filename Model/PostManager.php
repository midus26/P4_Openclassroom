<?php
	require_once('Model/Manager.php');
class PostManager extends Manager
{
	//Recuperer un chapitre précis
	public function getBillet($NumeroChapitre){
		$bdd= $this->bddConnect();
		$Chapter = $bdd->prepare('SELECT * FROM Book WHERE id=?');
		$Chapter->execute(array($NumeroChapitre));
		return $Chapter;
	}
	//Recuperer tous les chapitres
	public function getBillets()
	{
		$bdd= $this->bddConnect();
		$Chapters = $bdd->query('SELECT * FROM Book ORDER BY id');
		return $Chapters;
	}
	public function AddBillet($Titre,$Texte){
		$bdd = $this->bddConnect();
		$Chapter = $bdd->prepare('INSERT INTO book(Title, Texte) VALUES (?,?)');
		$Chapter->execute(array($Titre,$Texte));
		echo 'Ajout du nouveau chapitre';
	}
	public function EditChapter($Titre,$Texte,$NumberChapter){
		$bdd = $this->bddConnect();
		$Chapter = $bdd->prepare('UPDATE book SET Title = :ModifTitle,Texte= : ModifTexte WHERE id= : IdChapter');
		$Chapter->execute(array(
		'ModifTitle' => $Titre,
		'ModifTexte' => $Texte,
		'IdChapter' => $NumberChapter));
		echo "Contenu du chapitre modifié";
	}
	public function DeleteChapter($NumberChapter){
		$bdd = $this->bddConnect();
		$ChapterDelete = $bdd->prepare('DELETE FROM book WHERE id= ?');
		$ChapterDelete->execute(array($NumberChapter));
		echo "Chapitre Supprimer";
	}
}