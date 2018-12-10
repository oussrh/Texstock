<?php include_once ('phpheader.php');?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro| Nouveau container</title>
  <meta name="description" content="TexStock Pro nouvelle Commande">
  <?php include_once ('header.php');?>
  <?php
  require_once('cnx.php');
  $packlist = $_GET['p'];
  $d = $_GET['d'];
  $date_validation = date('d-m-Y | H:i', $_GET['d']);
  // **************************************************
  $req = $bdd->prepare('SELECT * FROM packlists WHERE id_packlist = :id_packlist ');
  $req->execute(array(
  'id_packlist' => $packlist
  ));

  while ($data = $req->fetch()) {

    $id_pays = $data['pays_id'];
    $id_client = $data['client_id'];
    $nom_packlist = $data['nom_packlist'];
  }
  // **************************************************
  $req2 = $bdd->prepare('SELECT * FROM pays WHERE id = :id_pays ');
  $req2->execute(array(
  'id_pays' => $id_pays
  ));
  while ($dataP = $req2->fetch()) {

    $nom_pays = $dataP['pays'];

  }
  // **************************************************
  $req3 = $bdd->query('SELECT * FROM clients WHERE id_client = '.$id_client);

  while ($dataCL = $req3->fetch()) {

    $nom_cl = $dataCL['nom'];

  }

   ?>
  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">

            <div class="tools">
                <span data-toggle="tooltip" id="new_produits_packlist" onclick="location.href='suivi_cmd.php?cmd=<?=$_GET['cmd'].'&p='.$_GET['p'];?>'" data-placement="bottom" style="cursor:pointer;font-size:20px;" title="Retour" class="glyphicon glyphicon-arrow-left"></span>
                <span data-toggle="tooltip" id="new_produits_packlist" onclick="confirm_s(<?=$d;?>);" data-placement="bottom" style="cursor:pointer;font-size:20px;" title="Confirmer" class="glyphicon glyphicon-ok"></span>
            </div>

        </div>

      </div>

  </div>



  <div class="row">

    <div  class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
      <div id="info_list_left" class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-3">
        <span><label>Packlist : </label><strong>&nbsp;&nbsp;&nbsp;<?=$nom_packlist;?></strong></span>
        <span><label>Client : </label><strong>&nbsp;&nbsp;&nbsp;<?=$nom_cl;?></strong></span>
        <span><label>Pays : </label><strong>&nbsp;&nbsp;&nbsp;<?=$nom_pays;?></strong></span>
      </div>
      <div id="info_list_right" class="col-xl-offset-6 col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-6 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <span><label>Date scan : </label><strong>&nbsp;&nbsp;&nbsp;<?=$date_validation;?></strong></span>
      </div>
      <table class="test table table-striped table-hover">
        <thead>
          <tr>
            <th>Code barre</th>
            <th>Nom</th>
            <th>Qualite</th>
            <th>Poids</th>
            <th>Poids Total</th>
            <th class='tdCenter'></th>
            <th class='tdCenter'>Quantité</th>
            <th class='tdCenter'></th>
          </tr>
        </thead>
        <tbody id="listProdInv">

        </tbody>
        </table>
    </div>
  </div>


  <div class="row">
    <footer class="navbar-fixed-bottom">

    </footer>
  </div>

</div>
<script>
function table_inv() {
  $.ajax({
  url: "list_query/list_inv_prod_query.php", // Ton fichier ou se trouve ton chat
  type : 'POST',
  data: 'p='+<?=$packlist;?>+'&d='+<?=$d;?>,
  success:
      function(retour){
      $('#listProdInv').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "
  }
  });

  }
  setInterval("table_inv()", 500)
//___________________________________________________________________//

// modify quantité + et - sur la table order (realtime)

  function plusUnP(p){
    $.post("list_query/plus_un_PP.php",
    {
     idT:p
     },
     function(){
         console.log();

       });
  }

  function moinsUnP(m){

    $.post("list_query/moins_un_pp.php",
  {
   idM:m
   },
   function(){
       console.log();
     });
 }

 //___________________________________________________________________//

 function confirm_s(pl){

   swal({
  title: "Êtes-vous sûr ?",
  text: "Vous êtes sur le point de valider le scan !",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Oui, Validé!",
  cancelButtonText: "Annulé!",
  closeOnConfirm: false
},
function()
   {
       $.post("list_query/confirm_scan.php",
       {
        inventaire:pl,
        async: false,
        },
        function(){
          swal("Validé!", "La list a été validé.", "success");
          history.back();
          });
        });
    }
</script>
</body>

</html>
