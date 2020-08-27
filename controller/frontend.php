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
		$affectedLines = postComment($_GET['NumberChapter'],$_SESSION['id'],$_POST['Message']);
		
		 if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&NumberChapter=' . $_GET['NumberChapter']);
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
		CheckConnexion();
		require('View/frontend/ConnexionView.php');
	}
	function Deconnexion(){
		SessionDestroy();
		require('View/frontend/ConnexionView.php');
	}
	function NewClient(){
		CheckPassword();
		require('View/frontend/ConnexionView.php');
	}