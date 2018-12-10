<?php
require_once('../cnx.php');

$req = $bdd->query('SELECT id_produit FROM inventaire WHERE chk_valid = 0');

$cpt_CR =0;
$cpt_A =0;
$cpt_B =0;
$cpt_SA =0;
$cpt_SPA =0;
$cpt_SB =0;
$cpt_SCB =0;

$qualites_CR="";
$qualites_A="";
$qualites_B="";
$qualites_SA="";
$qualites_SPA="";
$qualites_SB="";
$qualites_SCB="";


$qualiteCR = "creem";
$qualiteA = "A";
$qualiteB = "B";
$qualiteSA = "Shoes A";
$qualiteSPA = "Plast A";
$qualiteSB = "Shoes B";
$qualiteSCB = "Conve B";

while ($data = $req->fetch()) {

  $prodCR = $bdd->prepare('SELECT nom_prod, cpt FROM produits p, inventaire i  WHERE p.id_produit = i.id_produit AND p.id_produit = :id_produit AND p.qualite = :qualite AND i.chk_valid = 0 ');
  $prodCR->execute(array(
        'id_produit' => $data['id_produit'],
        'qualite' => $qualiteCR
        ));

  while ($dataCR = $prodCR->fetch()) {

        $qualites_CR .= "<div class='panel-body'>".$dataCR['nom_prod'].": <span align='right'>".$dataCR['cpt']."</span></div>";

        $cpt_CR += $dataCR['cpt'];
      }

  //*******************************************************************************************************************

  $prodA = $bdd->prepare('SELECT nom_prod, cpt FROM produits p, inventaire i  WHERE p.id_produit = i.id_produit AND p.id_produit = :id_produitA AND p.qualite = :qualiteA AND i.chk_valid = 0 ');
  $prodA->execute(array(
        'id_produitA' => $data['id_produit'],
        'qualiteA' => $qualiteA
        ));

  while ($dataA = $prodA->fetch()) {

        $qualites_A .= "<div class='panel-body'>".$dataA['nom_prod'].": <span align='right'>".$dataA['cpt']."</span></div>";
        $cpt_A += $dataA['cpt'];
        }

  //*******************************************************************************************************************

  $prodB = $bdd->prepare('SELECT nom_prod, cpt FROM produits p, inventaire i  WHERE p.id_produit = i.id_produit AND p.id_produit = :id_produit AND p.qualite = :qualite AND i.chk_valid = 0 ');
  $prodB->execute(array(
        'id_produit' => $data['id_produit'],
        'qualite' => $qualiteB
        ));

  while ($dataB = $prodB->fetch()) {

        $qualites_B .= "<div class='panel-body'>".$dataB['nom_prod'].": <span align='right'>".$dataB['cpt']."</span></div>";
        $cpt_B += $dataB['cpt'];
        }

  //*******************************************************************************************************************

  $prodSA = $bdd->prepare('SELECT nom_prod, cpt FROM produits p, inventaire i  WHERE p.id_produit = i.id_produit AND p.id_produit = :id_produit AND p.qualite = :qualite AND i.chk_valid = 0 ');
  $prodSA->execute(array(
        'id_produit' => $data['id_produit'],
        'qualite' => $qualiteSA
        ));

  while ($dataSA = $prodSA->fetch()) {

        $qualites_SA .= "<div class='panel-body'>".$dataSA['nom_prod'].": <span align='right'>".$dataSA['cpt']."</span></div>";
        $cpt_SA += $dataSA['cpt'];
      }

  //*******************************************************************************************************************

  $prodSPA = $bdd->prepare('SELECT nom_prod, cpt FROM produits p, inventaire i  WHERE p.id_produit = i.id_produit AND p.id_produit = :id_produit AND p.qualite = :qualite AND i.chk_valid = 0 ');
  $prodSPA->execute(array(
        'id_produit' => $data['id_produit'],
        'qualite' => $qualiteSPA
        ));

  while ($dataSPA = $prodSPA->fetch()) {

        $qualites_SPA .= "<div class='panel-body'>".$dataSPA['nom_prod'].": <span align='right'>".$dataSPA['cpt']."</span></div>";
        $cpt_SPA += $dataSPA['cpt'];
      }

  //*******************************************************************************************************************

  $prodSB = $bdd->prepare('SELECT nom_prod, cpt FROM produits p, inventaire i  WHERE p.id_produit = i.id_produit AND p.id_produit = :id_produit AND p.qualite = :qualite AND i.chk_valid = 0 ');
  $prodSB->execute(array(
        'id_produit' => $data['id_produit'],
        'qualite' => $qualiteSB
        ));

  while ($dataSB = $prodSB->fetch()) {

        $qualites_SB .= "<div class='panel-body'>".$dataSB['nom_prod'].": <span>".$dataSB['cpt']."</span></div>";
        $cpt_SB += $dataSB['cpt'];
      }

  //*******************************************************************************************************************

  $prodSCB = $bdd->prepare('SELECT nom_prod, cpt FROM produits p, inventaire i  WHERE p.id_produit = i.id_produit AND p.id_produit = :id_produit AND p.qualite = :qualite AND i.chk_valid = 0 ');
  $prodSCB->execute(array(
        'id_produit' => $data['id_produit'],
        'qualite' => $qualiteSCB
        ));

  while ($dataSCB = $prodSCB->fetch()) {

        $qualites_SCB .= "<div class='panel-body'>".$dataSCB['nom_prod'].": <span>".$dataSCB['cpt']."</span></div>";
        $cpt_SCB += $dataSCB['cpt'];
      }
}

$tot = $cpt_CR + $cpt_A + $cpt_B + $cpt_SA + $cpt_SPA + $cpt_SB + $cpt_SCB;
echo json_encode(
      array(
        "cream" => $qualites_CR,
        "gradeA" => $qualites_A,
        "gradeB" => $qualites_B,
        "shoesA" => $qualites_SA,
        "shoesPA" => $qualites_SPA,
        "shoesB" => $qualites_SB,
        "shoesCB" => $qualites_SCB,
        "tot_cr" => $cpt_CR,
        "tot_A" => $cpt_A,
        "tot_B" => $cpt_B,
        "tot_SA" => $cpt_SA,
        "tot_SPA" => $cpt_SPA,
        "tot_SB" => $cpt_SB,
        "tot_SCB" => $cpt_SCB,
        "tot_prods" => $tot));

?>
