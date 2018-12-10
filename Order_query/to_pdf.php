<?php
require('../vendor/autoload.php');
use Spipu\Html2Pdf\Html2Pdf;


require_once('../cnx.php');
$idCmd = $_GET['cmd'];

$account = $bdd->query('SELECT * FROM account c,clients');

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

$table = $bdd->prepare('SELECT * FROM commandes c,clients l WHERE c.id_commande = :cmd AND c.id_client= l.id_client');
$exe = $table->execute(array(
            'cmd'=>$idCmd

          ));

while ($donnees = $table->fetch())
{
    $ref = $donnees['ref_cmd'];
    $client = $donnees['nom'];
    $clientRef = $donnees['ref_client'];
    $clientAdress = $donnees['adress'];
    $clientTel = $donnees['tel'];
    $clientEmail = $donnees['email'];
}

$total = $bdd->prepare('SELECT * FROM inventaire i,produits p WHERE i.id_commande = :cmd AND p.id_produit = i.id_produit');
$exe = $total->execute(array(
            'cmd'=>$idCmd
            ));
$cpt=0;
$poids=0;
// $array = $table->fetchAll(PDO::FETCH_ASSOC);
//
// echo json_encode($array);
while ($donneesT = $total->fetch())
{
    $cpt = $cpt + $donneesT['cpt'];
    $poids = $poids + $donneesT['poids']* $donneesT['cpt'];
}
 ob_start();
 ?>

 <page backtop="5mm" backleft="10mm" backright="10mm" backbottom="10mm">
   <page_footer>
     <hr />
     <p class="footer_c"><?=$nom_s.' '.$forme_jr;?><br/><?= $adress_c.' '.$code_p_c;?><br/><?= $ville_c.' '.$pays_c;?><br/><?= $tel_c.' <br/> '.$email_c;?></p>
   </page_footer>
<style>

table {
width: 100%;
color: #717375;
font-family: helvetica;
line-height: 5mm;
border-collapse: collapse;
margin-top: 30px;
}
.border th {
border: 1px solid #000;
color: white;
background: #000;
padding: 5px;
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
</style>
<div>
  <img style="text-align:left;margin-left:50px;margin-top:20px;" src="../account/logo.png"/>
  <span style="text-align:right;margin-left:180px;margin-top:-20px;">Bon de Commande: <?= $ref ?></span>
</div>

<table  style="vertical-align: top;text-align:left;margin-left:50px;margin-top:40px;">
  <tr><th><?= $clientRef; ?></th></tr>
  <tr><th><?= $client; ?></th></tr>
  <tr><th><?= $clientAdress; ?></th></tr>
  <tr><th><?= $clientTel; ?></th></tr>
  <tr><th><?= $clientEmail; ?></th></tr>
</table>



<table class="border" >
    <thead>
      <tr border="1" style="border:1px solid #000000; background: #000; color:#fff;">
        <th border="1" class="60p" style=''>Description</th>
        <th border="1" class="15p"style=''>Unités</th>
        <th border="1" class="15p" style=''>Poids</th>
        <th border="1" class="15p" style=''>Poids total</th>
      </tr>
    </thead>
    <tbody>
<?php

$table = $bdd->prepare('SELECT DISTINCT * FROM inventaire i,produits p WHERE i.id_commande = :id_cmd AND p.id_produit = i.id_produit  order by p.descript asc');
$exe = $table->execute(array(
            'id_cmd'=>$idCmd
            ));

while ($donnees = $table->fetch())
{
    echo "<tr><td>".$donnees['descript']."</td>";
    echo "<td style='text-align: center;'>".$donnees['cpt']."</td>";
    echo "<td style='text-align: center;'>".$donnees['poids']." Kg</td>";
    echo "<td style='text-align: center;'>".$donnees['poids'] * $donnees['cpt']." Kg</td></tr>"; //poids total

}

 ?>
 <tr>
   <td class="space"></td>
   <td></td>
   <td></td>
   <td></td>
  </tr>
  <tr>
  <td colspan="1" class="no-border"></td>
  <th>Total</th>
  <td colspan="1" class="no-border"></td>
  <th>Poids total</th>
  </tr>
  <tr>
  <td colspan="1" class="no-border"></td>
  <td style='text-align: center;'><?= $cpt; ?> Unités</td>
  <td colspan="1" class="no-border"></td>
  <td style='text-align: center;'><?= $poids; ?> Kg </td>
  </tr>
</tbody>
</table>

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
