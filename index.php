<!DOCTYPE html>
<html lang="fr"> 
<head>
	<meta charset="utf-8"> 
	<title></title>
</head>
<body>
	<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=fullstack;charset=utf8', 'Fanta-Elie', '51295Elie');
	} 
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	?>
	<p>Liste des<a href="form.php"> évenement</a> classé par nom, créateur, date de début et de fin.</p>
	<form action="form.php" method="POST">

		<input id="titre" name ="titre"  type="text" class="validate">
		<input id="debut" name ="debut"  type="text" class="validate">
		<input id="fin" name ="fin"  type="text" class="validate">
		<input id="createur" name ="mail_createur"  type="text" class="validate">
		<button>Enregistrer</button>

	</form>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>