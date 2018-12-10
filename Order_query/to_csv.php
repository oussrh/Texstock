<?php
// Création de la ligne d'en-tête

require_once('../cnx.php');
$cmd = $_GET['cmd'];

$entete = array("Code barre", "Description", "Poids", "Poids total", "Date d'ajout", "Compte");

// Création du contenu du tableau
$lignes = array();
$table = $bdd->prepare('SELECT DISTINCT * FROM inventaire i,produits p WHERE i.id_commande = :id_cmd AND p.id_produit = i.id_produit  order by i.modif_date desc');
$exe = $table->execute(array(
            'id_cmd'=>$cmd
            ));

while ($data=$table->fetch()) {

$lignes[] = array($data['code_br'], $data['descript'],$data['poids'],$data['poids']*$data['cpt'],$data['modif_date'],$data['cpt']);

}

$ref = $bdd->prepare('SELECT ref_cmd FROM commandes WHERE id_commande = :id_cmd');
$exe = $ref->execute(array(
            'id_cmd'=>$cmd
            ));

while ($data2 = $ref->fetch()) { $ref_cmd = $data2['ref_cmd'];}

$separateur = ";";

header("Content-Type: text/csv; charset=UTF-8");
header("Content-disposition: filename=".$ref_cmd.".csv");

// Affichage de la ligne de titre, terminée par un retour chariot
echo implode($separateur, $entete)."\r\n";

// Affichage du contenu du tableau
foreach ($lignes as $ligne) {
	echo implode($separateur, $ligne)."\r\n";
}

?>
