<?php
require_once('../cnx.php');



		$date_conf = $_POST["inventaire"];
    $date_validation = date('Y-m-d H:i:s', $date_conf);
		$now = Date('Y-m-d H:i:s');

		$req2=$bdd->prepare('UPDATE inventaire SET confirm_status = 1, confirm_date = :now WHERE date_validation = :date_val');
		$req2->execute(array(
		'date_val' => $date_validation,
		'now' => $now
		));



?>
