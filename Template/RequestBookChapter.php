<?php
function getBillet($NumeroChapitre){
	require("TryCatch.php");
	if (isset($NumeroChapitre)){
	$Chapter = $bdd->query('SELECT * FROM livre WHERE NumeroChapitre=' . $NumeroChapitre);
	return $Chapter;
	}
	else{
		
	}
}
function getBillets()
{
	require("TryCatch.php");
	$Chapter = $bdd->query('SELECT * FROM livre ORDER BY NumeroChapitre');
	return $Chapter;
}