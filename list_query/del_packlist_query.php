<?php

require_once('../cnx.php');


$id_packlist = $_POST['id_packlist'];

$packlist = $bdd->prepare('DELETE FROM packlists WHERE id_packlist = :id_packlist');
$exe = $packlist->execute(array(
            'id_packlist'=>$id_packlist
          ));

?>
