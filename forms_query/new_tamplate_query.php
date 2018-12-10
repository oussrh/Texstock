<?php

require_once('../cnx.php');

$date = new DateTime();
$nowdate = $date->format('Y-m-d');

$id_packlist = $_POST['id_packlist'];
$nom_t = $_POST['tamplate_nom'];


$template_N = $bdd->prepare('INSERT INTO template (nom, date_creation) VALUES(:nom, :date_creation)');
$template_N->execute(array(
      'nom' => $nom_t,
      'date_creation' => $nowdate
      ));


$template_ID = $bdd->query('SELECT id_template FROM template ORDER By id_template DESC LIMIT 1 ');
while ($datat = $template_ID->fetch()) {$id_temp = $datat['id_template'];}




$packlist = $bdd->prepare('SELECT id_produit FROM packlist_prod WHERE id_packlist = :id_packlist');
$exe = $packlist->execute(array(
            'id_packlist'=>$id_packlist
                  ));

while ($data = $packlist->fetch()) {

  $template = $bdd->prepare('INSERT INTO template_prod (id_produit, id_template) VALUES(:id_produit, :id_packlist)');
  $template->execute(array(
        'id_produit' => $data['id_produit'],
        'id_packlist' =>$id_temp
        ));



}


header("location:../packlist.php?id=".$id_packlist);

 ?>
