<?php
	require('Model/RequestBookChapter.php');
	require('Model/RequestSelectComment.php');
	require('Model/RequestClient.php');
	
	function ListChapter(){
		$Chapter = getBillets();

		require('View/frontend/IndexView.php');
	}
	function post(){
		$Chapter = getBillet($_GET['NumberChapter']);
		$SelectChapterComment = getComments($_GET['NumberChapter']);
		
		require('View/frontend/CommentView.php');
	}
	function AddComment(){
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
		require('View/frontend/BiographieView.php');
	}
	function Connexion(){
		require('View/frontend/ConnexionView.php');
	}
	function ConnexionPost(){
		CheckConnexion();
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
						AddClient();
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
		require('View/frontend/ConnexionView.php');
	}
	function ModifierComment()
	{
		$Comments = getComment($_GET['Comment']);
		require('View/frontend/ModifierunCommentaire.php');
	}
	function UpdateComment()
	{
		UpdateCommentSelect();
		$Chapter = getBillets();
		require('View/frontend/IndexView.php');
	}
	function AlertComment()
	{
		SignalComment();
		$Chapter = getBillets();
		require('View/frontend/IndexView.php');
	}