<?php
require_once('../cnx.php');

$id_prod = $_POST['id_prod'];
$code_br = $_POST['code_br'];
$nom_prod = $_POST['nom_p'];
$qualite = $_POST['qualite'];
$poids = $_POST['poids'];
$estimation = $_POST['estimation'];
$arabic_nom = $_POST['arabic_nom'];
$type = $_POST['type_p'];


		$req2=$bdd->prepare('UPDATE produits SET code_br=:code_br,
																							nom_prod=:nom_prod,
																							qualite=:qualite,
																							poids=:poids,
																							estimation=:estimation,
																							arabic_nom=:arabic_nom,
																							type=:type WHERE id_produit=:id_prod');
		$req2->execute(array(
		'id_prod' => $id_prod,
		'code_br' =>$code_br,
		'nom_prod' =>$nom_prod,
		'qualite' =>$qualite,
		'poids' =>$poids,
		'estimation' =>$estimation,
		'arabic_nom' =>$arabic_nom,
		'type' =>$type,
		));

header('location:../edit_product_form.php?id='.$id_prod);

?>
