<?php
session_start();
?>
<DOCTYPE html>
<html>
<head>
	<title>Cible du Prenom</title>
</head>
<body>
	<form method="post" action="cible.php">
		<label>Prenom :</label>
		<input type="text" name="prenom"/>
		<button type="submit">Validé</button>
	</form>
	<?php
	if (isset($_POST['prenom']) || empty($_POST['prenom'])){
		$_SESSION['prenom'] = $_POST['prenom'];
		echo "Bonjour " . $_SESSION['prenom'] . ' ' . $_POST['prenom'];
	}
	else{
		echo "Visiteur non identifier";
	}
		
	?>
	<a href="index.php"><button>Accueil</button></a>
</body>
</html>