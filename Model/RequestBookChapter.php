<?php
function getBillet($NumeroChapitre){
	require("Model/TryCatch.php");
	if (isset($NumeroChapitre)){
	$Chapter = $bdd->prepare('SELECT * FROM Book WHERE id=?');
	$Chapter->execute(array($NumeroChapitre));
	return $Chapter;
	}
	else{
		
	}
}
function getBillets()
{
	require("Model/TryCatch.php");
	$Chapter = $bdd->query('SELECT * FROM Book ORDER BY id');
	return $Chapter;
}