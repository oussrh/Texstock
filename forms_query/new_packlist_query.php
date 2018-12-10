<?php
require_once('../cnx.php');


$packlist_nom = $_POST['packlist_nom'];
$packlist_pays = $_POST['packlist_pays'];
$packlist_client = $_POST['packlist_client'];

$date = new DateTime();
$nowdate = $date->format('Y-m-d');

//
$add_packlist = $bdd->prepare('INSERT INTO packlists (nom_packlist, pays_id, client_id, date_creation) VALUES(:nom, :pays, :client, :date_creation)');
$add_packlist->execute(array(
      'nom' => $packlist_nom,
      'pays' => $packlist_pays,
      'client' => $packlist_client,
      'date_creation' => $nowdate
      ));


      $req = $bdd->query('SELECT id_packlist FROM packlists ORDER BY id_packlist DESC LIMIT 1');

      while ($data = $req->fetch()) {

        $id_packlist =  $data['id_packlist'];

      }

header('location:../packlist.php?id='.$id_packlist);

?>
