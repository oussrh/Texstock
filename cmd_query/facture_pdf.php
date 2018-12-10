<?php
require('../vendor/autoload.php');
use Spipu\Html2Pdf\Html2Pdf;

require_once('../cnx.php');
$idCmd = $_GET['cmd'];
$idpl = $_GET['p'];
//************************************************************************************************************************
// Info Societe
$account = $bdd->query('SELECT * FROM account');

while ($data = $account->fetch())
{
    $nom_s = $data['nom_s'];
    $forme_jr = $data['forme_jr'];
    $tva_c = $data['tva_c'];
    $adress_c = $data['adress_c'];
    $code_p_c = $data['code_p'];
    $ville_c = $data['ville'];
    $pays_c = $data['pays'];
    $tel_c = $data['tel_c'];
    $email_c = $data['email_c'];
}
//************************************************************************************************************************
// Info Commande
$table_cmd = $bdd->prepare('SELECT * FROM commandes WHERE id_commande = :cmd ');
$table_cmd->execute(array(
            'cmd'=>$idCmd
          ));

while ($donnees_cmd = $table_cmd->fetch())
{
    $ref = $donnees_cmd['ref_cmd'];
    $ctr = $donnees_cmd['ctr'];
}
//************************************************************************************************************************
// Info Client
$table_cl = $bdd->prepare('SELECT * FROM packlists p, clients cl WHERE cl.id_client = p.client_id AND id_packlist = :packlist ');
$table_cl->execute(array(
            'packlist'=>$idpl
          ));

while ($donnees_cl = $table_cl->fetch())
{
    $client_nom = $donnees_cl['nom'];
}
//************************************************************************************************************************
// $total = $bdd->prepare('SELECT * FROM inventaire i,produits p WHERE i.id_commande = :cmd AND p.id_produit = i.id_produit');
// $total->execute(array(
//             'cmd'=>$idCmd
//             ));
// $cpt=0;
// $poids=0;
// // $array = $table->fetchAll(PDO::FETCH_ASSOC);
// //
// // echo json_encode($array);
// while ($donneesT = $total->fetch())
// {
//     $cpt = $cpt + $donneesT['cpt'];
//     $poids = $poids + $donneesT['poids']* $donneesT['cpt'];
// }
 ob_start();
 ?>

 <page backtop="3mm" backleft="3mm" backright="3mm" backbottom="3mm">
   <page_footer>
     <p class="footer_c"><?=$nom_s.' '.$forme_jr;?><br/><?= $adress_c.' '.$code_p_c;?><br/><?= $ville_c.' '.$pays_c;?><br/><?= $tel_c.' <br/> '.$email_c;?></p>
   </page_footer>
<style>

* {margin: 0 !important; padding: 0 !important;}

#container{
            width: 100%;
            height: 99%;
            margin: 0 !important;
            padding: 0 !important;}

#t_container{
            position: relative;
            margin: 0 !important;
            padding: 0 !important;
            width: 100%;
            height: 90%;}

#cln_right{
            margin: 0 !important;
            width: 60%;
            height: 90%;

            text-align: center ;
            }

#cln_left{

            margin: 0 !important;
            width: 40%;
            height: 99%;

            text-align: center ;
            }
.logo{
      margin-top: 10px;
      width: 80%;
      margin-left: 0 auto !important;
      margin-right: 0 auto !important;
      text-align: center ;
}

.info_c {
      margin-left: 20px;
      margin-bottom: 10px;
}

.info_c th{text-align: left;width: 100px;height: 20px;}

.info_c td{text-align: center;height: 20px;}

.qualite_title{text-align: center;text-decoration: underline;}

.t_center{margin-left: auto;margin-right: auto;text-align: center;margin: auto;width: 100% !important;margin-bottom: 10px;}

.t_center th{border: 0px !important;}

#t_prod_Cr, #t_prod_A, #t_prod_B{
        margin-top: 10px;
        width: 100px !important;
        margin-left: 0 auto !important;
        margin-right: 0 auto !important;
        text-align: center ;}


table {
width: 100%;
color: #717375;
font-family: helvetica;
line-height: 5mm;
border-collapse: collapse;
margin-top: 10px;
}

.nom_cln{width: 90px;}
.cpt_cln{width: 40px;}

.cpt_row{text-align: center ;}

.border th {
border: 1px solid #000;
color: black;
padding: 1px;
font-weight: normal;
font-size: 14px;
text-align: center;
}

.border td {
border: 1px solid #CFD1D2;
padding: 5px 10px;
text-align: left;

}


.no-border {
border-right: 1px solid #CFD1D2;
border-left: none;
border-top: none;
border-bottom: none;
}
.space { padding-top: 100px; }
.10p { width: 10%; } .15p { width: 15%; }
.25p { width: 25%; } .50p { width: 50%; }
.60p { width: 55%; } .75p { width: 70%; }

.footer_c{text-align: center;font-size: 12px;}

tbody td{text-align: center;}

</style>
<div id="container">
  <table id="t_container">
    <tr>
    <th id="cln_left">
      <img class="logo" src="../account/logo.png" align="middle"/>
      <!--************************************-->
      <table class="info_c no-border">
        <tr>
          <th>Date :</th>
          <td></td>
        </tr>
        <tr>
          <th>Company :</th>
          <td><?= $client_nom;?></td>
        </tr>
        <tr>
          <th>CTR :</th>
          <td><?= $ctr;?></td>
        </tr>
      </table>
      <!--************************************-->
      <h2 class="qualite_title">N° 2</h2>
      <table class="border t_center" style="width:100%;">
        <thead>
          <tr class="th_titles">
            <th></th>
            <th>nbr balles</th>
            <th>Kg/balle</th>
            <th>Kg</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $table = $bdd->prepare('SELECT DISTINCT p.nom_prod, SUM(i.cpt)AS TOT, p.poids FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND confirm_status = 1 AND p.qualite = :qualite GROUP BY p.poids,p.nom_prod ORDER BY p.poids DESC');
          $table->execute(array(
                      'id_pl'=>$idpl,
                      'qualite'=>'A'
                      ));
          $totA=0;//Total de tout les produit de qualite A
          $totA55=0;//Total des produit ou le poids est egale a 55
          $totAother=0;//Total des produit ou le poids est different de 55
          $totkgAother=0;//le poids total des produit ou le poids est different de 55

          while ($donnees = $table->fetch())
          {
            if ($donnees['poids'] != 55) {
            echo "<tr>
                    <td>".$donnees['nom_prod']."</td>
                    <td class='cpt_row'>".$donnees['TOT']."</td>
                    <td class='cpt_row'>".$donnees['poids']."</td>
                    <td class='cpt_row'>".$donnees['TOT']*$donnees['poids']."</td>
                  </tr>";

                  $totAother += $donnees['TOT'];
                  $totkgAother += $donnees['TOT']*$donnees['poids'];
                    }
            else {

              $totA55 += $donnees['TOT'];

            }
          }

            $totkgA55 = $totA55*55;
            $totA = $totAother + $totA55;
            $totkgA = $totkgAother + $totkgA55;//le poids total de tout les produit de qualite A
           ?>
           <tr>
             <td>Normale</td>
             <td><?= $totA55;?></td>
             <td>55</td>
             <td><?= $totkgA55; ?> </td>
           </tr>
           <tr style='background-color:#f6d095'>
             <td></td>
             <td><?= $totA;?></td>
             <td>TOTAL</td>
             <td><?= $totkgA; ?> </td>
           </tr>
        </tbody>
      </table>
      <!--************************************-->
      <h2 class="qualite_title">N° 3</h2>
      <table class="border t_center" style="width:100%;">
        <thead>
          <tr class="th_titles">
            <th></th>
            <th>nbr balles</th>
            <th>Kg/balle</th>
            <th>Kg</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $table = $bdd->prepare('SELECT DISTINCT p.nom_prod, SUM(i.cpt)AS TOT, p.poids FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND confirm_status = 1 AND p.qualite = :qualite GROUP BY p.poids,p.nom_prod ORDER BY p.poids DESC');
          $table->execute(array(
                      'id_pl'=>$idpl,
                      'qualite'=>'B'
                      ));
          $totB=0;//Total de tout les produit de qualite B
          $totA55=0;//Total des produit ou le poids est egale a 55
          $totBother=0;//Total des produit ou le poids est different de 55
          $totkgBother=0;//le poids total des produit ou le poids est different de 55

          while ($donnees = $table->fetch())
          {
            if ($donnees['poids'] != 55) {
            echo "<tr>
                    <td>".$donnees['nom_prod']."</td>
                    <td class='cpt_row'>".$donnees['TOT']."</td>
                    <td class='cpt_row'>".$donnees['poids']."</td>
                    <td class='cpt_row'>".$donnees['TOT']*$donnees['poids']."</td>
                  </tr>";

                  $totBother += $donnees['TOT'];
                  $totkgBother += $donnees['TOT']*$donnees['poids'];
                    }
            else {

              $totB55 += $donnees['TOT'];

            }
          }

            $totkgB55 = $totB55*55;
            $totB = $totBother + $totB55;
            $totkgB = $totkgBother + $totkgB55;//le poids total de tout les produit de qualite B
           ?>
           <tr>
             <td>Normale</td>
             <td><?= $totB55;?></td>
             <td>55</td>
             <td><?= $totkgB55; ?> </td>
           </tr>
           <tr style='background-color:#95d0f6'>
             <td></td>
             <td><?= $totB;?></td>
             <td>TOTAL</td>
             <td><?= $totkgB; ?> </td>
           </tr>
        </tbody>
      </table>
      <!--************************************-->
      <h2 class="qualite_title">N° 1</h2>
      <table class="border t_center" style="width:100%;">
        <thead>
          <tr class="th_titles">
            <th></th>
            <th>nbr balles</th>
            <th>Kg/balle</th>
            <th>Kg</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $table = $bdd->prepare('SELECT DISTINCT p.nom_prod, SUM(i.cpt)AS TOT, p.poids FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND confirm_status = 1 AND p.qualite = :qualite GROUP BY p.poids,p.nom_prod ORDER BY p.poids DESC');
          $table->execute(array(
                      'id_pl'=>$idpl,
                      'qualite'=>'Creem'
                      ));
          $totCR=0;//Total de tout les produit de qualite A
          $totCR55=0;//Total des produit ou le poids est egale a 55
          $totCRother=0;//Total des produit ou le poids est different de 55
          $totkgCRother=0;//le poids total des produit ou le poids est different de 55

          while ($donnees = $table->fetch())
          {
            if ($donnees['poids'] != 55) {
            echo "<tr>
                    <td>".$donnees['nom_prod']."</td>
                    <td class='cpt_row'>".$donnees['TOT']."</td>
                    <td class='cpt_row'>".$donnees['poids']."</td>
                    <td class='cpt_row'>".$donnees['TOT']*$donnees['poids']."</td>
                  </tr>";

                  $totCRother += $donnees['TOT'];
                  $totkgCRother += $donnees['TOT']*$donnees['poids'];
                    }
            else {

              $totCR55 += $donnees['TOT'];

            }
          }

            $totkgCR55 = $totCR55*55;
            $totCR = $totCRother + $totCR55;
            $totkgCR = $totkgCRother + $totkgCR55;//le poids total de tout les produit de qualite Cream
           ?>
           <tr>
             <td>Normale</td>
             <td><?= $totCR55;?></td>
             <td>55</td>
             <td><?= $totkgCR55; ?> </td>
           </tr>
           <tr style='background-color:#f69595'>
             <td></td>
             <td><?= $totCR;?></td>
             <td>TOTAL</td>
             <td><?= $totkgCR; ?> </td>
           </tr>
        </tbody>
      </table>
      <!--************************************-->
      <!--************************************-->
      <?php
      $totSA=0;//Total de tout les produit de qualite A
      $table = $bdd->prepare('SELECT DISTINCT p.nom_prod, SUM(i.cpt)AS TOT, p.poids FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND confirm_status = 1 AND p.qualite = :qualite GROUP BY p.poids,p.nom_prod ORDER BY p.poids DESC');
      $table->execute(array(
                  'id_pl'=>$idpl,
                  'qualite'=>'Shoes A'
                  ));
                  while ($donnees = $table->fetch())
                  {
                      $totSA += $donnees['TOT'] * $donnees['poids'];
                  }
        //***************************************************************************************************************************************************************************************************************************************************************************
        $totPA=0;//Total de tout les produit de qualite A
        $table = $bdd->prepare('SELECT DISTINCT p.nom_prod, SUM(i.cpt)AS TOT, p.poids FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND confirm_status = 1 AND p.qualite = :qualite GROUP BY p.poids,p.nom_prod ORDER BY p.poids DESC');
        $table->execute(array(
                    'id_pl'=>$idpl,
                    'qualite'=>'Plast A'
                    ));
                    while ($donnees = $table->fetch())
                    {
                        $totPA += $donnees['TOT'] * $donnees['poids'];
                    }
          //***************************************************************************************************************************************************************************************************************************************************************************
          $totSB=0;//Total de tout les produit de qualite A
          $table = $bdd->prepare('SELECT DISTINCT p.nom_prod, SUM(i.cpt)AS TOT, p.poids FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND confirm_status = 1 AND p.qualite = :qualite GROUP BY p.poids,p.nom_prod ORDER BY p.poids DESC');
          $table->execute(array(
                      'id_pl'=>$idpl,
                      'qualite'=>'Shoes B'
                      ));
                      while ($donnees = $table->fetch())
                      {
                          $totSB += $donnees['TOT'] * $donnees['poids'];
                      }
            //***************************************************************************************************************************************************************************************************************************************************************************
            $totSBC=0;//Total de tout les produit de qualite A
            $table = $bdd->prepare('SELECT DISTINCT p.nom_prod, SUM(i.cpt)AS TOT, p.poids FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND confirm_status = 1 AND p.qualite = :qualite GROUP BY p.poids,p.nom_prod ORDER BY p.poids DESC');
            $table->execute(array(
                        'id_pl'=>$idpl,
                        'qualite'=>'Conve B'
                        ));
                        while ($donnees = $table->fetch())
                        {
                            $totSBC += $donnees['TOT'] * $donnees['poids'];
                        }
              //***************************************************************************************************************************************************************************************************************************************************************************

      ?>
      <!--************************************-->
      <!--************************************-->
      <table class="border t_center" style="width:100%;">
        <thead>
          <tr class="th_titles">
            <th>produit</th>
            <th>Kg</th>
            <th>Prix / Kg</th>
            <th>Total / €</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>N° 1</td>
            <td><?=$totkgCR;?></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>N° 2</td>
            <td><?=$totkgA;?></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>chaussures 1</td>
            <td><?=$totSA;?></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>N° 3</td>
            <td><?=$totkgB;?></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>pl</td>
            <td><?=$totPA;?></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>chaussures 2</td>
            <td><?=$totSB;?></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>canvas</td>
            <td><?=$totSBC;?></td>
            <td></td>
            <td></td>
          </tr>
          <tr style="background-color:#85e2a1">
            <td>Total</td>
            <td><?= $totSBC+$totPA+$totSB+$totkgB+$totkgA+$totkgCR+$totSA+$totkgCR;?></td>
            <td></td>
            <td></td>
          </tr>

        </tbody>
      </table>
    </th>
    <th id="cln_right">
      <table>
        <!--*************************************************************************************************************-->
        <th>
          <table id="t_prod_Cr" class="border">
            <thead>
              <tr>
                <th class="nom_cln">N°1</th>
                <th class="cpt_cln"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $table_A = $bdd->prepare('SELECT DISTINCT nom_prod, SUM(cpt) AS TOT FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND p.qualite = :qualite AND confirm_status = 1 GROUP BY nom_prod    order by p.nom_prod asc');
              $table_A->execute(array(
                          'id_pl'=>$idpl,
                          'qualite'=>'Creem'
                          ));
              $cpt_c_CR =0;
              while ($donnees_C = $table_A->fetch())
              {
                if($cpt_c_CR == 1){$color = '#bfafaf';$cpt_c_CR=0;}else{$color = '#fff';$cpt_c_CR=1;}
                echo "<tr style='background-color:".$color."'>
                        <td>".$donnees_C['nom_prod']."</td>
                        <td class='cpt_row' style='background-color:#f69595'>".$donnees_C['TOT']."</td>
                      </tr>";
              }
               ?>
            </tbody>
          </table>
        </th>
        <!--*************************************************************************************************************-->
        <th>
          <table id="t_prod_A" class="border">
            <thead>
              <tr>
                <th class="nom_cln">N°2</th>
                <th class="cpt_cln"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $table_A = $bdd->prepare('SELECT DISTINCT nom_prod, SUM(cpt) AS TOT FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND p.qualite = :qualite AND confirm_status = 1 GROUP BY nom_prod    order by p.nom_prod asc');
              $table_A->execute(array(
                          'id_pl'=>$idpl,
                          'qualite'=>'A'
                          ));
              $cpt_c_A =0;
              while ($donnees_A = $table_A->fetch())
              {
                if($cpt_c_A == 1){$color = '#bfafaf';$cpt_c_A=0;}else{$color = '#fff';$cpt_c_A=1;}
                echo "<tr style='background-color:".$color.";'>
                        <td>".$donnees_A['nom_prod']."</td>
                        <td class='cpt_row' style='background-color:#f6d095'>".$donnees_A['TOT']."</td>
                      </tr>";
              }
               ?>
            </tbody>
          </table>
        </th>
          <!--*************************************************************************************************************-->
        <th>
          <table id="t_prod_B" class="border">
            <thead>
              <tr>
                <th class="nom_cln">N°3</th>
                <th class="cpt_cln"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $table_A = $bdd->prepare('SELECT DISTINCT nom_prod, SUM(cpt) AS TOT FROM inventaire i,produits p WHERE p.id_produit = i.id_produit AND p.id_packlist = :id_pl AND p.qualite = :qualite AND confirm_status = 1 GROUP BY nom_prod   order by p.nom_prod asc');
              $table_A->execute(array(
                          'id_pl'=>$idpl,
                          'qualite'=>'B'
                          ));
              $cpt_c_B =0;
              while ($donnees_B = $table_A->fetch())
              {
                if($cpt_c_B == 1){$color = '#bfafaf';$cpt_c_B=0;}else{$color = '#fff';$cpt_c_B=1;}
                echo "<tr style='background-color:".$color.";'>
                        <td>".$donnees_B['nom_prod']."</td>
                        <td class='cpt_row' style='background-color:#95d0f6'>".$donnees_B['TOT']."</td>
                      </tr>";
              }
               ?>
            </tbody>
          </table>
        </th>
      </table>
    </th>
  </tr>
  </table>

<?php

 ?>
</div> <!--Fin div container-->
</page>
<?php
$content = ob_get_clean();
try {
  $html2pdf = new Html2Pdf('P', 'A4', 'fr');
  $html2pdf->pdf->SetDisplayMode('fullpage');
  $html2pdf->pdf->SetAuthor($nom_s.' '.$forme_jr);
  $html2pdf->pdf->SetTitle('Commande'.$ref);
  $html2pdf->pdf->SetSubject('Bon commande');
  $html2pdf->pdf->SetKeywords('Inventaire','commande');
  $html2pdf->writeHTML($content);
  $html2pdf->output($nom_s.$ref.'.pdf', 'D');
}
catch (HTML2PDF_exception $e) {
die($e);
}
?>
