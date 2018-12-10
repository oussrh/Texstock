<?php
// require_once('../cnx.php');
//
// $id_packlist = $_GET['id'];

$packlist = $bdd->prepare('SELECT * FROM produits p, packlists pk, qualite q, pays py WHERE p.id_packlist = pk.id_packlist AND p.id_packlist = :id_packlist AND q.qualite = p.qualite AND py.id = pk.pays_id ORDER BY p.qualite,p.nom_prod ASC');
$exe = $packlist->execute(array(
            'id_packlist'=>$id_packlist
            ));

while ($data = $packlist->fetch())
{
      echo "<tr style='background-color:".$data['color'].";'><td>".$data['code_br']."</td>";
      echo "<td>".$data['nom_prod']."</td>";
      echo "<td>".$data['qualite']."</td>";
      echo "<td>".$data['poids']." Kg</td>";
      echo "<td>".$data['estimation']."</td>";
      echo "<td style='text-align:center !important;'><span style='float:left;' class='glyphicon glyphicon-minus-sign compteModif' onclick='moinsPP(".$data['id'].");'></span>
            <strong style='text-align:center !important;'>".$data['quantite_prod_packlist']."</strong>
            <span style='float:right;' class='glyphicon glyphicon-plus-sign compteModif'onclick='plusPP(".$data['id'].");'></span></td>";
      echo "<td><div style='text-align:center;'><span class='printP bt_edit_customer glyphicon glyphicon-print' data-nomprod='".$data["nom_prod"]."' data-codebr='".$data["code_br"]."' data-poids='".$data["poids"]."' data-descript='".$data["descript"]."' data-qualite='".$data["qualite"]."' data-pays='".$data["pays"]."' data-type='".$data["type"]."' data-arabic='".$data["arabic_nom"]."'></span></div></td>";
      echo "<td><div style='text-align:center;'><span onclick='window.location.href = \"edit_product_form.php?id=".$data['id_produit']."\";' class='bt_edit_customer glyphicon glyphicon-edit' alt='Edité' title='Edité'></span></div></td>";
      echo "<td><div style='text-align:center;'><span onclick=\"delet_product(".$data['id_produit'].");\" class='bt_edit_customer glyphicon glyphicon-trash'></span></div></td></tr>";
      //echo "<td></td></tr>";

}

$packlist->closeCursor();

 ?>
