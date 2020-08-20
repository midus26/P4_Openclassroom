<?php
function getBillet($NumeroChapitre){
	require("Model/TryCatch.php");
	if (isset($NumeroChapitre)){
	$Chapter = $bdd->prepare('SELECT * FROM Book WHERE NumberTitle=?');
	$Chapter->execute(array($NumeroChapitre));
	return $Chapter;
	}
	else{
		
	}
}
function getBillets()
{
	require("Model/TryCatch.php");
	$Chapter = $bdd->query('SELECT * FROM Book ORDER BY NumberTitle');
	return $Chapter;
}