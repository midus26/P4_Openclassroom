<?php
	require('Model/RequestBookChapter.php');
	require('Model/RequestSelectComment.php');
	require('Model/RequestAddClient.php');
	
	function ListChapter(){
		$Chapter = getBillets();

		require('View/frontend/IndexView.php');
	}
	
	function post(){
		$Chapter = getBillet($_GET['NumberChapter']);
		$SelectChapterComment = getComments($_GET['NumberChapter']);
		
		require('View/frontend/CommentView.php');
	}
	function Biographie(){
		require('View/frontend/BiographieView.php');
	}
	function Connexion(){
		require('View/frontend/ConnexionView.php');
	}
	function NewClient(){
		CheckPassword();
		require('View/frontend/ConnexionView.php');
	}