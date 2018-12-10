<?php
require_once('cnx.php');


$req = $bdd->query('SELECT * FROM packlists order by nom_packlist desc');

while ($data = $req->fetch()) {

  $reqP = $bdd->query('SELECT * FROM pays WHERE id = '.$data['pays_id']);
  while ($dataP = $reqP->fetch()) {$pays = $dataP['pays']; }

  $reqC = $bdd->query('SELECT * FROM clients WHERE id_client = '.$data['client_id']);
  while ($dataC = $reqC->fetch()) {$client = $dataC['nom'];}

  echo "<option id='".$data['id_packlist']."' value='".$data['id_packlist']."'>".$data['nom_packlist']." | ".$client." | ".$pays."</option>";

}
$req->closeCursor();
 ?>
