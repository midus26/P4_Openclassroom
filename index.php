<?php
require('controller/frontend.php');

try{
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'ListChapter'){
			ListChapter();
		}
		//Connexion à un Chapitre et ses commentaires
		elseif ($_GET['action'] == 'post'){
			if (isset($_GET['NumberChapter']) && $_GET['NumberChapter'] > 0){
				post();
			}
			else{
				echo "Erreur : aucun chapitre sélectionné";
			}
		}
		//Ajout d'un Commentaire
		elseif ($_GET['action'] == "AddComment"){
			if (isset($_GET['NumberChapter']) && $_GET['NumberChapter'] > 0){
				AddComment();
			}
			else{
				echo "Chapitre incorrect";
			}
		}
		//Connexion à la Biographie 
		elseif ($_GET['action'] == 'Bio'){
			Biographie();
		}
	//Enssemble des différentes fonction vis a vie de la connexion/deconnexion
		//Acces à la page pour ce connecter
		elseif ($_GET['action'] ==  "Connexion"){
			Connexion();
		}
		//Deconnexion de l'utilisateur (deja inscrit)
		elseif ($_GET['action'] == "Disconnect"){
			Deconnexion();
		}
		//Connexion de l'utilisateur (deja inscrit)
		elseif ($_GET['action'] == "ConnexionPost"){
			if (isset($_POST['Pseudo']) && isset($_POST['Password'])){
				ConnexionPost();
			}
			else{
				throw new Exception('Tous les champs ne sont pas remplis');
			}
		}
		//Ajout d'un nouveau client
		elseif ($_GET['action'] == "AddClient"){
			if (isset($_POST['Pseudo']) && isset($_POST['Password']) && isset($_POST['VerifPassword']))
			{
				NewClient();
			}
			else{
				throw new Exception('Tous les champs ne sont remplis');
			}
		}
		elseif ($_GET['action'] == "EditComment"){
			if (isset($_GET['Comment'])){
				ModifierComment();
			}
			else{
				throw new Exception('Id du commentaire à modifier non indiqué');
			}
		}
	}
	//Par default redirection vers l'index
	else{
		ListChapter();
	}
}
catch(Exception $e){
	echo 'Erreur : ' . $e->Message();
}