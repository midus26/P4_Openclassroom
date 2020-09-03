<?php
	require_once('Model/Manager.php');
class PostManager extends Manager
{
	//Recuperer un chapitre précis
	public function getBillet($NumeroChapitre){
		$bdd= $this->bddConnect();
		if (isset($NumeroChapitre)){
		$Chapter = $bdd->prepare('SELECT * FROM Book WHERE id=?');
		$Chapter->execute(array($NumeroChapitre));
		return $Chapter;
		}
		else{
			echo 'Empty';
		}
	}
	//Recuperer tous les chapitres
	public function getBillets()
	{
		$bdd= $this->bddConnect();
		$Chapters = $bdd->query('SELECT * FROM Book ORDER BY id');
		return $Chapters;
	}
}