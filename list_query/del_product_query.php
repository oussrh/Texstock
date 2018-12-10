
<?php

require_once('../cnx.php');


$id_produit = $_POST['produit'];

$product = $bdd->prepare('DELETE FROM produits WHERE id_produit = :id_produit');
$exe = $product->execute(array(
            'id_produit'=>$id_produit
          ));
          
?>
