<?php
require_once('../cnx.php');

//Supprimé une commande depuis la page index.php (tableau liste commande)

$id_cmd = $_POST['cmd'];



$table = $bdd->prepare('DELETE FROM packlists WHERE id_commande = :cmd');
$exe = $table->execute(array(
            'cmd'=>$id_cmd
          ));



$table2 = $bdd->prepare('DELETE FROM commandes WHERE id_commande = :cmd');
$exe2 = $table2->execute(array(
            'cmd'=>$id_cmd
          ));

?>
