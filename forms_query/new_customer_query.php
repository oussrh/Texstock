<?php
require_once('../cnx.php');


$nom = $_POST['clientNom'];
$adress = $_POST['clientadresse'];

$date = new DateTime();
$nowdate = $date->format('Y-m-d H:i:s');
$date_ref = $date->format('ynjgi');

//inserer le nouveau client dans la table client
$add_customer = $bdd->prepare('INSERT INTO clients (nom, adress, date_ajout) VALUES(:nom, :adress, :date_ajout)');
$add_customer->execute(array(
      'nom' => $nom,
      'adress' => $adress,
      'date_ajout'=> $nowdate
      ));

      //Recuperer le dernier client ajouter
      $req = $bdd->query('SELECT id_client FROM clients ORDER BY id_client DESC LIMIT 1');

      while ($data = $req->fetch()) {

        $ref_cl = "CL".$date_ref.$data['id_client'];//cree la ref du client

        //MAJ du client avec la Ref_client
        $req=$bdd->prepare('UPDATE clients SET ref_client = :ref_cl WHERE id_client=:idcl');
        $req->execute(array(
        'ref_cl' => $ref_cl,
        'idcl' =>$data['id_client']
        ));
      }

 ?>
