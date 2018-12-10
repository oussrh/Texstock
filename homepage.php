<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro|HOME</title>
  <meta name="description" content="TexStock Pro">
  <?php include_once ('header.php');?>

  
  <div class="row">

    <div class="col-xl-offset-3 col-lg-offset-3 col-md-offset-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">

      <div id="content_bt" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php if ($_SESSION['userPrev'][0]=='admin'):?>
          <div class="wrapper" onclick="location.href='list_products.php'"><img class="ri" src="src/img/ldp.png"><p style="text-align:center;">Liste produits</p></div>
          <div class="wrapper" onclick="location.href='list_commandes.php'"><img class="ri" src="src/img/co.png"><p style="text-align:center;">Continers</p></div>
          <div class="wrapper" onclick="location.href='list_packlist.php'"><img class="ri" src="src/img/packliste.png"><p style="text-align:center;">Packlistes</p></div>
          <div class="wrapper" onclick="location.href='list_customers.php'"><img class="ri" src="src/img/client.png"><p style="text-align:center;">Clients</p></div>
          <div class="wrapper" onclick="location.href='statistics.php'"><img class="ri" src="src/img/sta.png"><p style="text-align:center;">Statistiques</p></div>
      <!--****************************************************************-->
          <?php elseif($_SESSION['userPrev'][0]=='scan'): ?>
            <div class="wrapper" onclick="location.href='scan.php'"><img class="ri" src="src/img/co.png"><p style="text-align:center;">Scan</p></div>
            <div class="wrapper" onclick="location.href='list_products.php'"><img class="ri" src="src/img/ldp.png"><p style="text-align:center;">Liste produits</p></div>

      <!--****************************************************************-->
          <?php elseif($_SESSION['userPrev'][0]=='operator'): ?>
            <div class="wrapper" onclick="location.href='list_products.php'"><img class="ri" src="src/img/ldp.png"><p style="text-align:center;">Liste produits</p></div>
            <div class="wrapper" onclick="location.href='list_packlist_op.php'"><img class="ri" src="src/img/packliste.png"><p style="text-align:center;">Packlistes</p></div>

      <!--****************************************************************-->
    <?php endif;?>
    </div>
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
