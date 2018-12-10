
<?php
require_once('cnx.php');


$req = $bdd->query('SELECT * FROM clients order by nom desc');

while ($data = $req->fetch()) {

  echo "<option id='".$data['id_client']."' value='".$data['id_client']."'>".$data['nom']."</option>";

}
$req->closeCursor();
 ?>
