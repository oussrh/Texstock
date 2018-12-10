<?php

require_once('../cnx.php');


	if($_POST["idM"])
	{
		$del=0;
		$id = $_POST["idM"];

		$date = new DateTime();
		$nowdate = $date->format('Y-m-d H:i:s');

		//recuperer le nombre cpt
		$cpt = $bdd->prepare('SELECT cpt FROM inventaire WHERE id_produit = :code AND date_validation = 0');
		$exe = $cpt->execute(array(
		'code' => $id
    ));

		//stocker le cpt dans la variable $del
		while ($data = $cpt->fetch()) {

				$del = $data["cpt"];
		}


		//si $del ==1 alors il faut supprimer le produit de la commande si non on aura des pruits avec un cpt -1,-2,...
		if ($del == '1') {

			$req = $bdd->prepare('DELETE FROM inventaire WHERE id_produit = :code AND date_validation = 0');
			$req->execute(array(
				'code' => $id
        ));

		}

		else {
    $req2=$bdd->prepare('UPDATE inventaire SET cpt = cpt-1, modif_date=:now WHERE id_produit = :code AND date_validation = 0');
    $req2->execute(array(
    'code' => $id,
    'now' =>$nowdate
    ));
		}

	}


?>
