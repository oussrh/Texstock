<?php
require_once('cnx.php');


$commandes = $bdd->query('SELECT * FROM commandes c,clients cl, pays p, packlists pl WHERE pl.client_id = cl.id_client AND p.id = pl.pays_id AND pl.id_packlist = c.id_packlist ORDER BY c.date_creation desc');

while ($data = $commandes->fetch()) {

  $statut = $bdd->prepare('SELECT COUNT(i.confirm_status) AS CNT_conf FROM commandes c, inventaire i, packlists pl, produits p WHERE c.id_commande = :commande AND p.id_packlist = :packlist AND  i.id_produit = p.id_produit AND i.confirm_status = 0 AND i.chk_valid = 1');
  $statut->execute(array(
  'packlist' => $data['id_packlist'],
  'commande' => $data['id_commande']
  ));
  while($dataST = $statut->fetch()){

  if($dataST['CNT_conf'] != 0){
  echo "<tr><td style='color:red;' class='tdCenter'><span class='glyphicon glyphicon-exclamation-sign'></td>";}

  else{
  echo "<tr><td></td>";}

  echo "<td>".$data['ref_cmd']."</td>";
  echo "<td>".$data['ctr']."</td>";
  echo "<td>".$data['nom']."</td>";
  echo "<td>".$data['pays']."</td>";
  echo "<td>".$data['date_creation']."</td>";
  echo "<td id='go_scan'>
        <a class='bt_edit_cmd' href='suivi_cmd.php?cmd=".$data['id_commande']."&p=".$data['id_packlist']."'><span class='glyphicon glyphicon-barcode'></span>&nbsp&nbsp</a>
        <a class='bt_edit_cmd' href='edit_cmd_form.php?id=".$data['id_commande']."'><span class='glyphicon glyphicon-edit'></span>&nbsp&nbsp</a>
        <span class='bt_edit_cmd' onclick='delet_cmd(".$data['id_commande'].");'><span class='glyphicon glyphicon-trash'></span>&nbsp&nbsp</span>
        </td></tr>";
}
}
$commandes->closeCursor();
//<a class='bt_edit_cmd' href='order.php?cmd=".$data['id_commande']."'><span class='glyphicon glyphicon-barcode'></span>&nbsp&nbsp</a>
 ?>
