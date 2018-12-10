<?php
require_once('cnx.php');


$req = $bdd->query('SELECT * FROM produits WHERE chk_packlist = 0');

while ($data = $req->fetch()) {

  echo"<optgroup label='Qualité A'>";
  if($data['qualite'] == 'A'){echo "<option id='".$data['id_produit']."' value='".$data['id_produit']."'>".$data['nom_prod']."</option>";}
  echo"<optgroup label='Qulité B'>";
  if($data['qualite'] == 'B'){echo "<option id='".$data['id_produit']."' value='".$data['id_produit']."'>".$data['nom_prod']."</option>";}
  echo"<optgroup label='Qulité C'>";
  if($data['qualite'] == 'C'){echo "<option id='".$data['id_produit']."' value='".$data['id_produit']."'>".$data['nom_prod']."</option>";}
}
$req->closeCursor();
 ?>
