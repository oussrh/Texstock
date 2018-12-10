<?php
require_once('../cnx.php');

$nomS = $_POST['NomS'];
$FormJR = $_POST['FormJR'];
$NumTVA = $_POST['NumTVA'];
$Adress = $_POST['Adress'];
$codeP = $_POST['codeP'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$tel = $_POST['tel'];
$Email = $_POST['email'];

		$req2=$bdd->prepare('UPDATE account SET nom_s = :nom_s, forme_jr = :FormJR, tva_c = :NumTVA, adress_c = :Adress, code_p = :codeP, ville = :ville, pays = :pays, tel_c = :tel, email_c = :Email WHERE id = 1');
		$req2->execute(array(
		'nom_s' => $nomS,
		'FormJR' =>$FormJR,
    'NumTVA' =>$NumTVA,
    'Adress' =>$Adress,
    'codeP' =>$codeP,
    'ville' =>$ville,
    'pays' =>$pays,
    'tel' =>$tel,
    'Email' =>$Email
		));

header('location:../moncompte.php');
?>
