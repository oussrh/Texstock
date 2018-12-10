<?php
require_once('cnx.php');


$req = $bdd->query('SELECT * FROM qualite');

while ($data = $req->fetch()) {

  echo "<option value='".$data['qualite']."'>".$data['qualite']."</option>";

}
$req->closeCursor();
 ?>
