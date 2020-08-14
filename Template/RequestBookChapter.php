<?php
function getBillet()
{
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', 'root');
	}
	catch(Execption $e){
		die("Erreur : " . $e->getMessage());
	}
	$Chapter = $bdd->query('SELECT * FROM livre ORDER BY NumeroChapitre');
	return $Chapter;
}