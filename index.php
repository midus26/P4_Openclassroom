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
			if (isset($_GET['Comment']) && isset($_GET['NumberChapter'])){
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
			if (isset($_GET['idComment'])){
			AlertComment();
			}
			else{
				throw new Exception('Commentaire a signaler non transmis');
			}
		}
		//L'utilisateur supprime son commentaire
		elseif ($_GET['action'] == "DeleteComment"){
			if (isset($_GET['idComment'])){
				DelComment();
			}
			else{
				throw new Exception ('Id du commentaire non transmis');
			}
		}
		//Administrateur
		elseif ($_GET['action'] == "Admin"){
			if (isset($_SESSION['Droit']) && $_SESSION['Droit'] == '1'){
				Admin();
			}
			else{
				ListChapter();
			}
		}
		//Admin Ajouter chapitre
		elseif ($_GET['action'] == "AddChapter"){
			if (isset($_SESSION['Droit']) && $_SESSION['Droit'] == '1'){
				AddChapitre();
			}
			else{
				ListChapter();
			}
		}
		//Admin Ajout dans la base de données le chapitre valide
		elseif($_GET['action'] == "AddChapterPost"){
			if (isset($_SESSION['Droit']) && $_SESSION['Droit'] == '1'){
				AddChapitrePost();
			}
			else{
				ListChapter();
			}
		}
		//Admin Modification du chapitre
		elseif ($_GET['action'] == "EditChapter"){
			if (isset($_GET['NumberChapter'])){
				if (isset($_SESSION['Droit']) && $_SESSION['Droit'] == '1'){
					EditChapter();
				}
				else{
					ListChapter();
				}
			}
			else{
				throw new Exception('Erreur pas de chapitre selectionner pour une modification');
			}
		}
		//Admin Modification du chapitre valide
		elseif($_GET['action'] == "EditChapterPost"){
			if (isset($_GET['NumberChapter'])){
				if (isset($_SESSION['Droit']) && $_SESSION['Droit'] == '1'){
					EditChapterPost();
				}
				else{
					ListChapter();
				}
			}
			else{
				throw new Exception ('Impossible de modifié le chapitre (Numero du chapitre non transmis');
			}
		}
		//Admin Supprimer un chapitre
		elseif($_GET['action'] == "DeleteChapter"){
			if(isset($_GET['NumberChapter'])){
				if (isset($_SESSION['Droit']) && $_SESSION['Droit'] == '1'){
				DeleteChapter();
				}
				else{
					ListChapter();
				}
			}
			else{
				throw new Exception ('Numero du chapitre a supprimer manquant');
			}
		}
		//Admin Supprimer un commentaire signalé
		elseif ($_GET['action'] == "AdminSuppComment"){
			if (isset($_SESSION['Droit']) && $_SESSION['Droit'] == '1'){
				if (isset($_GET['idComment'])){
					AdminDeleteComment($_GET['idComment']);
				}
				else{
					throw new Exception ('Reference du commentaire non transmis');
				}
			}
			else{
				ListChapter();
			}
		}
		//Admin Restaurer un commentaire signalé
		elseif ($_GET['action'] == "RestoreComment"){
			if (isset($_SESSION['Droit']) && $_SESSION['Droit'] == '1'){
				if ($_GET['idComment']){
				RestoreComment($_GET['idComment']);
				}
				else{
					throw new Exception ('Id du commentaire non transmis');
				}
			}
			else{
				ListChapter();
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