<?php
function getBillet()
{
	require("TryCatch.php");
	$Chapter = $bdd->query('SELECT * FROM livre ORDER BY NumeroChapitre');
	return $Chapter;
}