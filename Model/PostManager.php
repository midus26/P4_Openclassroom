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
}