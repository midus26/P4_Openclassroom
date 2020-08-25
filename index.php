<?php
require('controller/frontend.php');

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
		//Connexion à la Biographie 
		elseif ($_GET['action'] == 'Bio'){
			Biographie();
		}
		//Connexion de l'utilisateur
		elseif ($_GET['action'] ==  "Connexion"){
			Connexion();
		}
		//Deconnexion de l'utilisateur
		elseif ($_GET['action'] == "Disconnect"){
			Deconnexion();
		}
		elseif ($_GET['action'] == "ConnexionPost"){
			CheckConnexion();
		}
		//Ajout d'un nouveau client
		elseif ($_GET['action'] == "AddClient"){
			NewClient();
		}
	}
	//Par default redirection vers l'index
	else{
		ListChapter();
	}