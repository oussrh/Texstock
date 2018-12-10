<?php
require_once('../cnx.php');

$id_cmd = $_POST['cmd'];
$client ='';
$cmd ='';

//Recuperé le nom du client et le numero de la commande

$table = $bdd->prepare('SELECT * FROM commandes c,clients l WHERE c.id_commande = :cmd AND c.id_client= l.id_client');
$exe = $table->execute(array(
            'cmd'=>$id_cmd

          ));


while ($donnees = $table->fetch())
{
    $client = $donnees['nom'];
    $cmd = $donnees['ref_cmd'];
}
//Afichage sur la page order.php (left_info)
echo "<b>Client :</b> ".$client;
echo "</br></br>";
echo "<b>Commande :</b> ".$cmd;

$table->closeCursor();



 ?>
