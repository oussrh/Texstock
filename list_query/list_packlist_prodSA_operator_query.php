<?php



$id_packlist = $_GET['id'];


$packlist = $bdd->prepare('SELECT * FROM produits p, packlists pk, qualite q, pays py WHERE p.id_packlist = pk.id_packlist AND p.id_packlist = :id_packlist AND q.qualite = p.qualite AND py.id = pk.pays_id AND p.qualite = "Shoes A"  ORDER BY p.qualite,p.nom_prod ASC');
$exe = $packlist->execute(array(
            'id_packlist'=>$id_packlist
            ));



while ($data = $packlist->fetch())
{

      echo "<tr style='background-color:".$data['color'].";'><td style='font-size:6mm;'>".$data['nom_prod']."</td>";
      echo "<td style='font-size:6mm;'>".$data['qualite']."</td>";
      echo "<td style='font-size:6mm;'>".$data['poids']." Kg</td>";
      echo "<td><div style='text-align:center;font-size:6mm; vertical-align:bottom !important;' id='testo' ><span class='printP bt_edit_customer glyphicon glyphicon-print' data-nomprod='".$data["nom_prod"]."' data-codebr='".$data["code_br"]."' data-poids='".$data["poids"]."' data-descript='".$data["descript"]."' data-qualite='".$data["qualite"]."' data-pays='".$data["pays"]."' data-type='".$data["type"]."' data-arabic='".$data["arabic_nom"]."'></span></div></td>";
      //echo "<td></td></tr>";

}

$packlist->closeCursor();

 ?>
