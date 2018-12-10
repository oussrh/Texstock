
<?php

require_once('../cnx.php');

if ($_POST['code']) {

		$code = $_POST['code'];

		$date = new DateTime();
		$nowdate = $date->format('Y-m-d H:i:s');

		//Get id produit apartire le code barre
		$req = $bdd->prepare('SELECT id_produit FROM produits WHERE code_br = :code_br ');
		$exe = $req->execute(array(
								'code_br'=>$code
								));

		while ($idp = $req->fetch()) {

			$id_p = $idp[0];
		}

		//recherche dans la table inventaire si le Id existe ou pas
		$req2 = $bdd->prepare('SELECT id_produit FROM inventaire WHERE id_produit = :id_p AND date_validation = 0');
		$exe2 = $req2->execute(array(
						'id_p'=>$id_p
						));


		//Si le count est plus grand que 0 alors le produit exsite
		if ($req2->rowCount() > 0) {

					//mettre a jour le compteur de 1
					$maj=$bdd->prepare('UPDATE inventaire SET cpt = cpt+1, modif_date=:now, test = :test WHERE id_produit = :id');
					$maj->execute(array(
						    'id' => $id_p,
								'now' =>$nowdate,
								'test' =>'toto'
								));

		}


		else {

			$cpt=1;
			//ajoute le produit dans la table inventaire
			$add = $bdd->prepare('INSERT INTO inventaire (cpt, modif_date, id_produit) VALUES(:cpt, :modif_date, :id_produit)');
			$add->execute(array(
						'cpt' => $cpt,
						'modif_date' => $nowdate,
						'id_produit' => $id_p
						));
			}

}

else {echo "Code Inexsistant";}




?>
