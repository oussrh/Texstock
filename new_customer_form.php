<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro| Nouveau Client</title>
  <meta name="description" content="TexStock Pro ajout d'un nouveau Client">
  <?php include_once ('header.php');?>

  <div class="row">
    <div class="col-xl-offset-3 col-lg-offset-3 col-md-offset-3 col-sm-offset-1 col-xs-offset-1 col-xl-6 col-lg-6 col-md-6 col-sm-10 col-xs-10">

      <form method="post" class="form-horizontal" id="new_c" action="forms_query/new_customer_query.php">
        <fieldset>
          <legend>Nouveau client:</legend>
          <div class="form-group">
            <label>Client</label>
            <input type="text" class="form-control" name="clientNom" placeholder="Nom Client" required>
          </div>

          <div class="form-group">
            <label>Pays</label>
            <input type="text" class="form-control" name="clientadresse" placeholder="addresse Client">
          </div>

          <!-- <div class="form-group">
            <label>Telephone</label>
            <input type="tel" class="form-control" name="clientphone" placeholder="Telephone Client">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="clientemail" placeholder="Email Client">
          </div> -->
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
