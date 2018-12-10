<?php
require_once('../cnx.php');


	if($_POST["idT"])
	{
		$id = $_POST["idT"];

		$date = new DateTime();
		$nowdate = $date->format('Y-m-d H:i:s');

		$req2=$bdd->prepare('UPDATE inventaire SET cpt = cpt+1, modif_date=:now WHERE id_produit = :code');
		$req2->execute(array(
		'code' => $id,
		'now' =>$nowdate
		));

		}


?>
