<?php
function getComment(){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=commentaire;charset=utf8', 'root', 'root');
	}
	catch(Execption $e){
		die("Erreur : " . $e->getMessage());
	}
	$Comment = $bdd->prepare('SELECT Chapitre FROM comentaire ORDER BY DatePublication WHERE Chapitre = ? ');
	$Comment->execute(array($_GET['Chapitre']));
	return $Comment;
}