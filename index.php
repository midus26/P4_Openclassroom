<?php
session_start();
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
				if (isset($_POST['Message'])){
				AddComment();
				}
				else{
					throw new Exception('Le contenue du message est vide');
				}
			}
			else{
				throw new Exception("Chapitre incorrect");
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
		//L'utilisateur modifie le contenu de son propre commentaire
		elseif ($_GET['action'] == "EditComment"){
			if (isset($_GET['Comment'])){
				ModifierComment();
			}
			else{
				throw new Exception('Id du commentaire à modifier non indiqué');
			}
		}
		//Commentaire modifier Validation du contenu Renvoie vers le chapitre du commentaire modifié
		elseif ($_GET['action'] == "ModifierCommentairePost"){
			if (isset($_POST['Message']) && isset($_GET['idComment'])){
				UpdateComment();
			}
			else{
				throw new Exception('Le champ est vide');
			}
		}
		//L'utilisateur signal un commentaire
		elseif ($_GET['action'] == "AlertComment"){
			if (isset($_GET['Comment'])){
			AlertComment();
			}
			else{
				throw new Exception('Commentaire a signaler non transmis');
			}
		}
		elseif ($_GET['action'] == "Admin"){
			Admin();
		}
		elseif ($_GET['action'] == "AddChapter"){
			AddChapitre();
		}
		elseif($_GET['action'] == "AddChapterPost"){
			AddChapitrePost();
		}
		elseif($_GET['action'] == "DeleteChapter"){
			if(isset($_GET['NumberChapter'])){
				DeleteChapter();
			}
			else{
				throw new Exception ('Numero du chapitre a supprimer manquant');
			}
		}
	}
	//Par default redirection vers l'index
	else{
		ListChapter();
	}
}
catch(Exception $e){
	die('Erreur : ' . $e->getMessage());
}