<?php
require_once('../cnx.php');


	if($_POST["idT"])
	{
		$id = $_POST["idT"];

		$req2=$bdd->prepare('UPDATE inventaire SET cpt = cpt+1 WHERE id_produit = :id');
		$req2->execute(array(
		'id' => $id
		));

		}


?>
