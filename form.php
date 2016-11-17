<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=fullstack;charset=utf8', 'Fanta-Elie', '51295Elie');
}
catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
/*$titre = $_POST['titre'];
$entrer = $_POST['debut'];
$sortie = $_POST['fin'];
$email = $_POST['mail_createur'];*/
$db = $bdd->prepare('INSERT INTO evenement (titre, debut, fin, mail_createur) VALUES (:titre, :debut, :fin, :mail_createur)');
$db->bindParam('titre',$titre,PDO::PARAM_STR);
$db->bindParam('debut',$entrer,PDO::PARAM_STR);
$db->bindParam('fin',$sortie,PDO::PARAM_STR);
$db->bindParam('mail_createur',$email,PDO::PARAM_STR);
$db->execute();
$ex = file_get_contents("exo.json");
$parse = json_decode($ex)->{'items'};
for($i=0;$i < sizeof($parse); $i++){
	if(isset($parse[$i]->{'summary'} ) AND $parse[$i]->{'summary'} != null AND isset($parse[$i]->{'creator'}->{"email"} ) AND $parse[$i]->{'creator'}->{"email"} != null AND isset($parse[$i]->{'start'}->{"dateTime"} ) AND $parse[$i]->{'start'}->{"dateTime"} != null AND isset($parse[$i]->{'end'}->{"dateTime"} ) AND $parse[$i]->{'end'}->{"dateTime"} != null){
		$title = $parse[$i]->{'summary'};
		$creator = $parse[$i]->{'creator'}->{'email'};
		$debut = $parse[$i]->{'start'}->{'dateTime'};
		$fin = $parse[$i]->{'end'}->{'dateTime'};
		echo $title." ".$creator." ".$debut." ".$fin."<hr />";	
	}
}
?>