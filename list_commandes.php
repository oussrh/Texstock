<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro|Liste des containers</title>
  <meta name="description" content="TexStock Pro liste des commandes">
  <?php include_once ('header.php');?>
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">
            <div class="tools">

                <a data-toggle="tooltip" data-placement="bottom" title="Nouveau container" href="new_cmd_form.php"><span class="glyphicon glyphicon-plus"></span></a>
            </div>
        </div>

      </div>

  </div>
  <div class="row">
    
    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <table class="test table table-striped table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Ref container</th>
            <th>CTR</th>
            <th>Client</th>
            <th>Pays</th>
            <th>Date de création</th>
            <th>Edité</th>
          </tr>
        </thead>
        <tbody id="listCommandes">
          <?php include_once('list_query/list_commandes_query.php');?>
        </tbody>
        </table>
      </section>
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
