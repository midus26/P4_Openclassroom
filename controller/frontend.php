<?php
	require('Model/RequestBookChapter.php');
	require('Model/RequestSelectComment.php');
	require('Model/RequestClient.php');
	
	function ListChapter(){
		session_start();
		$Chapter = getBillets();

		require('View/frontend/IndexView.php');
	}
	function post(){
		session_start();
		$Chapter = getBillet($_GET['NumberChapter']);
		$SelectChapterComment = getComments($_GET['NumberChapter']);
		
		require('View/frontend/CommentView.php');
	}
	function AddComment(){
		session_start();
		if (!empty($_GET['NumberChapter']) && !empty($_SESSION['id']) && !empty($_POST['Message'])){
		$affectedLines = postComment($_GET['NumberChapter'],$_SESSION['id'],$_POST['Message']);
		
		 if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&NumberChapter=' . $_GET['NumberChapter']);
    }
		}
		require('View/frontend/CommentView.php');
	}
	function Biographie(){
		session_start();
		require('View/frontend/BiographieView.php');
	}
	function Connexion(){
		session_start();
		require('View/frontend/ConnexionView.php');
	}
	function ConnexionPost(){
		if (isset($_POST['Pseudo']) && isset($_POST['Password'])){
		CheckConnexion();
		}
		else{
			echo "Erreur tous les champs ne sont pas rempli";
		}
		require('View/frontend/ConnexionView.php');
	}
	function Deconnexion(){
		SessionDestroy();
		require('View/frontend/ConnexionView.php');
	}
	function NewClient(){
		if (!empty($_POST['Pseudo'])){
			if (VerifPseudo($_POST['Pseudo'])){
				echo "Pseudo déjà utilisé";
			}
			else{
				if (!empty($_POST['Password']) && !empty($_POST['VerifPassword'])){
					if ($_POST['Password'] == $_POST['VerifPassword']){
						//AddClient();
					}
					else{
						echo "Les mots de passe ne concorde pas";
					}
				}
				else{
					echo "Tous les champs de mot de passe ne sont pas rempli";
				}
			}
		}
		else{
			echo "Pseudo manquant pour creer le compte";
		}
		/*Avant
		if (!empty($_POST['Password']) || !empty($_POST['VerifPassword'])){
			if ($_POST['Password'] == $_POST['VerifPassword']){
				AddClient();
			}
			else{
				echo "Erreur de resaisie du mot de passe";
			}
		}*/
		require('View/frontend/ConnexionView.php');
	}