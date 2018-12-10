<?php
require_once('../cnx.php');

$columnCl = $_POST['columnCl'];
$editvalCl = $_POST['editvalCl'];
$idCl = $_POST['idCl'];


$majCl=$bdd->prepare('UPDATE clients SET '.$columnCl.' = :editvalCl WHERE id_client = :idCl');
$majCl->execute(array(
      'idCl' => $idCl,
      'editvalCl' =>$editvalCl

      ));


 ?>
