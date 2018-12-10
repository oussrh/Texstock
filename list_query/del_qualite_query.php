<?php

require_once('../cnx.php');


$id_qualite = $_POST['qualite'];

$qualite = $bdd->prepare('DELETE FROM qualite WHERE id_qualite = :qualite');
$exe = $qualite->execute(array(
            'qualite'=>$id_qualite
          ));

?>
