<?php

require_once('../cnx.php');

	if($_POST["idM"])
	{
		$del=0;
		$id = $_POST["idM"];

		//recuperer le nombre cpt
		$cpt = $bdd->prepare('SELECT cpt FROM inventaire WHERE id_produit = :id');
		$exe = $cpt->execute(array(
		'id' => $id
    ));

		//stocker le cpt dans la variable $del
		while ($data = $cpt->fetch()) {

				$del = $data["cpt"];
		}


		//si $del ==1 alors il faut supprimer le produit de la commande si non on aura des pruits avec un cpt -1,-2,...
		if ($del == '1') {

			$req = $bdd->prepare('DELETE FROM inventaire WHERE id_produit = :id');
			$req->execute(array(
				'id' => $id
        ));

		}

		else {
    $req2=$bdd->prepare('UPDATE inventaire SET cpt = cpt-1 WHERE id_produit = :id');
    $req2->execute(array(
    'id' => $id
    ));
		}

	}


?>
