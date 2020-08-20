<?php
require('controller/frontend.php');

	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'ListChapter'){
			ListChapter();
		}
		elseif ($_GET['action'] == 'post'){
			if (isset($_GET['NumberChapter']) && $_GET['NumberChapter'] > 0){
				post();
			}
			else{
				echo "Erreur : aucun chapitre sélectionné";
			}
		}
	}
	else{
		ListChapter();
	}