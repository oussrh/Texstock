
<?php include_once ('phpheader.php');?>

<?php
  require_once('cnx.php');
  $id_prod = $_GET['id'];

  $edit=$bdd->prepare('SELECT * FROM produits WHERE id_produit = :id');
  $edit->execute(array(
        'id' => $id_prod
        ));

  while ($data_p = $edit->fetch()) {

    $code_br = $data_p['code_br'];
    $nom_prod = $data_p['nom_prod'];
    $descript = $data_p['descript'];
    $qualite = $data_p['qualite'];
    $poids = $data_p['poids'];
    $estimation = $data_p['estimation'];
    $prix_kg = $data_p['prix_kg'];
    $arabic_nom = $data_p['arabic_nom'];
    $print_logo = $data_p['print_logo'];
    $print_pays = $data_p['print_pays'];
    $print_arab = $data_p['print_arab'];
    $type = $data_p['type'];

  }
?>

<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro|Edité produit</title>
  <meta name="description" content="TexStock Pro ajout d'un nouveau produit">
  <?php include_once ('header.php');?>

  <!--Bannner tools-->
  <?php

  $list=$bdd->prepare('SELECT id_client FROM prod_client WHERE id_prod = :id_c');
  $list->execute(array(
        'id_c' => $id_prod
        ));

        // while ($data = $list->fetch()) {
        //   echo 'tot'.$data['id_client'];
        // }
        $tabl = array();
        while ($data = $list->fetchColumn()) {

  //echo $tabl;
        }
        //$result = $list_client->fetchAll();
        //var_dump($list_client);
        // $pieces = implode(",", $test);
        // var_dump($list_client);

   ?>

  <script type="text/javascript">
        $(document).ready(function() {
            $('#boot-multiselect-demo').multiselect({
            nonSelectedText: 'Select clients',
            includeSelectAllOption: true,
            buttonWidth: 200,
            enableFiltering: true
        });
        });
    </script>

    <script>
  $(document).ready(function(){

          var data = '1,2';
          var valArr = data.split(",");
          var i = 0, size = valArr.length;
          for (i; i < size; i++) {
              $('#boot-multiselect-demo').multiselect('select', valArr[i]);
          }
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
  <form method="post" id="update_p" action="forms_query/edit_product_query.php">
    <fieldset>
      <input type="hidden" name="id_prod" value="<?=$id_prod;?>" />

  <div class="row">
    <div class="col-xs-6 form-group">
        <label>Nom du produit</label>
        <input class="form-control" type="text" name="nom_p" placeholder="Nom du produit" value="<?=$nom_prod?>"/>
    </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
      <div class="col-xs-6 form-group">
            <label>Poids</label>
            <input class="form-control" type="text" name="poids" max="100" placeholder="poids" value="<?=$poids?>" required/>
      </div>
      <div class="col-xs-6 form-group">
          <label>Type</label>
          <input class="form-control" type="text" name="type_p" value="<?=$type?>"/>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 form-group">
            <label>Qulité</label>
            <select class="form-control" name="qualite">
              <?php require_once('forms_query/get_list_qualite_select.php'); ?>
            </select>
      </div>
      <div class="col-xs-6 form-group">
          <label>Estimation</label>
          <input class="form-control" type="text" name="estimation" placeholder="Estimation" value="<?=$estimation?>"/>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 form-group">
            <label>Code Barre</label>
            <input class="form-control" type="text" name="code_br"  minlength="8" maxlength="8" placeholder="Code barre" required value="<?=$code_br?>"/>
      </div>
      <div class="col-xs-6 form-group">
          <label style="direction: rtl;float:right;">إسم المنتج</label>
          <input class="form-control" type="text" name="arabic_nom" placeholder="إسم المنتج" style="direction:RTL" value="<?=$arabic_nom?>"/>
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

<script src="src/js/scriptscan.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#examplestarted').multiselect();
    });
</script>

</body>

</html>
