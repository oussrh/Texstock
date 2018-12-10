<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro| Nouveau container</title>
  <meta name="description" content="TexStock Pro nouvelle Commande">
  <?php include_once ('header.php');?>
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">

            <div class="tools">
                <a data-toggle="tooltip" data-placement="bottom" title="Liste container" href="list_commandes.php"><span class="glyphicon glyphicon-th-list"></span></a>
            </div>

        </div>

      </div>

  </div>



  <div class="row">
    <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

      <form method="post" action="forms_query/new_cmd_query.php">
        <fieldset>
        <div class="row">
          <div  class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8" style="float:left;">
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-xs-11 form-group">
              <label>Client</label>
              <select class="form-control" name="packlist">

                <?php include_once('forms_query/get_list_packlist_select.php'); ?>
               <!--Recupere liste des clients-->
              </select>
            </div>
          </div>

        </div>

        <div class="row">
          <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Nombre de balle</label>
            <input type="number" class="form-control" name="nbr_balles" min="0" placeholder="Nombre de balle">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Type Produit</label>
            <input type="text" class="form-control" name="type_prod" placeholder="Type Produit">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Couleur Embalage</label>
            <input type="color" class="form-control" name="color_embal">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>CTR</label>
            <input type="text" class="form-control" name="ctr" placeholder="CTR">
          </div>

        </div>
        </div>
        <button type="submit" class="btn btn-primary" style="float:right;">Enregistrer</button>
        </fieldset>

      </form>

    </div>
  </div>


  <div class="row">
    <footer class="navbar-fixed-bottom">

    </footer>
  </div>

</div>

<script src="src/js/scriptscan.js"></script>

</body>

</html>
