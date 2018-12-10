<?php
require_once('../cnx.php');

//Récuperé les données depuis la table inventaire (cpt,poids,date_modif) et la table produit (code_br)

$table = $bdd->query('SELECT * FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND chk_valid = 0 order by i.modif_date desc');


while ($donnees = $table->fetch())
{
    echo "<tr><td>".$donnees['qualite']."</td>";
    echo "<td>".$donnees['nom_prod']."</td>";
    echo "<td>".$donnees['poids']." Kg</td>";
    echo "<td>".$donnees['poids'] * $donnees['cpt']." Kg</td>"; //poids total
    echo "<td><span class='glyphicon glyphicon-minus-sign compteModif' onclick='moins(".$donnees['id_produit'].");'></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>".$donnees['cpt']."</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class='glyphicon glyphicon-plus-sign compteModif'onclick='plus(".$donnees['id_produit'].");'></span></td></tr>";
    //ajout des bouttons + et - pour modifer la quantité sur la tableau directement`


}

$table->closeCursor();

 ?>
