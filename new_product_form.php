<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro|Nouveau produit</title>
  <meta name="description" content="TexStock Pro ajout d'un nouveau produit">
  <?php include_once ('header.php');?>

  <!--Bannner tools-->
  <script type="text/javascript">
        $(document).ready(function() {
            $('#boot-multiselect-demo').multiselect({
            includeSelectAllOption: true,
            buttonWidth: 200,
            enableFiltering: true
        });
        });
    </script>
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">
            <div class="tools">
                <a data-toggle="tooltip" data-placement="bottom" title="Liste produits" href="list_products.php"><span class="glyphicon glyphicon-th-list"></span></a>
            </div>
        </div>

      </div>

  </div>
  <div class="row">
  <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
  <form method="post" id="new_p" action="forms_query/new_product_query.php">
    <fieldset>
    <div class="row">
      <div class="col-xs-6 form-group">
          <label>Nom du produit</label>
          <input name="nom_prod" class="form-control" type="text" placeholder="Nom du produit" required/>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 form-group">
            <label>Qulité</label>
            <select class="form-control" name="qualite" required>
              <?php require_once('forms_query/get_list_qualite_select.php'); ?>
            </select>
      </div>
      <div class="col-xs-6 form-group">
          <label>Estimation</label>
          <input name="estimation" class="form-control" type="number" placeholder="Estimation" required/>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 form-group">
            <label>Poids</label>
            <input name="poids" class="form-control" type="number" max="99" name="poids" max="100" placeholder="poids" required/>
      </div>
      <div class="col-xs-6 form-group">
          <label>Type</label>
          <select class="form-control" name="type_p" required>
              <option value="Winter">Winter</option>
              <option value="Summer">Summer</option>
          </select>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 form-group">
          <label style="direction: rtl;float:right;">إسم المنتج</label>
          <input class="form-control" type="text" placeholder="إسم المنتج" style="direction:RTL" required/>
      </div>
    </div>

    <button type="submit" class="btn btn-primary" style="float:right;">Enregistrer</button>
  </form>
</fieldset>
</div>
</div>
  <!------------------------->
<!-------------------------->
  <div class="row">
    <footer class="navbar-fixed-bottom">

    </footer>
  </div>

</div>

<!-- <script src="src/js/scriptscan.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#examplestarted').multiselect();
    });

    //___________________________________________________________________//
//ajout nouveau produit
var new_p = $("#new_p");
  new_p.submit(function(e) {
  e.preventDefault();
  $.ajax({
  type: new_p.attr('method'),
  url: new_p.attr('action'),
  data: new_p.serialize(),
  success:
      function(){
      swal("Produit ajouté avec succès", "succès")
      // alert('Produit ajouter avec succes');
  }

  });
  e.preventDefault();
  $("input[type=text],input[type=number],input[type=tel],input[type=email]").val("");

});
</script>

</body>

</html>
