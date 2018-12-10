<?php
require_once('../cnx.php');

$column = $_POST['column'];
$editval = $_POST['editval'];
$id = $_POST['id'];


$maj=$bdd->prepare('UPDATE produits SET '.$column.' = :editval WHERE id_produit = :id');
$maj->execute(array(
      'id' => $id,
      'editval' =>$editval

      ));


 ?>
