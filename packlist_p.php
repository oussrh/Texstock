<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro|Nouvelle packlist</title>
  <meta name="description" content="TexStock Pro liste des commandes">
  <style>
  @media print {
    @page {
        width:104mm !important;
        height:159mm !important;
        size:portrait !important; }

     /* body * {
      visibility: hidden;} */

      #printContent *{
        visibility: visible !important;
      }

    #printContent{
      width:99% !important;
      height:100% !important;
      display: block !important;
      visibility: visible !important;
      border: 1px solid black !important;
      border-radius: 5px;
      margin-left: auto;
      margin-right: auto;
      padding-top: 6mm;
      padding-bottom: 4mm;
      position: relative;
      left: 0;
      top: 5mm;
    }


    #first_row{
                    width: 99% !important;
                    margin-left: auto;
                    margin-right: auto;
                    display: block;
                    height: 25mm;
                    border-bottom: 1px solid black;
                    margin-bottom: 1mm;}

    #left_firstRow,#left_secondRow{
                    display: inline-block;
                    text-align: left;}

    #produit_label{
                    display: inline-block !important;
                    -webkit-transform: rotate(270deg);
                    -moz-transform: rotate(270deg);
                    -ms-transform: rotate(270deg);
                    -o-transform: rotate(270deg);
                    transform: rotate(270deg);
                    margin-top: 7mm;
                    font-size: 4mm !important;
                    font-weight: bold !important;
                    float: left !important;
                    text-align: center !important;

                  }

    #nom_prod_Label{
                    display: inline-block !important;
                    font-size: 14mm !important;
                    font-weight: bold !important;
                    float: left !important;
                    text-align: left !important;}

    #nom_prod_Label_ar{
                    display: inline-block !important;
                    margin-top: 1mm;
                    font-size: 10mm !important;
                    font-weight: bold !important;
                    float: right !important;
                    text-align: right !important;}

    #right_firstRow,#right_secondRow{
                    display: inline-block;
                    float: right;}

    #qualite_label{
                    display: inline-block !important;
                    -webkit-transform: rotate(270deg);
                    -moz-transform: rotate(270deg);
                    -ms-transform: rotate(270deg);
                    -o-transform: rotate(270deg);
                    transform: rotate(270deg);
                    margin-top: 8mm;
                    font-size: 4mm !important;
                    font-weight: bold !important;
                    float: left !important;
                    text-align: center !important;}

  #prod_qualite_Label{
                    display: inline-block !important;
                    font-size: 16mm !important;
                    font-weight: bold !important;
                    float: left !important;
                    text-align: left !important;}

  #second_row{
                    width: 99% !important;
                    display: block;
                    height: 20mm;
                    margin-left: auto;
                    margin-right: auto;
                    border-bottom: 1px solid black;}

  #poids_prod_Label{
                    display: inline-block !important;
                    font-size: 14mm !important;
                    margin-left: -1mm;
                    font-weight: bold !important;
                    float: left !important;
                    text-align: left !important;}

  #right_secondRow{margin-right: 6mm;}

  .line_sep{border-top: 2px solid #000;}

  #third_row{
            position: relative;
            width: 100% !important;
            display: block;
            height: 45mm;
            border-bottom: 1px solid black;
            }

  #bcTarget{
    position: relative;
    width: 100% !important;
    margin-left: 10mm;
    }

    #the4th_row{
              position: relative;
              width: 90% !important;
              display: block;
              height: 60mm;
              margin-left: auto !important;
              margin-right: auto !important;}


    #logo_label{  width: 80mm;
                  margin-left:auto !important;
                  margin-right: auto !important;
                  text-align: center !important;
                  margin-bottom: 4mm;}


    #info_label {
                      margin-left: auto;
                      margin-right: auto;
                      text-align: center;
                      font-size: 4mm;
                      height: 20mm;
                      font-weight: bold;}
    #info_label_c {
                      margin-left: auto;
                      margin-right: auto;
                      text-align: center;
                      height: 20mm;
                      border: 2px dotted black;
                      border-radius: 10px;
                      }

    .label_subtitle{text-align: center; margin-bottom: 4mm; display: block;}

    .label_subtitle_c1{text-align: center; margin-bottom: 4mm; display: block;font-size: 12mm !important;font-weight: bold;}

  }
  </style>
  <?php include_once ('header.php');?>

  <!--*********************************************************************************-->
  <!--Récuperer l'id du packlist-->
  <?php $id_packlist = $_GET['id'];?>

  <?php

  include_once('cnx.php');

  $id_packlist = $_GET['id'];

  $req = $bdd->query('SELECT * FROM packlists WHERE id_packlist = '.$id_packlist);

  while ($data = $req->fetch()) {

    $id_pays = $data['pays_id'];
    $langAR = $data['lang_ar'];

  }

  $req2 = $bdd->query('SELECT * FROM pays WHERE id = '.$id_pays);

  while ($dataP = $req2->fetch()) {

    $nom_pays = $dataP['pays'];

  }

  ?>

  <!--***********************************************************************-->
  <div  id="printProd" class="white-popup mfp-hide"><!-- PopUP code barre Print -->
    <div id="printContent" style="margin-top:2mm;">
      <!-- 1er ligne-->
      </br>
      <?php if ($langAR==0):?>
      <div id="first_row">
        <div id="left_firstRow">
          <p id="produit_label"></p>
          <p id="nom_prod_Label"></p>
        </div>
        <div id="right_firstRow">
          <p id="poids_prod_Label"></p>Kg<p>
        </div>
      </div>
      <?php endif;?>
      <?php if ($langAR==1):?>
      <div id="first_row">
        <div id="left_firstRow">
          <p id="produit_label"></p>
          <p id="nom_prod_Label_ar"></p>
        </div>
        <div id="right_firstRow">
          <p id="poids_prod_Label"></p>Kg<p>
        </div>
      </div>
      <?php endif;?>
      <!--fin 1er ligne-->
      <!--*********************************************************-->
      <div id="second_row">
        <div id="left_secondRow">
          <p id="qualite_label">Qualité</p>
          <p id="prod_qualite_Label"></p>
          <?php if ($langAR==1):?>

          <?php endif;?>
        </div>
        <div id="right_secondRow">
          <p id="pays_label">Pays</p></br>
          <p id="prod_pays_Label"></p>
        </div>
      </div>
      <div id="third_row">
        <div id="bcTarget"></div>
      </div>
      <?php if ($langAR==0):?>
      <div id="the4th_row">
        <br/>
        <div id="logo_label">
          <img src="account/logo.png" align="center" style="text-align:center;margin-left:auto;margin-right:auto;" />
        </div>

        <div id="info_label">
          <span class="label_subtitle">Tel: +32 (0) 487 528 991  -  +32 (0) 488 867 600</span>
          <span class="label_subtitle" style="font:2mm;">Email:  info@elsaiedcompany.com</span>
          <span class="label_subtitle" style="font-size:6mm;">www.elsaiedcompany.com</span>
        </div>
      </div>
    <?php endif;?>
    <?php if ($langAR==1):?>
    <div id="the4th_row">
      <br/>
      <br/><br/>
      <div id="info_label_c">
        <span class="label_subtitle_c1" style="font:12mm;">LA CITADELLE</span>
        <span class="label_subtitle_c2" style="font-size:8mm;">+32 488536152</span>
      </div>
    </div>
  <?php endif;?>

    </div>
    <input type="button" onclick="printgo();" value="Print" class="imprim" />
    <!-- <input type="button" onclick="window.print();" value="Print" class="imprim" /> -->
  </div>
  <!--********************************************************************************************************************-->
    <!--********************************************************************************************************************-->
      <!--********************************************************************************************************************-->
        <!--********************************************************************************************************************-->
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="All_p_bt" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">TOUT</div>
        <div id="CR_bt" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">Cream</div>
        <div id="A_bt" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">Grade A</div>
        <div id="B_bt" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">Grade B</div>
        <div id="SA_bt" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">Shoes A</div>
        <div id="SPA_bt" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">Shoes Plastic A</div>
        <div id="SB_bt" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">Shoes B</div>
        <div id="SCB_bt" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">Convers B</div>

        </div>

  </div>
  <!--*********************************************************************************************-->
  <div class="row">
    <div id="All_p" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Pays: </label><span> <?= $nom_pays; ?></span>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <table class="test table table-striped table-hover">
          <thead>
            <tr>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once('list_query/list_packlist_prod_operator_query.php');?>
          </tbody>
          </table>
          </div>
        </div>
    </div>
  <!--*********************************************************************************************-->
    <div id="CR" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Pays: </label><span> <?= $nom_pays; ?></span>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <table class="test table table-striped table-hover">
          <thead>
            <tr>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once('list_query/list_packlist_prodCR_operator_query.php');?>
          </tbody>
          </table>
          </div>
        </div>
    </div>
    <!--*********************************************************************************************-->
    <div id="A" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Pays: </label><span> <?= $nom_pays; ?></span>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <table class="test table table-striped table-hover">
          <thead>
            <tr>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once('list_query/list_packlist_prodA_operator_query.php');?>
          </tbody>
          </table>
          </div>
        </div>
    </div>
    <!--*********************************************************************************************-->
    <div id="B" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Pays: </label><span> <?= $nom_pays; ?></span>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <table class="test table table-striped table-hover">
          <thead>
            <tr>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once('list_query/list_packlist_prodB_operator_query.php');?>
          </tbody>
          </table>
          </div>
        </div>
    </div>
    <!--*********************************************************************************************-->
    <div id="SA" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Pays: </label><span> <?= $nom_pays; ?></span>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <table class="test table table-striped table-hover">
          <thead>
            <tr>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once('list_query/list_packlist_prodSA_operator_query.php');?>
          </tbody>
          </table>
          </div>
        </div>
    </div>
    <!--*********************************************************************************************-->
    <div id="SPA" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Pays: </label><span> <?= $nom_pays; ?></span>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <table class="test table table-striped table-hover">
          <thead>
            <tr>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once('list_query/list_packlist_prodSPA_operator_query.php');?>
          </tbody>
          </table>
          </div>
        </div>
    </div>
    <!--*********************************************************************************************-->
    <div id="SB" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Pays: </label><span> <?= $nom_pays; ?></span>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <table class="test table table-striped table-hover">
          <thead>
            <tr>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once('list_query/list_packlist_prodSB_operator_query.php');?>
          </tbody>
          </table>
          </div>
        </div>
    </div>
    <!--*********************************************************************************************-->
    <div id="SCB" class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Pays: </label><span> <?= $nom_pays; ?></span>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        <table class="test table table-striped table-hover">
          <thead>
            <tr>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once('list_query/list_packlist_prodSCB_operator_query.php');?>
          </tbody>
          </table>
          </div>
        </div>
    </div>
    <!--*********************************************************************************************-->
  </div>
  <!--*********************************************************************************************-->

  </div><!-- end row container -->

  <script>
  //__________________________________________________________________________________________________//
  //_________preparation pour l'impression popup + Generer un Code barre___________//

  $(document).ready(function() {
  $('body').delegate('.printP','click', function(){
    //$(".printP").click(function() {
      setTimeout(function () {$('#printProd').addClass('mfp-hide');printgo()}, 100);

      testprint = $(this).data('codebr');//Recuperation code barre de la ligne selecter
      $("#bcTarget").barcode(testprint, "code39",{barWidth:2, barHeight:150});//Generer le code barre

      nomprod = $(this).data('nomprod');
      nomprodAr = $(this).data('arabic');
      Labelpoids = $(this).data('poids');
      qualite = $(this).data('qualite');
      pays = $(this).data('pays');
      type = $(this).data('type');


      $( "#nom_prod_Label_ar" ).html(nomprodAr);
      $( "#nom_prod_Label" ).html(nomprod);
      $( "#poids_prod_Label" ).html(Labelpoids);
      $( "#prod_qualite_Label" ).html(qualite);
      $( "#prod_pays_Label" ).html(pays);
      $( "#produit_label" ).html(type);

      $(this).magnificPopup({//cree le popup
        items: {
              src: '#printProd',
              type: 'inline'
          }

      });



    });

  });


  //___________________________________________________________________//

  // modify quantité + et - pour les prod d'une packlist (realtime)

    function plusPP(ppp){
      $.post("list_query/plus_un_PP.php",
      {
       idppPlus:ppp,
       },
       function(){
           console.log();
         });
    }

    function moinsPP(ppm){

      $.post("list_query/moins_un_pp.php",
    {
     idppMoins:ppm,
     },
     function(){
         console.log();
       });
 }

       //___________________________________________________________________//

       // get ID packlist de URL

       function $_GET(parame) {
        var varss = {};
        window.location.href.replace( location.hash, '' ).replace(
          /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
          function( m, key, value ) { // callback
            varss[key] = value !== undefined ? value : '';
          }
        );

        if ( parame ) {
          return varss[parame] ? varss[parame] : null;
        }
        return varss;
       }

       var url_idpacklist = $_GET('id')

//printContent
      function printgo(){

        var printContents = document.getElementById('printContent').innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;}

   // ***********************************************************************************
   $( document ).ready(function() {
     $( "#All_p" ).show();
     $( "#CR" ).hide();
     $( "#A" ).hide();
     $( "#B" ).hide();
     $( "#SA" ).hide();
     $( "#SPA" ).hide();
     $( "#SB" ).hide();
     $( "#SCB" ).hide();
});
$(document).ready(function() {
  $( "#All_p_bt" ).click(function() {
    $( "#All_p" ).show();
    $( "#CR" ).hide();
    $( "#A" ).hide();
    $( "#B" ).hide();
    $( "#SA" ).hide();
    $( "#SPA" ).hide();
    $( "#SB" ).hide();
    $( "#SCB" ).hide();
  });
  // *****************************
     $( "#CR_bt" ).click(function() {
       $( "#All_p" ).hide();
       $( "#CR" ).show();
       $( "#A" ).hide();
       $( "#B" ).hide();
       $( "#SA" ).hide();
       $( "#SPA" ).hide();
       $( "#SB" ).hide();
       $( "#SCB" ).hide();
     });
     // *****************************
     $( "#A_bt" ).click(function() {
       $( "#All_p" ).hide();
       $( "#A" ).show();
       $( "#CR" ).hide();
       $( "#B" ).hide();
       $( "#SA" ).hide();
       $( "#SPA" ).hide();
       $( "#SB" ).hide();
       $( "#SCB" ).hide();
     });
     // *****************************
     $( "#B_bt" ).click(function() {
       $( "#All_p" ).hide();
       $( "#B" ).show();
       $( "#A" ).hide();
       $( "#CR" ).hide();
       $( "#SA" ).hide();
       $( "#SPA" ).hide();
       $( "#SB" ).hide();
       $( "#SCB" ).hide();
     });
     // *****************************
     $( "#SA_bt" ).click(function() {
       $( "#All_p" ).hide();
       $( "#SA" ).show();
       $( "#A" ).hide();
       $( "#CR" ).hide();
       $( "#B" ).hide();
       $( "#SPA" ).hide();
       $( "#SB" ).hide();
       $( "#SCB" ).hide();
     });
     // *****************************
     $( "#SPA_bt" ).click(function() {
       $( "#All_p" ).hide();
       $( "#SPA" ).show();
       $( "#A" ).hide();
       $( "#CR" ).hide();
       $( "#SA" ).hide();
       $( "#B" ).hide();
       $( "#SB" ).hide();
       $( "#SCB" ).hide();
     });
     // *****************************
     $( "#SB_bt" ).click(function() {
       $( "#All_p" ).hide();
       $( "#SB" ).show();
       $( "#A" ).hide();
       $( "#CR" ).hide();
       $( "#SA" ).hide();
       $( "#B" ).hide();
       $( "#SPA" ).hide();
       $( "#SCB" ).hide();
     });
     // *****************************
     $( "#SCB_bt" ).click(function() {
       $( "#All_p" ).hide();
       $( "#SCB" ).show();
       $( "#A" ).hide();
       $( "#CR" ).hide();
       $( "#SA" ).hide();
       $( "#B" ).hide();
       $( "#SPA" ).hide();
       $( "#SB" ).hide();
     });
     });
  </script>

  </body>
</html>
