<?php

require_once('../cnx.php');

$date = new DateTime();
$nowdate = $date->format('Y-m-d H:i:s');

$req = $bdd->query('select * FROM inventaire');

while($data = $req->fetch()){

    if ($data['chk_valid']== 0) {

      $confirme = $bdd->prepare('UPDATE inventaire SET chk_valid = 1 , date_validation= :date_chek WHERE id_produit = :id_produit AND date_validation=0');
      $confirme->execute(array(
            'id_produit' => $data['id_produit'],
            'date_chek' => $nowdate
            ));

    }


}

 ?>
