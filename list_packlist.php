<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro|Liste des packlists</title>
  <meta name="description" content="TexStock Pro liste des clients">
  <?php include_once ('header.php');?>
  <!--***********************************************************************************************************************************************-->
  <div  id="add_new_backlist" class="white-popup mfp-hide">
    <div class="row">
    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <form method="post" action="forms_query/new_packlist_query.php">
        <fieldset>
            <div class="form-group">
            <label>Nom packlist</label>
            <input type="text" class="form-control" name="packlist_nom" placeholder="Nom packlist">
            </div>
            <div class="form-group">
              <label>Client</label>
              <select class="form-control" name="packlist_client" id="clients">
                <?php include_once('forms_query/get_list_customer_select.php'); ?>
               <!--Recupere liste des clients-->
              </select>
            </div>

            <div class="form-group">
              <label>Pays</label>
              <select class="form-control" name="packlist_pays" id="pays">
                <?php include_once('forms_query/get_list_pays_select.php'); ?>
               <!--Recupere liste des clients-->
              </select>
            </div>
            <button  id="add_new_packlist_form" class="btn btn-primary" style="float:right;">Ajouter</button>
        </fieldset>
      </form>
    </div>
    </div>
  </div>
  <!--***********************************************************************************************************************************************-->
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">
            <div class="tools">
                <span id="new_packlist_bt" class="glyphicon glyphicon-list-alt" data-toggle="tooltip" data-placement="bottom" title="Crée packlist"></span>
            </div>
        </div>

      </div>

  </div>


  <div class="row">
    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <table class="test table table-striped table-hover">
        <thead>
          <tr>
          <?php if($_SESSION['userPrev'][0]=='admin'){
            echo "<th>Nom</th>";
            echo "<th>Client</th>";
            echo "<th>Pays</th>";
            echo "<th>Date de creation</th>";
            echo "<th></th>";
          }
          ?>

          <?php if($_SESSION['userPrev'][0]=='operator'){
            echo "<th>Nom</th>";
            echo "<th>Client</th>";
            echo "<th>pays</th>";
            echo "<th></th>";
          }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php require_once('list_query/list_packlist_query.php'); ?>
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
  <script>
  //__________________________________________________________________________________________________//
  //_________Popup New backlist___________//

  $(document).ready(function() {
    $( "#new_packlist_bt" ).click(function() {
      $(this).magnificPopup({//cree le popup
        items: {
              src: '#add_new_backlist',
              type: 'inline'
          }
      });
    });
  });

  // //ajout nouveau packlist
  var new_packlist = $("#add_new_packlist_form");
    new_packlist.submit(function(e) {
    e.preventDefault();
    $.ajax({
    type: new_packlist.attr('method'),
    url: new_packlist.attr('action'),
    data: new_packlist.serialize(),
    success:
        function(idpacklist){
        swal("Packlist ajouté avec succès", "succès")
        }
    });
    e.preventDefault();

  });
  //___________________________________________________________________//

  // supprimer une commande  (realtime)

  function delet_packlist(d){
    swal({
   title: "Êtes-vous sûr ?",
   text: "Vous êtes sur le point de supprimer cette packlist !",
   type: "warning",
   showCancelButton: true,
   confirmButtonColor: "#DD6B55",
   confirmButtonText: "Oui, supprimé!",
   cancelButtonText: "Annulé!",
   closeOnConfirm: false
 },
 function(){

     $.post("list_query/del_packlist_query.php",
     {
      id_packlist:d
      },
      function(){
        swal("Supprimer!", "Votre packlist a été supprimée.", "success");
        location.reload();
        });


 });


   }
   //___________________________________________________________________//
  </script>

  </body>
</html>
