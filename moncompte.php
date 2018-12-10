<?php include_once ('phpheader.php');?>

<?php
require_once('cnx.php');
$compte = $bdd->query('SELECT * FROM account');

while ($data=$compte->fetch()) {

    $nomS = $data['nom_s'];
    $form_jr = $data['forme_jr'];
    $tva = $data['tva_c'];
    $adress_c = $data['adress_c'];
    $code_p = $data['code_p'];
    $ville = $data['ville'];
    $pays = $data['pays'];
    $tel_c = $data['tel_c'];
    $email_c = $data['email_c'];

}


 ?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro|Mon compte</title>
  <meta name="description" content="TexStock Pro Mon compte">
  <?php include_once ('header.php');?>

  <div class="row">
    <div class="col-xl-offset-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-1 col-xs-offset-1 col-xl-6 col-lg-6 col-md-6 col-sm-10 col-xs-10">

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Info</a></li>
        <li><a data-toggle="tab" href="#menu1">Impression</a></li>
        <li><a data-toggle="tab" href="#menu2">Qualite</a></li>
        <li><a data-toggle="tab" href="#menu3">support</a></li>
      </ul>
      <!--******************************************************************************************************************************************************-->
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <form method="post" class="form-horizontal" action="forms_query/update_account_query.php">

                <div class="form-group form-inline">

                  <input type="text" size="69" class="form-control" name="NomS" placeholder="Nom societé" required value="<?php if($nomS!=''){echo $nomS;}?>">

                  <select class="form-control" name="FormJR">
                    <option value='SPRL' <?php if($form_jr =='SPRL'){echo 'selected';}?>>SPRL</option>
                    <option value='SNC' <?php if($form_jr =='SNC'){echo 'selected';}?>>SNC</option>
                    <option value='SA' <?php if($form_jr =='SA'){echo 'selected';}?>>SA</option>
                    <option value='ASBL' <?php if($form_jr =='ASBL'){echo 'selected';}?>>ASBL</option>
                  </select>

                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="NumTVA" placeholder="Numero TVA" value="<?php if($tva!=''){echo $tva;}?>">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="Adress" placeholder="Adresse" value="<?php if($adress_c!=''){echo $adress_c;}?>">
                </div>

                <div class="form-group form-inline">

                  <input type="number" size="24" class="form-control col-xl-4 col-lg-4 col-md-4" name="codeP" placeholder="Code Postale" value="<?php if($code_p!=''){echo $code_p;}?>">

                  <input type="text" size="25" class="form-control col-xl-4 col-lg-4 col-md-4" name="ville" placeholder="Ville" value="<?php if($ville!=''){echo $ville;}?>">

                  <input type="text" size="24" class="form-control col-xl-4 col-lg-4 col-md-4" name="pays" placeholder="Pays" value="<?php if($pays!=''){echo $pays;}?>">

                </div>

                <div class="form-group">
                  <input type="tel" class="form-control" name="tel" placeholder="Telephone" value="<?php if($tel_c!=''){echo $tel_c;}?>">
                </div>

                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if($email_c!=''){echo $email_c;}?>">
                </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
    </div><!--Fin onglet 1-->
    <!--******************************************************************************************************************************************************-->
    <div id="menu1" class="tab-pane fade">
      <!--LOGO-->
      <div class="row">
        <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
          <form action="forms_query/upload_logo_query.php" method="post" enctype="multipart/form-data">
            <strong style="text-decoration:underline;font-size:20px;">Votre logo</strong>
            <p style="font-size:13px;">Dimension max: 300px X 100px !</p>
            <img src="account/logo.png" height="50"/>
            <br/><br/>
            <input type="file" name="fileToUpload"/>
            <br/>
            <button class="btn btn-primary">Uploader</button>
          </form>
        </div>
      </div>
    </div>
    <!--******************************************************************************************************************************************************-->
    <div id="menu2" class="tab-pane fade">
      <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

          <button type="button" class="btn btn-default btn-sm" id="new_qulite_bt">
            <span class="glyphicon glyphicon-plus"></span> Qualite
          </button>

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th style="text-align:center;">Qualité</th>
                    <th style="text-align:center;">Couleur</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="list_qulite_tab">

                </tbody>
              </table>
      </div>
    </div>
    <!--******************************************************************************************************************************************************-->
    <div id="menu3" class="tab-pane fade">
      <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
      </div>
    </div>

  </div><!--Fin onglet pack-->

  </div> <!--Fin row 1-->
  </div>
  <div class="row">
    <footer class="navbar-fixed-bottom">

    </footer>
  </div>

</div><!-- end row container -->
<!--******************************************************************************************************************************************************-->
<!--******************************************************************************************************************************************************-->
<!--******************************************************************************************************************************************************-->
<div  id="add_new_qualite" class="white-popup mfp-hide" style="width:600px;height:100px;">
  <div class="row">
  <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <form method="post" id="new_qualite_form" name="new_qualite_form" action="forms_query/new_qualite_query.php">
      <fieldset>
          <input type="text" name="qualite" placeholder="Qualité" maxlength="7">
          <input type="color" name="color" width="30">
          <button  id="add_new_packlist_form" class="btn btn-primary" style="float:right;">Ajouter</button>
      </fieldset>
    </form>
  </div>
  </div>
</div>
<!--******************************************************************************************************************************************************-->
<div  id="edit_qualite" class="white-popup mfp-hide" style="width:600px;height:100px;">
  <div class="row">
  <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <form method="post" id="edit_qualite_form" name="edit_qualite_form" action="forms_query/edit_qualite_query.php">
      <fieldset>
          <input type="text" name="qualite" placeholder="Qualité" maxlength="7">
          <input type="color" name="color" width="30">
          <button  id="add_new_packlist_form" class="btn btn-primary" style="float:right;">Modifié</button>
      </fieldset>
    </form>
  </div>
  </div>
</div>

<!-- <script src="src/js/scriptscan.js"></script> -->

<script>
$( document ).ready(function(){
    // Détecte le hash dans l'url, l'utilise pour sélectionner le lien correspondant, déclenche le clique
    $("a[href='" + window.location.hash + "']").trigger('click')
});
//___________________________________________________________________//
// Load liste des qualite (realtime)
function qlt_list() {
  $.ajax({
  url: "list_query/list_qualite.php", // fichier ou se trouve le tab
  success:
      function(retour){
      $('#list_qulite_tab').html(retour); // rafraichi toute ta Tbody
  }
  });

  }
  setInterval("qlt_list()", 500)
//__________________________________________________________________________________________________//
//_________Popup New qualite___________//

$(document).ready(function() {
  $( "#new_qulite_bt" ).click(function() {
    $(this).magnificPopup({//cree le popup
      items: {
            src: '#add_new_qualite',
            type: 'inline'
        }
    });
  });
});

// ajout nouveau qualite
var new_qualite = $("#new_qualite_form");
  new_qualite.submit(function(e) {
  e.preventDefault();
  $.ajax({
  type: new_qualite.attr('method'),
  url: new_qualite.attr('action'),
  data: new_qualite.serialize(),
  success:
      function(){
      swal("Qualite ajouté avec succès", "succès"),
      window.location.href = "#menu2"
      }
  });
  e.preventDefault();

});
//__________________________________________________________________________________________________//

//___________________________________________________________________//

// supprimer un client  (realtime)

function del_Q(qlt){

  swal({
 title: "Êtes-vous sûr ?",
 text: "Vous êtes sur le point de supprimer cet qualite !",
 type: "warning",
 showCancelButton: true,
 confirmButtonColor: "#DD6B55",
 confirmButtonText: "Oui, supprimé!",
 cancelButtonText: "Annulé!",
 closeOnConfirm: false
},
function()
  {
      $.post("list_query/del_qualite_query.php",
      {
       qualite:qlt,
       async: false,
       },
       function(){
         swal("Supprimer!", "qualité supprimé.", "success"),
         window.location.href = "#menu2"
         });
       });
   }
   //__________________________________________________________________________________________________//


</script>

</body>

</html>
