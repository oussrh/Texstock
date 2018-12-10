<?php
require_once('../cnx.php');

//loadé la liste des commande sur la page index.php

$req = $bdd->query('SELECT * FROM commandes c,clients m WHERE m.id_client = c.id_client AND c.statut_cmd= "EC"');

while ($data=$req->fetch()) {

  echo "<tr><td>".$data['ref_cmd']."</td>";
  echo "<td>".$data['nom']."</td>";
  echo "<td>".$data['date_creation']."</td>";
  echo "<td>".$data['comnt']."</td>";
  echo "<td id='go_scan'>
        <a class='bt_edit_cmd' href='order.php?cmd=".$data['id_commande']."'><span class='glyphicon glyphicon-barcode'></span>&nbsp&nbsp</a>
        <span class='bt_edit_cmd' onclick='delet_cmd(".$data['id_commande'].");'><span class='glyphicon glyphicon-trash'></span>&nbsp&nbsp</span>
        </td></tr>";
}

$req->closeCursor();

?>
