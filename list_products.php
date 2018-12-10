<?php include_once ('phpheader.php');?>
<?php
require_once('cnx.php');
$account = $bdd->query('SELECT * FROM account c,clients');

while ($data = $account->fetch())
{
    $label_title = $data['label_title'];
    $label_subtitle = $data['label_subtitle'];

}

 ?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro | Liste des produits</title>
  <meta name="description" content="TexStock Pro liste des produits">
  <!-- <link rel="stylesheet" type="text/css" href="src/css/labelPrint.css" media="print"> -->

  <style>
  @media print {
    @page {
        width:104mm !important;
        height:159mm !important;
        size:portrait !important; }

     body * {
      visibility: hidden;}

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
                    height: 30mm;
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
                    margin-left: 1mm;
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
    margin-left: -4mm;
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

    .label_subtitle{text-align: center; margin-bottom: 4mm; display: block;}

  }
  </style>
  <?php include_once ('header.php');?>

  <div  id="printProdD" class="white-popup mfp-hide"><!-- PopUP code barre Print -->
    <div id="printContent">
      <!-- 1er ligne-->
      <div id="first_row">
        <div id="left_firstRow">
          <p id="produit_label">Winter</p>
          <p id="nom_prod_Label"></p>
        </div>
        <div id="right_firstRow">
          <p id="poids_prod_Label"></p>Kg<p>
        </div>
      </div>
      <!--fin 1er ligne-->
      <div id="second_row">
        <div id="left_secondRow">
          <p id="qualite_label">Qualité</p>
          <p id="prod_qualite_Label"></p>
        </div>
        <div id="right_secondRow">
          <p id="pays_label">Pays</p></br>
          <p id="prod_pays_Label"></p>
        </div>
      </div>
      <div id="third_row">
        <div id="bcTarget"></div>
      </div>
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

    </div>
    <input type="button" onclick="window.print();" value="Print" />
  </div>
<!--******************************************************************-->
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">
            <div class="tools">
              <!-- <?php if($_SESSION['userPrev'][0]=='admin'):?><a data-toggle="tooltip" data-placement="bottom" title="Nouveau produits" href="new_product_form.php"><span class="glyphicon glyphicon-plus"></span></a><?php endif;?> -->
            </div>
        </div>

      </div>

  </div>

  <div class="row">
    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="form-group">
        <label>Chercher</label>
        <input type="text" id="searchP" value="" class="form-control">
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Code Barre</th>
            <th>Nom Produit</th>
            <th style="text-align:center;">Qualité</th>
            <th style="text-align:center;">Poids</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php require_once('list_query/list_products_query.php'); ?>
        </tbody>
        </table>
      </section>
    </div>
  </div>

  <!-- <div class="row">
    <footer class="navbar-fixed-bottom">

    </footer>
  </div> -->
  </div><!-- end row container -->
  <!-- <script src="src/js/scriptscan.js"></script> -->

  <script>
  //___________________________________________________________________//
   //   // supprimer un produit  (realtime)
   //
     function delet_product(pr){
       swal({
      title: "Êtes-vous sûr ?",
      text: "Vous êtes sur le point de supprimer ce produit !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Oui, supprimé!",
      cancelButtonText: "Annulé!",
      closeOnConfirm: false
    },
    function(){
           $.post("list_query/del_product_query.php",
           {
            produit:pr
            },
            function(){
              swal("Supprimer!", "Votre produit a été supprimé.", "success");
              location.reload();
              });

      });



      }


  //tableau editable (produits)

  function showEdit(editableObj) {
    $(editableObj).css("background","#FFF");
  }

  function saveToDatabase(editableObj,column,id) {
    $(editableObj).css("background","#FFF url(http://batrade.be/order/src/img/loaderIcon.gif) no-repeat right");
    $.ajax({
      url: "list_query/edit_line_product_query.php",
      type: "POST",
      data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
      success: function(data){
        $(editableObj).css("background","#FDFDFD");
      }
     });
  }
  //__________________________________________________________________________________________________//
  //_________preparation pour l'impression popup + Generer un Code barre___________//
  $(document).ready(function() {
    $( ".printP" ).click(function() {
      testprint = $(this).data('codebr');//Recuperation code barre de la ligne selecter
      $("#bcTarget").barcode(testprint, "code39",{barWidth:3, barHeight:160, showHRI:false,});//Generer le code barre

      nomprod = $(this).data('nomprod');
      Labelpoids = $(this).data('poids');
      qualite = $(this).data('qualite');
      pays = $(this).data('pays');

      $( "#nom_prod_Label" ).html(nomprod);
      $( "#poids_prod_Label" ).html(Labelpoids);
      $( "#prod_qualite_Label" ).html(qualite);
      $( "#prod_pays_Label" ).html(pays);

      $(this).magnificPopup({//cree le popup
        items: {
              src: '#printProdD',
              type: 'inline'
          }
      });
    });
  });

  //recherche produit
  $(function(){
  $("#searchP").on("keyup", function() {
      var regval = new RegExp( '^'+ $(this).val(),"i" );

      $("table tr:gt(0)").hide()
       $("table tr:gt(0)").filter( function(){
       var contenu=$(this).find( 'td:eq(1)' ).html();
      return contenu.match( regval ) ;}).show();
      })

  })
  </script>



  </body>
</html>
