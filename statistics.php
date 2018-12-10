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

            </div>
        </div>

      </div>

  </div>
  <div class="row">
    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <canvas id="name_prod_scan"></canvas>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <canvas id="tot_prod_scan"></canvas>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <canvas id="name_prod_scan"></canvas>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-2 col-xs-2">
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <canvas id="nbr_prod_scan" height="80"></canvas>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">

        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>User</th>
                <th>Dernier connexion</th>
              </tr>
            </thead>
            <tbody id="lst_cnx">

            </tbody>
          </table>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
        </div>
      </div>
    </div>
</div>
  
  </div><!-- end row container -->
<script type="text/javascript" src="src/js/stats.js"></script>
<script>
function last_cnx() {
  $.ajax({
  url: "stats_query/lst_cnx_query.php",
  type : 'POST',
  success:
      function(total){
      $('#lst_cnx').html(total);
  }
  });

  }
  setInterval("last_cnx()", 1000)
</script>
  </body>
</html>
