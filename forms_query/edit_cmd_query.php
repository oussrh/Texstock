<?php
require_once('../cnx.php');

$id_cmd = $_POST['id_cmd'];
$client = $_POST['clientList'];
$pays = $_POST['pays'];
$date_c = $_POST['date_c'];
$ctr = $_POST['ctr'];
$nbr_balles = $_POST['nbr_balles'];
$statut_cmd = $_POST['status'];
$type_prod = $_POST['type_prod'];
$color_embal = $_POST['color_embal'];



		$req2=$bdd->prepare('UPDATE commandes SET id_client=:id_client,
																							pays=:pays,
																							date_c=:date_c,
																							ctr=:ctr,
																							nbr_balles=:nbr_balles,
																							type_prod=:type_prod,
																							statut_cmd=:statut_cmd,
																							color_embal=:color_embal WHERE id_commande=:id_cmd');
		$req2->execute(array(
		'id_cmd' => $id_cmd,
		'id_client' =>$client,
		'pays' =>$pays,
		'date_c' =>$date_c,
		'ctr' =>$ctr,
		'nbr_balles' =>$nbr_balles,
		'statut_cmd' =>$statut_cmd,
		'type_prod' =>$type_prod,
		'color_embal' =>$color_embal
		));

header('location:../edit_cmd_form.php?id='.$id_cmd);

?>
