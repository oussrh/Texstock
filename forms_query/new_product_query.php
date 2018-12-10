<?php
require_once('../cnx.php');

$nom_prod = $_POST['nom_prod'];
$qualite = $_POST['qualite'];
$poids = $_POST['poids'];
$estimation = $_POST['estimation'];
$arabic_nom = $_POST['arabic_nom'];
$type = $_POST['type_p'];
$chk_packlist = 1;


$add_product = $bdd->prepare('INSERT INTO produits (qualite, poids, nom_prod, estimation, arabic_nom, type) VALUES(:qualite, :poids, :nom_prod, :estimation, :arabic_nom, :type)');
$add_product->execute(array(
      'qualite' => $qualite,
      'poids'=> $poids,
      'nom_prod' => $nom_prod,
      'estimation' => $estimation,
      'arabic_nom' => $arabic_nom,
      'type' => $type
      ));


      //Recuperer le dernier client ajouter
      $req = $bdd->query('SELECT id_produit FROM produits ORDER BY id_produit DESC LIMIT 1');

      while ($dataPR = $req->fetch()) {

        $id_produit = $dataPR['id_produit'];


      }



      $cb_produit = sprintf("%05d", $id_produit);
      $cb_poids = sprintf("%03d", $poids);
      $cb_type = strtoupper($type[0]);
      $cb_qualite = strtoupper($qualite[0]);

      $code_barre = $cb_qualite.$cb_poids."P".$cb_produit;

      $add_prod_packlist = $bdd->prepare('UPDATE produits SET code_br = :code_br WHERE id_produit = :id_produit');
      $add_prod_packlist->execute(array(
        'code_br' => $code_barre,
        'id_produit' => $id_produit
            ));

 ?>
