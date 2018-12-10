<?php
require_once('../cnx.php');

$id_cmd = $_POST['cmd'];

$table = $bdd->prepare('SELECT * FROM inventaire i,produits p WHERE i.id_commande = :cmd AND p.id_produit = i.id_produit');
$exe = $table->execute(array(
            'cmd'=>$id_cmd
            ));
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
