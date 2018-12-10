<?php

require_once('../cnx.php');

$packlist = $_POST['p'];
$date_validation = date('Y-m-d H:i:s', $_POST['d']);

$inv_prod = $bdd->prepare('SELECT * FROM inventaire i, produits p WHERE p.id_packlist = :packlist AND i.id_produit = p.id_produit AND i.date_validation = :date_validation ORDER BY p.qualite,p.nom_prod ASC');
$inv_prod->execute(array(
'packlist' => $packlist,
'date_validation' => $date_validation
));

while ($data = $inv_prod->fetch()) {

    echo "<tr><td>".$data['code_br']."</td>";
    echo "<td>".$data['nom_prod']."</td>";
    echo "<td>".$data['qualite']."</td>";
    echo "<td>".$data['poids']."</td>";
    echo "<td>".$data['poids']*$data['cpt']."</td>";
    echo "<td class='tdCenter'><span class='iconPointer glyphicon glyphicon-minus-sign compteModif' onclick='moinsUnP(".$data['id_produit'].");'></span></td>";
    echo "<td class='tdCenter'><b>".$data['cpt']."</b></td>";
    echo "<td class='tdCenter'><span class='iconPointer glyphicon glyphicon-plus-sign compteModif'onclick='plusUnP(".$data['id_produit'].");'></span></td></tr>";
}

$inv_prod->closeCursor();
?>
