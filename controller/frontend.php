<?php
	require('Model/RequestBookChapter.php');
	require('Model/RequestSelectComment.php');
	
	function ListChapter(){
		$Chapter = getBillets();

		require('View/frontend/IndexView.php');
	}
	
	function post(){
		$post = getPost($_GET['NumberChapter']);
		$comments = getComments($_GET['NumberChapter']);
		
		require('View/frontend/CommentView.php');
	}