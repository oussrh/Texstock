<?php

$product = $bdd->query('SELECT * FROM produits p, packlists pk, qualite q, pays py WHERE p.id_packlist = pk.id_packlist AND q.qualite = p.qualite AND py.id = pk.pays_id ORDER BY p.qualite,p.nom_prod ASC');

if($_SESSION['userPrev'][0]=='admin'){
while ($data = $product->fetch())
{
    echo '<tr><td contenteditable="true" onBlur="saveToDatabase(this,\'code_br\',\''.$data["id_produit"].'\');" onClick="showEdit(this);">'.$data["code_br"].'</td>';
    echo '<td contenteditable="true" onBlur="saveToDatabase(this,\'descript\',\''.$data["id_produit"].'\');" onClick="showEdit(this);">'.$data["nom_prod"].'</td>';
    echo '<td style="text-align:center;" contenteditable="true">'.$data["qualite"].'</td>';
    echo '<td style="text-align:center;" contenteditable="true" onBlur="saveToDatabase(this,\'poids\',\''.$data["id_produit"].'\');" onClick="showEdit(this);">'.$data["poids"].'</td>';
    echo "<td>
            <div style='text-align:center;'>
              <span onclick='delet_product(".$data['id_produit'].");' class='bt_edit_customer glyphicon glyphicon-trash'></span>
              <span class='printP bt_edit_customer glyphicon glyphicon-print'data-nomprod='".$data["nom_prod"]."' data-codebr='".$data["code_br"]."' data-poids='".$data["poids"]."' data-descript='".$data["descript"]."' data-qualite='".$data["qualite"]."' data-pays='".$data["pays"]."'></span>
              <span onclick='window.location.href = \"edit_product_form.php?id=".$data['id_produit']."\";' class='bt_edit_customer glyphicon glyphicon-edit' alt='Edité' title='Edité'></span>
            </div>
          </td></tr>";



}
$product->closeCursor();

}

elseif($_SESSION['userPrev'][0]=='operator' || $_SESSION['userPrev'][0]=='scan'){
  while ($data2 = $product->fetch())
  {
  echo '<tr><td style="font-size:6mm;" contenteditable="true" onBlur="saveToDatabase(this,\'code_br\',\''.$data2["id_produit"].'\');" onClick="showEdit(this);">'.$data2["code_br"].'</td>';
  echo '<td style="font-size:6mm;" contenteditable="true" onBlur="saveToDatabase(this,\'descript\',\''.$data2["id_produit"].'\');" onClick="showEdit(this);">'.$data2["nom_prod"].'</td>';
  echo '<td style="text-align:center;font-size:6mm;" contenteditable="true">'.$data2["qualite"].'</td>';
  echo '<td style="text-align:center;font-size:6mm;" contenteditable="true" onBlur="saveToDatabase(this,\'poids\',\''.$data2["id_produit"].'\');" onClick="showEdit(this);">'.$data2["poids"].'</td>';
  echo "<td valign='center'>
          <div style='text-align:center;'>
            <span style='font-size:6mm;' class='printP bt_edit_customer glyphicon glyphicon-print'data-nomprod='".$data2["nom_prod"]."' data-codebr='".$data2["code_br"]."' data-poids='".$data2["poids"]."' data-descript='".$data2["descript"]."' data-qualite='".$data2["qualite"]."' data-pays='".$data2["pays"]."'></span>
          </div
        </td></tr>";


  }
  $product->closeCursor();
  }
 ?>
