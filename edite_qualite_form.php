<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro| Nouveau container</title>
  <meta name="description" content="TexStock Pro nouvelle Commande">
  <?php include_once ('header.php');?>


<?php
require_once('cnx.php');

$qlt = $_GET['q'];

$qlt_color = $bdd->prepare('SELECT * FROM qualite WHERE qualite = :qlt');
$exe = $qlt_color->execute(array(
            'qlt'=>$qlt
            ));

while ($dataq = $qlt_color->fetch())
{
$qualite = $dataq['qualite'];
$color = $dataq['color'];
}
?>
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">

            <div class="tools">

            </div>

        </div>

      </div>

  </div>



  <div class="row">
    <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

      <form method="post" action="forms_query/edit_qualite_query.php">
        <fieldset>
        <div class="row">
          <div  class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8" style="float:left;">
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-xs-11 form-group">
              <label>Qualite</label>
              <input type="text" class="form-control" name="qualite" value="<?= $qualite; ?>">
            </div>
            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-xs-11 form-group">
              <label>Color</label>
              <input type="color" class="form-control" name="color" value="<?= $color; ?>">
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
