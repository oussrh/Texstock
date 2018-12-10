<?php
require_once('../cnx.php');

$qualite = $_POST['qualite'];
$color = $_POST['color'];



		$req2=$bdd->prepare('UPDATE qualite SET qualite=:qualite, color=:color WHERE qualite=:qualite');
		$req2->execute(array(
		'qualite' => $qualite,
		'color' =>$color
		));

header('location:../moncompte.php#menu2');

?>
