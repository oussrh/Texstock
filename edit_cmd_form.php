<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro| Edite container</title>
  <meta name="description" content="TexStock Pro nouvelle Commande">
  <?php include_once ('header.php');?>

  <?php
    require_once('cnx.php');
    $id_cmd = $_GET['id'];

    $cmd=$bdd->prepare('SELECT * FROM commandes WHERE id_commande = :id');
    $cmd->execute(array(
          'id' => $id_cmd
          ));
    while ($data = $cmd->fetch())
    {

          $date_creation = $data['date_creation'];
          $ref = $data['ref_cmd'];
          $client = $data['id_client'];
          $pays = $data['pays'];
          $date_c = $data['date_c'];
          $ctr = $data['ctr'];
          $nbr_balles = $data['nbr_balles'];
          $statut_cmd = $data['statut_cmd'];
          $type_prod = $data['type_prod'];
          $color_embal = $data['color_embal'];
          $ref_cmd = $data['ref_cmd'];
          $comnt = $data['comnt'];
    }


    // ******************************************************
    $packlist=$bdd->prepare('SELECT * FROM packlists WHERE id_commande = :id');
    $packlist->execute(array(
          'id' => $id_cmd
          ));
    $packlistBool = $packlist->rowCount();
          if ($packlistBool == 0) {

            $form = '<span id="new_packlist_bt" class="glyphicon glyphicon-list-alt" data-toggle="tooltip" data-placement="bottom" title="Crée packlist"></span>';
          }

          else {
            while ($dataP = $packlist->fetch()) {

              $form =  '<span id="edit_packlist_bt" onclick="location.href=\'packlist.php?id='.$dataP['id_packlist'].'\'" class="glyphicon glyphicon-list-alt" data-toggle="tooltip" data-placement="bottom" title="Modifié packlist" ></span>';
            }

          }
   ?>

<script>
    $(document).ready(function(){
       $('select option[id="<?=$client;?>"]').attr("selected",true);
     });
</script>

  <!--Popup new packlist-->
  <div  id="add_new_backlist" class="white-popup mfp-hide" style="width:600px;height:100px;">
    <div class="row">
    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <form method="post" id="new_packlist_form" action="forms_query/new_packlist_query.php">
        <fieldset>
            <input type="text" name="packlist_nom" placeholder="Nom packlist">
            <input type="hidden" name="id_commande" value="<?=$id_cmd;?>">
            <button  id="add_new_packlist_form" class="btn btn-primary" style="float:right;">Ajouter</button>
        </fieldset>
      </form>
    </div>
    </div>
  </div>
  <!--*************************************************************************************-->
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">

            <div class="tools">
                <?=$form;?>
                <a data-toggle="tooltip" data-placement="bottom" title="Liste container" href="list_commandes.php"><span class="glyphicon glyphicon-th-list"></span></a>
            </div>

        </div>

      </div>

  </div>



  <div class="row">
    <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

      <form method="post" action="forms_query/edit_cmd_query.php">
        <fieldset>
          <input type="hidden" name="id_cmd" value="<?=$id_cmd;?>" />
        <div class="row">
          <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div  class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-bottom:40px;">
              <label>Ref container: </label><span><?=" ".$ref;?></span></br>
              <label>Date de Creation: </label><span><?=" ".$date_creation;?></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 form-group">
              <label>Status</label>
              <select class="form-control" name="status" id="status">
                  <option value="T" <?php if ($statut_cmd == 'T') {echo'selected';}?>>Terminer</option>
                  <option value="EC" <?php if ($statut_cmd == 'EC') {echo'selected';}?>>En cours</option>
                  <option value="A" <?php if ($statut_cmd == 'A') {echo'selected';}?>>Annuler</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div  class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8" style="float:left;">
            <div class="form-group">
              <label>Packlist</label>
              <select class="form-control" name="packlist" id="clients">

                <?php include_once('forms_query/get_list_packlist_select.php'); ?>
               <!--Recupere liste des clients-->
              </select>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Nombre de balle</label>
            <input type="number" class="form-control" name="nbr_balles" min="0" placeholder="Nombre de balle" value="<?=$nbr_balles;?>">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Type Produit</label>
            <input type="text" class="form-control" name="type_prod" placeholder="Type Produit" value="<?=$type_prod;?>">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>Couleur Embalage</label>
            <input type="color" class="form-control" name="color_embal" value="<?=$color_embal;?>">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 form-group">
            <label>CTR</label>
            <input type="text" class="form-control" name="ctr" placeholder="CTR" value="<?=$ctr;?>">
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
