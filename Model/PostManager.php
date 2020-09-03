<?php

class PostManager
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
	public function getPosts($NumeroChapter){
		$bdd= $this->bddConnect();
		$req = $bdd->prepare('SELECT * FROM book WHERE id =?');
		$req->execute(array($NumeroChapter));
		return $req;
	}
	public function getPost($PostId)
	{
		$bdd= $this->bddConnect();
		$Chapter = $bdd->prepare('SELECT *,DatePublication(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM book WHERE id=?');
		$Chapter->execute(array($PostId));
		return $Chapter;
	}
	private function bddConnect()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', 'root');
        return $bdd;
	}
}