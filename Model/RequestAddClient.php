<?php
function CheckPassword()
{
	$Verif = NULL;
	if (isset($_POST['Password']) && isset($_POST['VerifPassword'])){
		if ($_POST['Password'] == $_POST['VerifPassword']){
			NewClient();
		}
		else{
			echo "Erreur de resaisie du mot de passe";
		}
	}
}
function NewClient()
{
	require('Model/TryCatch.php');
	//Hachage du Mot de Passe
		$Pass_hache = password_hash($_POST['Password'], PASSWORD_DEFAULT);

	// Insertion
		$req = $bdd->prepare('INSERT INTO client(Pseudo, Password) VALUES(:Pseudo, :Password)');
		$req->execute(array(
			'Pseudo' => $Pseudo,
			'Password' => $Pass_hache));
}
function CheckConnexion()
{
	require('Model/TryCatch.php');
	//  Récupération de l'utilisateur et de son pass hashé
		$req = $bdd->prepare('SELECT id, Password FROM membres WHERE pseudo = :Pseudo');
		$req->execute(array(
			'Pseudo' => $Pseudo));
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
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['pseudo'] = $pseudo;
			echo 'Vous êtes connecté !';
		}
		else {
			echo 'Mauvais identifiant ou mot de passe !';
		}
	}
}
