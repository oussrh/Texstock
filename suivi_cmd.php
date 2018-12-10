<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro| Suivi Commande</title>
  <meta name="description" content="TexStock Pro liste des commandes">
  <?php include_once ('header.php');?>
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">
            <div class="tools">
              <span data-toggle="tooltip" id="print_packlist" onclick="location.href='list_commandes.php'" data-placement="bottom" title="List commandes" class="iconPointer glyphicon glyphicon-align-justify"></span>
              <span data-toggle="tooltip" id="print_packlist" onclick="location.href='cmd_query/facture_pdf.php?cmd=<?=$_GET['cmd'].'&p='.$_GET['p'];?>'" data-placement="bottom" title="Imprimer" class="iconPointer glyphicon glyphicon-print"></span>
            </div>
        </div>

      </div>

  </div>
  <div class="row">
    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <table class="test table table-striped table-hover">
        <thead>
          <tr>
            <th class='tdCenter'>#</th>
            <th class='tdCenter'>Unites</th>
            <th class='tdCenter'>Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="listCommandes">
          <?php include_once('list_query/list_suivi_query.php');?>
        </tbody>
        </table>
    </div>
</div>
  <div class="row">
    <footer class="navbar-fixed-bottom">

    </footer>
  </div>
  </div><!-- end row container -->
  <script src="src/js/scriptscan.js"></script>

  </body>
</html>
