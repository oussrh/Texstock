<?php
require_once('cnx.php');


$req = $bdd->query('SELECT * FROM pays');

while ($data = $req->fetch()) {

  echo "<option value='".$data['id']."'>".$data['pays']."</option>";

}
$req->closeCursor();
 ?>
