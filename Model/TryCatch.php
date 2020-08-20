<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', 'root');
	}
	catch(Execption $e){
		die("Erreur : " . $e->getMessage());
	}