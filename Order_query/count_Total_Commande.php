<?php
require_once('../cnx.php');


$table = $bdd->query('SELECT * FROM inventaire i, produits p WHERE p.id_produit = i.id_produit AND i.chk_valid = 0');

$cpt=0;
$poids=0;
// $array = $table->fetchAll(PDO::FETCH_ASSOC);
//
// echo json_encode($array);
while ($donnees = $table->fetch())
{
    $cpt = $cpt + $donnees['cpt'];
    $poids = $poids + $donnees['poids']* $donnees['cpt'];
}

echo "<b>Poids Total :</b> ".$poids." Kg";
echo "</br></br>";
echo "<b>Total unité :</b> ".$cpt." Unités";

$table->closeCursor();

 ?>
