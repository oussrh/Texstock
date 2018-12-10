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

  <!--*********************************************************************************-->
  <!--Récuperer l'id du packlist-->
  <?php $id_packlist = $_GET['id'];?>

  <?php

    include_once('cnx.php');

    $id_packlist = $_GET['id'];

    $req = $bdd->query('SELECT * FROM packlists WHERE id_packlist = '.$id_packlist);

    while ($data = $req->fetch()) {

      $id_pays = $data['pays_id'];
      $id_client = $data['client_id'];

    }

    $req2 = $bdd->query('SELECT * FROM pays WHERE id = '.$id_pays);

    while ($dataP = $req2->fetch()) {

      $nom_pays = $dataP['pays'];

    }

    $req3 = $bdd->query('SELECT * FROM clients WHERE id_client = '.$id_client);

    while ($dataCL = $req3->fetch()) {

      $nom_cl = $dataCL['nom'];

    }

  ?>
  <!-- ******************************************************************************************************************-->
  <!--Popup add produit packlist-->
  <!-- <div  id="add_prod_backlist" class="white-popup mfp-hide" style="width:600px;height:700px;">
    <select id='pre-selected-options' multiple='multiple'>
      <?php //require_once('forms_query/get_list_prod_packlist.php'); ?>
    </select>
  </div> -->
<!-- ******************************************************************************************************************-->
  <!-- <script src="src/js/jquery.multi-select.js" type="text/javascript"></script>
  <script type="text/javascript" src="src/js/jquery.quicksearch.js"></script>
  <script>

    $('#pre-selected-options').multiSelect();
    $('#optgroup').multiSelect({ selectableOptgroup: true });
    $('.searchable').multiSelect({
  selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"12\"'>",
  selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='try \"4\"'>",
  afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on('keydown', function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on('keydown', function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
  afterSelect: function(){
    this.qs1.cache();
    this.qs2.cache();
  },
  afterDeselect: function(){
    this.qs1.cache();
    this.qs2.cache();
  }
});
  </script> -->
  <!--***********************************************************************-->
  <div  id="add_new_prod_backlist" class="white-popup mfp-hide">
    <div class="row">
    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <form method="post" id="new_p" action="forms_query/new_prod_packlist_query.php">
        <fieldset>
        <input type="hidden" value="<?=$id_packlist;?>" name="id_packlist"/>
      <div class="row">
        <div class="col-xs-12 form-group">
            <label>Nom du produit</label>
            <input class="form-control" name="nom_prod" type="text" placeholder="Nom du produit" required/>
        </div>
        </div>
        <div class="row">
          <div class="col-xs-6 form-group">
                <label>Qulité</label>
                <select class="form-control" name="qualite" required>
                  <?php require_once('forms_query/get_list_qualite_select.php'); ?>
                </select>
          </div>
          <!-- <div class="col-xs-6 form-group">
                <label>Discriptif</label>
                <input class="form-control" type="text" name="descript" placeholder="Descriptif" required/>
          </div> -->
          <div class="col-xs-6 form-group">
              <label>Estimation</label>
              <input class="form-control" name="estimation" type="number" placeholder="Estimation" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 form-group">
                <label>Poids</label>
                <input class="form-control" type="number" name="poids" max="100" placeholder="poids" required/>
          </div>
          <div class="col-xs-6 form-group">
              <label>Type</label>
              <select class="form-control" name="type_p" required>
                  <option value="Winter">Winter</option>
                  <option value="Summer">Summer</option>
              </select>
              <!-- <input class="form-control" name="type_p" type="text"/> -->
          </div>
        </div>
        <!-- <div class="row">

          <div class="col-xs-6 form-group">
              <label>Prix KG</label>
              <ionput class="form-control" name="prix_kg" type="number" placeholder="Prix par Kg" required/>
          </div>
        </div> -->
        <div class="row">
          <!-- <div class="col-xs-6 form-group">
                <label>Code Barre</label>
                <input class="form-control" type="text" name="code_br"  minlength="8" maxlength="8" placeholder="Code barre" disabled/>
                <p id="passwordHelpBlock" class="form-text text-muted">
                    important: le code-barres doit contenir exactement huit caractères
                </p>
          </div> -->
              <label style="direction: rtl;float:right;">إسم المنتج</label>
              <input class="form-control" type="text" name="arabic_nom" placeholder="إسم المنتج" style="direction:RTL"/>
          </div>
        </div>

        <button  id="add_prod_packlist_form" class="btn btn-primary" style="float:right;">Ajouter</button>
      </form>
    </fieldset>
    </div>
    </div>
  </div>
  <!--***********************************************************************-->
  <div  id="printProd" class="white-popup mfp-hide"><!-- PopUP code barre Print -->
    <div id="printContent">
      <!-- 1er ligne-->
      <div id="first_row">
        <div id="left_firstRow">
          <p id="produit_label"></p>
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
    <input type="button" onclick="window.print();" value="Print" class="imprim" />
  </div>
  <!--********************************************************************************************************************-->
    <!--********************************************************************************************************************-->
    <!--Popup new packlist-->
    <div  id="add_new_template" class="white-popup mfp-hide" style="width:600px;height:100px;">
      <div class="row">
      <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <form method="post" id="new_template_form" action="forms_query/new_tamplate_query.php">
          <fieldset>
              <input type="text" name="tamplate_nom" placeholder="Nom tamplate">
              <input type="hidden" name="id_packlist" value="<?= $id_packlist ?>"/>
              <button  id="add_new_tamplate_form" type="submit" class="btn btn-primary" style="float:right;">Ajouter</button>
          </fieldset>
        </form>
      </div>
      </div>
    </div>
      <!--********************************************************************************************************************-->
        <!--********************************************************************************************************************-->
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">
            <div class="tools">
                <!-- <a data-toggle="tooltip" data-placement="bottom" title="Nouveau container" href="new_cmd_form.php"><span class="glyphicon glyphicon-plus"></span></a> -->
                <span data-toggle="tooltip" id="new_produits_packlist" data-placement="bottom" style="cursor:pointer;font-size:20px;" title="Nouveau Produit" class="glyphicon glyphicon-plus"></span>
            </div>
        </div>

      </div>

  </div>

  <div class="row">
    <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

      <!-- <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#21b573;">
              <label>Poids grand total: </label><span>1234 Kg</span>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#21b573">
              <label>Grand total unité: </label><span>34 Unités</span>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <a data-toggle="tooltip" id="scan" data-placement="bottom" title="Scan" href="#"><span class="glyphicon glyphicon-barcode"></span></a>
            <label for="scan">Scan</label>

             <span data-toggle="tooltip" id="produits_packlist" data-placement="bottom" title="Produits" class="glyphicon glyphicon-th-list"></span>
            <label for="produits">Produits</label>

            <span data-toggle="tooltip" id="new_produits_packlist" data-placement="bottom" style="cursor:pointer;font-size:20px;" title="Nouveau Produit" class="glyphicon glyphicon-credit-card"></span>
            <label for="new_produits_packlist">Nouveau produits</label>

            <span data-toggle="tooltip" id="template" data-placement="bottom" style="cursor:pointer;font-size:20px;" title="Template" class="glyphicon glyphicon-list-alt"></span>
            <label for="template">Cree Template</label>

            <span data-toggle="tooltip" onclick="window.location.href ='list_template.php'" id="template" data-placement="bottom" style="cursor:pointer;font-size:20px;" title="Template" class="glyphicon glyphicon-list-alt"></span>
            <label for="template">Liste Template</label>

          </div>
        </div>
      </div> -->

      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#F1F1F1">
                <label>Client: </label><span> <?= $nom_cl; ?></span>
            </div>
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
              <th>Code Barre</th>
              <th>Nom produit</th>
              <th>Qualité</th>
              <th>Poids</th>
              <th>Estimation</th>
              <th style='text-align:center !important;'>Quantité</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $packlist = $bdd->prepare('SELECT * FROM produits p, packlists pk, qualite q, pays py WHERE p.id_packlist = pk.id_packlist AND p.id_packlist = :id_packlist AND q.qualite = p.qualite AND py.id = pk.pays_id ORDER BY p.qualite,p.nom_prod ASC');
            $exe = $packlist->execute(array(
                        'id_packlist'=>$id_packlist
                        ));

            while ($data = $packlist->fetch())
            {
                  echo "<tr style='background-color:".$data['color'].";'><td>".$data['code_br']."</td>";
                  echo "<td>".$data['nom_prod']."</td>";
                  echo "<td>".$data['qualite']."</td>";
                  echo "<td>".$data['poids']." Kg</td>";
                  echo "<td>".$data['estimation']."</td>";
                  // echo "<td style='text-align:center !important;'><span style='float:left;' class='glyphicon glyphicon-minus-sign compteModif' onclick='moinsPP(".$data['id'].");'></span>
                  //       <strong style='text-align:center !important;'>".$data['quantite_prod_packlist']."</strong>
                  //       <span style='float:right;' class='glyphicon glyphicon-plus-sign compteModif'onclick='plusPP(".$data['id'].");'></span></td>";
                  echo "<td><div style='text-align:center;'><span class='printP bt_edit_customer glyphicon glyphicon-print' data-nomprod='".$data["nom_prod"]."' data-codebr='".$data["code_br"]."' data-poids='".$data["poids"]."' data-descript='".$data["descript"]."' data-qualite='".$data["qualite"]."' data-pays='".$data["pays"]."' data-type='".$data["type"]."'></span></div></td>";
                  echo "<td><div style='text-align:center;'><span onclick='window.location.href = \"edit_product_form.php?id=".$data['id_produit']."\";' class='bt_edit_customer glyphicon glyphicon-edit' alt='Edité' title='Edité'></span></div></td>";
                  echo "<td><div style='text-align:center;'><span onclick=\"delet_product(".$data['id_produit'].");\" class='bt_edit_customer glyphicon glyphicon-trash'></span></div></td></tr>";
                  //echo "<td></td></tr>";

            }

            $packlist->closeCursor();
             ?>
          </tbody>
          </table>
          </div>
        </div>

    </div>
  </div>
  <div class="row">
    <footer class="navbar-fixed-bottom">

    </footer>
  </div>
  </div><!-- end row container -->

  <script type="text/jscript">

  //___________________________________________________________________//
  // supprimer un produit  (realtime)

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

    //___________________________________________________________________//

    // modify quantité + et - pour les prod d'une packlist (realtime)

      function plusPP(ppp){
        $.post("list_query/plus_un_PP.php",
        {
         idppPlus:ppp,
         },
         function(){
            location.reload();
             console.log();
           });
      }

      function moinsPP(ppm){

        $.post("list_query/moins_un_pp.php",
      {
       idppMoins:ppm,
       },
       function(){
          location.reload();
           console.log();
         });
   }
   //__________________________________________________________________________________________________//
   //__________________________________________________________________________________________________//
   //__________________________________________________________________________________________________//
  //__________________________________________________________________________________________________//

  //_________preparation pour l'impression popup + Generer un Code barre___________//

  $(document).ready(function() {
  //$('body').delegate('.printP','click', function(){
    $(".printP").click(function() {

      testprint = $(this).data('codebr');//Recuperation code barre de la ligne selecter
      $("#bcTarget").barcode(testprint, "code39",{barWidth:3, barHeight:200, showHRI:false,});//Generer le code barre

      nomprod = $(this).data('nomprod');
      Labelpoids = $(this).data('poids');
      qualite = $(this).data('qualite');
      pays = $(this).data('pays');
      type = $(this).data('type');

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
     //__________________________________________________________________________________________________//
     //__________________________________________________________________________________________________//
     //__________________________________________________________________________________________________//
     //__________________________________________________________________________________________________//
     //_________Popup backlist produit add___________//

     $(document).ready(function() {
       $( "#produits_packlist" ).click(function() {
         $(this).magnificPopup({//cree le popup
           items: {
                 src: '#add_prod_backlist',
                 type: 'inline'
             }
         });
       });
     });



     //__________________________________________________________________________________________________//
     //_________Popup backlist New produit add___________//

     $(document).ready(function() {
       $( "#new_produits_packlist" ).click(function() {
         $(this).magnificPopup({//cree le popup
           items: {
                 src: '#add_new_prod_backlist',
                 type: 'inline'
             }
         });
       });
     });
      //________________________________________________//
     // //ajout nouveau produit packlist
     // var new_prod_packlist = $("#add_prod_packlist_form");
     //   new_prod_packlist.submit(function(r) {
         $(document).on("submit", "#add_prod_packlist_form", function(r) {

       r.preventDefault();
       $.ajax({
       type: new_prod_packlist.attr('method'),
       url: new_prod_packlist.attr('action'),
       data: new_prod_packlist.serialize(),
       success:
           function(){
           swal("Produit ajouté avec succès", "succès");
           location.reload();
           // alert('Client ajouter avec succes');
       }

       });
       r.preventDefault();

     });
     //__________________________________________________________________________________________________//
     //__________________________________________________________________________________________________//
     //__________________________________________________________________________________________________//
     //_________Popup template___________//

     $(document).ready(function() {
       $( "#template" ).click(function() {
         $(this).magnificPopup({//cree le popup
           items: {
                 src: '#add_new_template',
                 type: 'inline'
             }
         });
       });
     });

     //________________________________________________//

     var new_template = $("#add_new_tamplate_form");
       new_template.submit(function(e) {
       e.preventDefault();
       $.ajax({
       type: new_template.attr('method'),
       url: new_template.attr('action'),
       data: new_template.serialize(),
       success:
           function(){
           swal("templtae cree avec succès", "succès");
           location.reload();
           // alert('Client ajouter avec succes');
       }

       });
       e.preventDefault();

     });


  </script>

  </body>
</html>
