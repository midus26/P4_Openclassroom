<?php
	require_once('Model/Manager.php');
class ClientManager extends Manager
{
	public function AddClient()
	{
		$bdd= $this->bddConnect();
		//Hachage du Mot de Passe
			$Pass_hache = password_hash($_POST['Password'], PASSWORD_DEFAULT);

		// Insertion
			$req = $bdd->prepare('INSERT INTO client(Pseudo, Password) VALUES(:Pseudo, :Password)');
			$req->execute(array(
				'Pseudo' => $_POST['Pseudo'],
				'Password' => $Pass_hache));
	}
	public function CheckConnexion()
	{
		$bdd= $this->bddConnect();
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
	public function SessionDestroy()
	{
		$_SESSION = array();
		session_destroy();
		echo "session déconnecté";
	}
	public function VerifPseudo($Pseudo)
	{
		$UsePseudo = false;
		$bdd= $this->bddConnect();
		$req = $bdd->prepare('SELECT Pseudo FROM client WHERE Pseudo= ?');
		$req->execute(array($Pseudo));
		while($PseudoClient = $req->fetch()){
			if ($Pseudo == $PseudoClient['Pseudo']){
				$UsePseudo = true;
			}
		}
		return $UsePseudo;
	}
}