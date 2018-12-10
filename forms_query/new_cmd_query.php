<?php
require_once('../cnx.php');
$prefix_cmd = "BT";
$id_packlist = $_POST['packlist'];

$date = new DateTime();
$nowdate = $date->format('Y-m-d H:i:s');

$stat = 'EC'; //status de la commande EC: En cours | A: Annuler | T: Terminer

$nbr_balles = $_POST['nbr_balles'];
$type_prod = $_POST['type_prod'];
$color_embal = $_POST['color_embal'];
$ctr = $_POST['ctr'];

$date_ref = $date->format('ynjgi');//pour la ref commande


  $add_cmd = $bdd->prepare('INSERT INTO commandes (id_packlist,statut_cmd, date_creation, nbr_balles, type_prod, color_embal, ctr) VALUES(:id_packlist,:stat, :date_creation, :nbr_balles, :type_prod, :color_embal, :ctr)');
  $add_cmd->execute(array(
        'id_packlist' => $id_packlist,
        'stat' => $stat,
        'nbr_balles' => $nbr_balles,
        'type_prod' => $type_prod,
        'color_embal' => $color_embal,
        'ctr' => $ctr,
        'date_creation'=> $nowdate
        ));

  //recuperer id commande du derinier ajout pour r'ajouter ref cmd (ref_id: BT+Ladate+idcmd)
  $ref = $bdd->query('SELECT id_commande FROM commandes ORDER BY id_commande DESC LIMIT 1');

  while ($data = $ref->fetch()) {

  $ref_cmd = $prefix_cmd.$date_ref.'C'.$data['id_commande'];//cree la ref de la cmd

  //mettre à jour le commande en ajoutant la ref commande
  $req2=$bdd->prepare('UPDATE commandes SET ref_cmd = :ref_cmd WHERE id_commande=:idcmd');
  $req2->execute(array(
  'ref_cmd' => $ref_cmd,
  'idcmd' =>$data['id_commande']
  ));

  }

  //revenir sur index.php
  header('Location: ../list_commandes.php');






?>
