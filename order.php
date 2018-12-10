<?php include_once ('phpheader.php');?>
<?php if(empty($_GET)){header('Location: homepage.php');}?>
<!DOCTYPE html>
<html>
<head>

  <title>TexStock Pro|ORDER_<?= $_GET['cmd']?> </title>
  <meta name="description" content="TexStock Pro inventaire ">
  <?php include_once ('header.php');?>
  <script>
  //___________________________________________________________________//

  // get ID commande de URL

  function $_GET(param) {
  var vars = {};
  window.location.href.replace( location.hash, '' ).replace(
    /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
    function( m, key, value ) { // callback
      vars[key] = value !== undefined ? value : '';
    }
  );

  if ( param ) {
    return vars[param] ? vars[param] : null;
  }
  return vars;
 }

 var idcmd = $_GET('cmd');
  </script>

  <div class="row">

      <div id="toolsBarClientAdd" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">

            <img src="">
            <div class="tools">
              <a data-toggle="tooltip" data-placement="bottom" title="Annuler Commande" href="cmd_query/Cancel_cmd_query.php?cmd=<?= $_GET['cmd']?>"><span class="glyphicon glyphicon-remove"></span></a>
              &nbsp;&nbsp;&nbsp;
              <a data-toggle="tooltip" data-placement="bottom" title="Terminer Commande" href="cmd_query/finish_cmd_query.php?cmd=<?= $_GET['cmd']?>"><span class="glyphicon glyphicon-ok"></span></a>
              &nbsp;&nbsp;&nbsp;
              <a data-toggle="tooltip" data-placement="bottom" title="Export CSV" href="Order_query/to_csv.php?cmd=<?= $_GET['cmd']?>"><span class="glyphicon glyphicon-list-alt"></span></a>
              &nbsp;&nbsp;&nbsp;
              <a data-toggle="tooltip" data-placement="bottom" title="Export PDF" href="Order_query/to_pdf.php?cmd=<?= $_GET['cmd']?>"><span class=" glyphicon glyphicon-print"></span></a>
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
          <section id="left_info" class="col-lx-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <b>Client :</b></br></br>
            <b>Commande :</b>
          </section>

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
                  <th>Code barre</th>
                  <th>Nom</th>
                  <th>Poids</th>
                  <th>Poids total</th>
                  <th>Date d'ajout</th>
                  <th>Compte</th>
                </tr>
              </thead>
              <tbody id="output">

              </tbody>
            </table>
          </section>
        </div><!-- End row table -->
    </section>
  </div><!-- End row lastScan -->
    </div>
  </div>

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
    data:'cmd=' + idcmd,
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


           $.post("Order_query/plusOne.php",
           {
            code:cod,
            cmd:idcmd
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
     idT:p,
     cmd:idcmd
     },
     function(){
         console.log();
       });
   $( "#codeScan" ).focus();
  }

  function moins(m){

    $.post("Order_query/moins_un_T.php",
  {
   idM:m,
   cmd:idcmd
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
   data:'cmd=' + idcmd,
   success:
       function(total){
       $('#right_info').html(total);
   }
   });

   }
   setInterval("total_commande()", 1000)

   //___________________________________________________________________//
   // Load Nom et numero de commande dans la page order   (realtime)
   function infoCmd() {
     $.ajax({
     url: "Order_query/cmd_info.php",
     type : 'POST',
     data:'cmd=' + idcmd,
     success:
         function(info){
         $('#left_info').html(info);
     }
     });

     }
     setInterval("infoCmd()", 1000)

</script>

</body>

</html>
