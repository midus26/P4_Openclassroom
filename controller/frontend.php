<?php
	//require('Model/RequestSelectComment.php');
	
	require_once('Model/PostManager.php');
	require_once('Model/CommentManager.php');
	require_once('Model/ClientManager.php');
	
	function ListChapter(){
		$postManager = new PostManager();
		$Chapter = $postManager->getBillets();

		require('View/frontend/IndexView.php');
	}
	function post(){
		$postManager = new PostManager();
		$commentManager = new CommentManager();
		$Chapter = $postManager->getBillet($_GET['NumberChapter']);
		$SelectChapterComment = $commentManager->getComments($_GET['NumberChapter']);
		
		require('View/frontend/CommentView.php');
	}
	function AddComment(){
		$commentManager = new CommentManager();
		if (!empty($_GET['NumberChapter']) && !empty($_SESSION['id']) && !empty($_POST['Message'])){
		$affectedLines = $commentManager->postComment($_GET['NumberChapter'],$_SESSION['id'],$_POST['Message']);
		
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
		$clientManager = new ClientManager();
		$clientManager->CheckConnexion();
		require('View/frontend/ConnexionView.php');
	}
	function Deconnexion(){
		$clientManager = new ClientManager();
		$clientManager->SessionDestroy();
		require('View/frontend/ConnexionView.php');
	}
	function NewClient(){
		$clientManager = new ClientManager();
		if (!empty($_POST['Pseudo'])){
			if ($clientManager->VerifPseudo($_POST['Pseudo'])){
				echo "Pseudo déjà utilisé";
			}
			else{
				
				if (!empty($_POST['Password']) && !empty($_POST['VerifPassword'])){
					if ($_POST['Password'] == $_POST['VerifPassword']){
						$clientManager->AddClient();
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
		$commentManager = new CommentManager();
		$Comments = $commentManager->getComment($_GET['Comment']);
		require('View/frontend/ModifierunCommentaire.php');
	}
	function UpdateComment()
	{
		$commentManager = new CommentManager();
		$commentManager->UpdateCommentSelect();
		$postManager = new PostManager();
		$Chapter = $postManager->getBillets();
		require('View/frontend/IndexView.php');
	}
	function AlertComment()
	{
		$commentManager = new CommentManager();
		$commentManager->SignalComment();
		$postManager = new PostManager();
		$Chapter = $postManager->getBillets();
		require('View/frontend/IndexView.php');
	}
	function Admin()
	{
		$commentManager = new CommentManager();
		$postManager = new PostManager();
		$AlertMsg = $commentManager->ReturnAlertMsg();
		$Chapter = $postManager->getBillets();
		require('View/frontend/AdminView.php');
	}