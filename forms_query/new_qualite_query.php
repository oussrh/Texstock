<?php
require_once('../cnx.php');


$qualite = $_POST['qualite'];
$color = $_POST['color'];


$add_qualite = $bdd->prepare('INSERT INTO qualite (qualite, color) VALUES(:qualite, :color)');
$add_qualite->execute(array(
      'qualite' => $qualite,
      'color' => $color
      ));

?>
