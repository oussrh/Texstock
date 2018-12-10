<?php

require_once('cnx.php');
$packlist = $_GET['p'];
$commande = $_GET['cmd'];

$cpt_tot=0;

$commandes = $bdd->prepare('SELECT * FROM commandes c, inventaire i, packlists pl, produits p WHERE c.id_commande = :commande AND c.id_packlist = pl.id_packlist  AND pl.id_packlist = :packlist AND i.id_produit = p.id_produit AND pl.id_packlist = p.id_packlist GROUP BY i.date_validation ORDER BY i.date_validation DESC');
$commandes->execute(array(
'packlist' => $packlist,
'commande' => $commande
));

while ($data = $commandes->fetch()) {

  if ($data['chk_valid'] == 1 && $data['confirm_status'] == 0) {

      $cpt = $bdd->prepare('SELECT cpt FROM inventaire WHERE confirm_status = 0 AND chk_valid = 1 AND date_validation = :date_validation');
      $cpt->execute(array(
      'date_validation' => $data['date_validation']
      ));

      while ($datac = $cpt->fetch()) {$cpt_tot += $datac['cpt'];}
      $date_inv = new DateTime($data['date_validation']);
      $date_inv = $date_inv->format('H:i | d.m.Y');
      echo "<tr><td class='tdCenter'><span class='glyphicon glyphicon-exclamation-sign'></span></td>";
      echo "<td class='tdCenter'>".$cpt_tot."</td>";
      echo "<td class='tdCenter'>".$date_inv."</td>";
      echo "<td class='tdCenter'><span class='iconPointer glyphicon glyphicon-eye-open' onclick='window.location.href =\"list_inv_prod.php?p=".$packlist."&d=".strtotime($data['date_validation'])."&cmd=".$commande."\"'></span></td></tr>";
      $cpt_tot=0;
  }

  if ($data['chk_valid'] == 1 && $data['confirm_status'] == 1) {

      $cpt = $bdd->prepare('SELECT cpt FROM inventaire WHERE confirm_status = 1 AND chk_valid = 1 AND date_validation = :date_validation ');
      $cpt->execute(array(
      'date_validation' => $data['date_validation']
      ));

      while ($datac = $cpt->fetch()) {$cpt_tot += $datac['cpt'];}
      $date_inv = new DateTime($data['date_validation']);
      $date_inv = $date_inv->format('H:i | d.m.Y');
      echo "<tr><td></td>";
      echo "<td class='tdCenter'>".$cpt_tot."</td>";
      echo "<td class='tdCenter'>".$date_inv."</td>";
      echo "<td class='tdCenter'><span class='iconPointer glyphicon glyphicon-eye-open' onclick='window.location.href =\"list_inv_prod.php?p=".$packlist."&d=".strtotime($data['date_validation'])."&cmd=".$commande."\"'></span></td></tr>";
      $cpt_tot=0;
  }


}

$commandes->closeCursor();
//<a class='bt_edit_cmd' href='order.php?cmd=".$data['id_commande']."'><span class='glyphicon glyphicon-barcode'></span>&nbsp&nbsp</a>
 ?>
