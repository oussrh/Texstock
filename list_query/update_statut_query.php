<?php
require_once('../cnx.php');

		$idcmd = $_POST['cmd'];
    $statut = $_POST['statut'];


		$req2=$bdd->prepare('UPDATE commandes SET statut_cmd = :statut WHERE id_commande = :id_commande');
		$req2->execute(array(
		'id_commande' => $idcmd,
		'statut' =>$statut
		));


?>
