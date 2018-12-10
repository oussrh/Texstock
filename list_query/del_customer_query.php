<?php

require_once('../cnx.php');


$id_client = $_POST['client'];

$client = $bdd->prepare('DELETE FROM clients WHERE id_client = :client');
$exe = $client->execute(array(
            'client'=>$id_client
          ));
          
?>
