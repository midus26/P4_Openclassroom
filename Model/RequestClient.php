<?php
function CheckPassword()
{
	if (!empty($_POST['Password']) && !empty($_POST['VerifPassword'])){
		if ($_POST['Password'] == $_POST['VerifPassword']){
			AddClient();
		}
		else{
			echo "Erreur de resaisie du mot de passe";
		}
	}
}
function AddClient()
{
	require('Model/TryCatch.php');
	//Hachage du Mot de Passe
		$Pass_hache = password_hash($_POST['Password'], PASSWORD_DEFAULT);

	// Insertion
		$req = $bdd->prepare('INSERT INTO client(Pseudo, Password) VALUES(:Pseudo, :Password)');
		$req->execute(array(
			'Pseudo' => $_POST['Pseudo'],
			'Password' => $Pass_hache));
}
function CheckConnexion()
{
	require('Model/TryCatch.php');
	//  Récupération de l'utilisateur et de son pass hashé
		$req = $bdd->prepare('SELECT Id,Droit, Password FROM client WHERE Pseudo = :Pseudo');
		$req->execute(array(
			'Pseudo' => $_POST['Pseudo']));
		$resultat = $req->fetch();

	// Comparaison du pass envoyé via le formulaire avec la base
		$isPasswordCorrect = password_verify($_POST['Password'], $resultat['Password']);

	if (!$resultat)
	{
		echo 'Mauvais identifiant ou mot de passe !';
	}
	else
	{
		if ($isPasswordCorrect) {
			session_start();
			$_SESSION['id'] = $resultat['Id'];
			$_SESSION['Pseudo'] = $_POST['Pseudo'];
			$_SESSION['Droit'] = $resultat['Droit'];
			echo 'Vous êtes connecté !';
		}
		else {
			echo 'Mauvais identifiant ou mot de passe !';
		}
	}
}
function SessionDestroy()
{
	session_start();
	$_SESSION = array();
	session_destroy();
	echo "session déconnecté";
}