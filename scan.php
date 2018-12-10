<?php include_once ('phpheader.php');?>

<!DOCTYPE html>
<html>
<head>
  <title>TexStock Pro|ORDER </title>
  <meta name="description" content="TexStock Pro inventaire ">
  <?php include_once ('header.php');?>

  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">
            <div class="tools">
              <span id="scan_confirm_bt" class="glyphicon glyphicon-ok" data-toggle="tooltip" data-placement="bottom" title="Validé"></span>
            </div>
        </div>

      </div>

  </div>
  <div class="row">
    <div class="col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
  <div class="row">
      <div class="scan col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <input type="text" id="codeScan" name="codeScan_input" class="form-control form-group-lg input-lg col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"/>

      </div>

  </div><!-- End row input -->

    <div class="row">
    <section id="lastScan" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
          <section id="right_info" class="col-lx-offset-2 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
            <b>Poids Total :</b></br></br>
            <b>Produits total :</b>
          </section>

        </div>

        <div class="row">
          <section class="table_order col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>qualité</th>
                  <th>Nom</th>
                  <th>Poids</th>
                  <th>Poids total</th>
                  <th>Compte</th>
                </tr>
              </thead>
              <tbody id="output">
                <!-- List des produit -->
              </tbody>
            </table>
          </section>
        </div><!-- End row table -->
    </section>
  </div><!-- End row lastScan -->
    </div>
  </div>
<!--*****************************************************************************************************************************-->
<!--*****************************************************************************************************************************-->
      <div id="confirm_scan" class="white-popup mfp-hide" style="width:750px; height:450px;">

        <div id="tot_qlt">Total Produit : <span id="tot_qlt_cpt"></span </div>
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div id="qualite_CR" class="panel-heading" style="background:#f69595 !important;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Cream : <span id="tot_cr"></span></a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
              <!--Cream list-->
            </div>
          </div>
          <div class="panel panel-default">
            <div id="qualite_A" class="panel-heading" style="background:#f6d095 !important;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Grade A :</a>
                <strong id="tot_A"></strong>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
              <!--Grade A list-->
            </div>
          </div>
          <div class="panel panel-default">
            <div id="qualite_B" class="panel-heading" style="background:#95d0f6 !important;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Grade B : <span id="tot_B"></span></a>
              </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
              <!--Grade B list-->
            </div>
          </div>
          <div class="panel panel-default">
            <div id="qualite_SA" class="panel-heading" style="background:#eab515 !important;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Shoes A : <span id="tot_SA"></span></a>
              </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
              <!--Grade Shoes A list-->
            </div>
          </div>
          <div class="panel panel-default">
            <div id="qualite_SPA" class="panel-heading" style="background:#eab515 !important;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Shoes Plastique A : <span id="tot_SPA"></span></a>
              </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse">
              <!--Grade Shoes P A list-->
            </div>
          </div>
          <div class="panel panel-default">
            <div id="qualite_SB" class="panel-heading" style="background:#a3b1ef !important;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Shoes B : <span id="tot_SB"></span></a>
              </h4>
            </div>
            <div id="collapse6" class="panel-collapse collapse">
              <!--Grade Shoes B list-->
            </div>
          </div>
          <div class="panel panel-default">
            <div id="qualite_SCB" class="panel-heading" style="background:#a3b1ef !important;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Shoes Convers B : <span id="tot_SCB"></span></a>
              </h4>
            </div>
            <div id="collapse7" class="panel-collapse collapse">
              <!--Grade Shoes C B list-->
            </div>
          </div>
        </div>
        <button id="scan_conf" onclick="confirme();">Confirmer</button>
      </div>
<!--*****************************************************************************************************************************-->
<!--*****************************************************************************************************************************-->
    <div class="row">
      <footer class="navbar-fixed-bottom">

      </footer>
    </div>

</div><!-- end row container -->

<script>
//___________________________________________________________________//
// on focus when enter keypress

$(document).keypress(function (e) {
  if(e.which == 13){$( "#codeScan" ).focus();}
  });
  //___________________________________________________________________//
  // Load table des produit d'inventaire (realtime)
  function table_inv() {
    $.ajax({
    url: "Order_query/load_table.php", // Ton fichier ou se trouve ton chat
    type : 'POST',
    success:
        function(retour){
        $('#output').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "
    }
    });

    }
    setInterval("table_inv()", 500)
//___________________________________________________________________//
// send to database when 8 caracter it pressed
  $("#codeScan").keyup(function () {
       var cod = $("#codeScan").val();

       if (cod.length == 10) {


           $.post("Order_query/plusOne_scan.php",
           {
            code:cod
            },
            function(){
                console.log();
              });

              $("#codeScan").val("");
              $( "#codeScan" ).focus();

            }


          });
//___________________________________________________________________//
//___________________________________________________________________//

// modify quantité + et - sur la table order (realtime)

  function plus(p){
    $.post("Order_query/plus_un_T.php",
    {
     idT:p
     },
     function(){
         console.log();
       });
   $( "#codeScan" ).focus();
  }

  function moins(m){

    $.post("Order_query/moins_un_T.php",
  {
   idM:m
   },
   function(){
       console.log();
     });
 $( "#codeScan" ).focus();}

 //___________________________________________________________________//
 //___________________________________________________________________//
 // Load donnée total (poids et unité) dans la page order  (realtime)
 function total_commande() {
   $.ajax({
   url: "Order_query/count_Total_Commande.php",
   type : 'POST',
   success:
       function(total){
       $('#right_info').html(total);
   }
   });

   }
   setInterval("total_commande()", 1000)

   //___________________________________________________________________//

   $(document).ready(function() {
     $( "#scan_confirm_bt" ).click(function() {
       $(this).magnificPopup({//cree le popup
         items: {
               src: '#confirm_scan',
               type: 'inline'
           }
       });
     });
   });
   //___________________________________________________________________//
   // Load info total par qualite (realtime)
   function lst_qlt_prod() {
     $.ajax({
     url: "Order_query/list_qlt_prod.php", // Ton fichier ou se trouve ton chat
     type : 'POST',
     dataType: 'json',
     success:
         function(tot){
         $('#collapse1').html(tot.cream);
         $('#collapse2').html(tot.gradeA);
         $('#collapse3').html(tot.gradeB);
         $('#collapse4').html(tot.shoesA);
         $('#collapse5').html(tot.shoesPA);
         $('#collapse6').html(tot.shoesB);
         $('#collapse7').html(tot.shoesCB);
         $('#tot_cr').html(tot.tot_cr);
         $('#tot_A').html(tot.tot_A);
         $('#tot_B').html(tot.tot_B);
         $('#tot_SA').html(tot.tot_SA);
         $('#tot_SPA').html(tot.tot_SPA);
         $('#tot_SCB').html(tot.tot_SCB);
         $('#tot_qlt_cpt').html(tot.tot_prods);
     }
     });

     }
     setInterval("lst_qlt_prod()", 500)


     function confirme() {
       swal({
      title: "Êtes-vous sûr ?",
      text: "Vous êtes sur le point de confirmer l'inventaire !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Oui, Confirmé!",
      cancelButtonText: "Annulé!",
      closeOnConfirm: false
    },
      function(){
       $.ajax({
       url: "Order_query/confirm_scan_query.php", // Ton fichier ou se trouve ton chat
       type : 'POST',
       success:
           function(){
             swal("Envoyé avec succès", "succès");
             $.magnificPopup.close();
       }

     });

       })
 }
</script>

</body>

</html>
