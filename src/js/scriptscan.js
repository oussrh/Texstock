
        $(document).ready(function() {
          $('[data-toggle="tooltip"]').tooltip();
      });

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



// send to database when 8 caracter it pressed
  $("#codeScan").keyup(function () {
       var cod = $("#codeScan").val();

       if (cod.length == 10) {


           $.post("order_query/plusOne.php",
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


// //___________________________________________________________________//
// // Load table des produit d'inventaire (realtime)
// function table_inv() {
//   $.ajax({
//   url: "order_query/load_table.php", // Ton fichier ou se trouve ton chat
//   type : 'POST',
//   data:'cmd=' + idcmd,
//   success:
//       function(retour){
//       $('#output').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "
//   }
//   });
//
//   }
//   setInterval("table_inv()", 500)


  //___________________________________________________________________//
  // Load donnée total (poids et unité) dans la page order  (realtime)
  // function total_commande() {
  //   $.ajax({
  //   url: "order_query/count_Total_Commande.php",
  //   type : 'POST',
  //   data:'cmd=' + idcmd,
  //   success:
  //       function(total){
  //       $('#right_info').html(total);
  //   }
  //   });
  //
  //   }
  //   setInterval("total_commande()", 1000)

    //___________________________________________________________________//
    // Load Nom et numero de commande dans la page order   (realtime)
    // function infoCmd() {
    //   $.ajax({
    //   url: "order_query/cmd_info.php",
    //   type : 'POST',
    //   data:'cmd=' + idcmd,
    //   success:
    //       function(info){
    //       $('#left_info').html(info);
    //   }
    //   });
    //
    //   }
    //   setInterval("infoCmd()", 1000)

//___________________________________________________________________//

// modify quantité + et - sur la table order (realtime)

 //  function plus(p){
 //    $.post("order_query/plus_un_T.php",
 //    {
 //     idT:p,
 //     cmd:idcmd
 //     },
 //     function(){
 //         console.log();
 //       });
 //   $( "#codeScan" ).focus();
 //  }
 //
 //  function moins(m){
 //
 //    $.post("order_query/moins_un_T.php",
 //  {
 //   idM:m,
 //   cmd:idcmd
 //   },
 //   function(){
 //       console.log();
 //     });
 // $( "#codeScan" ).focus();}

 //___________________________________________________________________//

 //desactiver ou activer les inputs dans le form commande

 $(document).ready(function(){
   $("select[name='clientList']").on('change',function(){
     if($(this).val()==1){
       $("input[name='clientNom'],[name='clientadresse'],[name='clientphone'],[name='clientemail']").prop("disabled",false);
     }else{
       $("input[name='clientNom'],[name='clientadresse'],[name='clientphone'],[name='clientemail']").prop("disabled",true);
     }
   });

 });

 //___________________________________________________________________//

 // supprimer une commande  (realtime)

 function delet_cmd(d){
   swal({
  title: "Êtes-vous sûr ?",
  text: "Vous êtes sur le point de supprimer cette commande !",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Oui, supprimé!",
  cancelButtonText: "Annulé!",
  closeOnConfirm: false
},
function(){

    $.post("cmd_query/del_cmd_query.php",
    {
     cmd:d
     },
     function(){
       swal("Supprimer!", "Votre commande a été supprimée.", "success");
       location.reload();
       });


});


  }
  //___________________________________________________________________//

  // changer le statut de la commande dans list_Commandes.php (realtime)
    function getval(s){
      var idcmdfromselec = s.id; //recuperer l'id (id_cmd)
      var st = s.value;
      $.post("list_query/update_statut_query.php",
      {
       cmd:idcmdfromselec,
       statut:st
       },
       function(){
           location.reload();
         });



    };

  //___________________________________________________________________//

  // supprimer un client  (realtime)

  function delet_customer(cl){

    swal({
   title: "Êtes-vous sûr ?",
   text: "Vous êtes sur le point de supprimer ce client !",
   type: "warning",
   showCancelButton: true,
   confirmButtonColor: "#DD6B55",
   confirmButtonText: "Oui, supprimé!",
   cancelButtonText: "Annulé!",
   closeOnConfirm: false
 },
 function()
    {
        $.post("list_query/del_customer_query.php",
        {
         client:cl,
         async: false,
         },
         function(){
           swal("Supprimer!", "Votre client a été supprimé.", "success");
           location.reload();
           });
         });
     }

//___________________________________________________________________//
 //   // supprimer un produit  (realtime)
 //
   function delet_product(pr){
     swal({
    title: "Êtes-vous sûr ?",
    text: "Vous êtes sur le point de supprimer ce produit !",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui, supprimé!",
    cancelButtonText: "Annulé!",
    closeOnConfirm: false
  },
  function(){
         $.post("list_query/del_product_query.php",
         {
          produit:pr
          },
          function(){
            swal("Supprimer!", "Votre produit a été supprimé.", "success");
            location.reload();
            });

    });



    }

      //___________________________________________________________________//
      //ajout nouveau produit
      var new_p = $("#new_p");
        new_p.submit(function(e) {
        e.preventDefault();
        $.ajax({
        type: new_p.attr('method'),
        url: new_p.attr('action'),
        data: new_p.serialize(),
        success:
            function(){
            swal("Produit ajouté avec succès", "succès")
            // alert('Produit ajouter avec succes');
        }

        });
        e.preventDefault();
        $("input[type=text],input[type=number],input[type=tel],input[type=email]").val("");

      });
      //___________________________________________________________________//
      //import CSV to DB
      // var new_csv = $("#importCSV");
      //   new_csv.submit(function(csv) {
      //   csv.preventDefault();
      //   $.ajax({
      //   type: new_csv.attr('method'),
      //   url: new_csv.attr('action'),
      //   data: new_csv.serialize(),
      //   success:
      //       function(){
      //
      //       // alert('Produit ajouter avec succes');
      //   }
      //
      //   });
      //   csv.preventDefault();
      // });

      //___________________________________________________________________//
      //ajout nouveau client
      var new_c = $("#new_c");
        new_c.submit(function(e) {
        e.preventDefault();
        $.ajax({
        type: new_c.attr('method'),
        url: new_c.attr('action'),
        data: new_c.serialize(),
        success:
            function(){
            swal("Client ajouté avec succès", "succès")
            // alert('Client ajouter avec succes');
        }

        });
        e.preventDefault();
        $("input[type=text],input[type=number],input[type=tel],input[type=email]").val("");

      });

      //___________________________________________________________________//


      //___________________________________________________________________//

      //tableau editable (Client)

      function showEditCl(editableObjCl) {
        $(editableObjCl).css("background","#FFF");
      }

      function saveToDatabaseCl(editableObjCl,columnCl,idCl) {
        $(editableObjCl).css("background","#FFF url(http://batrade.be/order/src/img/loaderIcon.gif) no-repeat right");
        $.ajax({
          url: "list_query/edit_customer_query.php",
          type: "POST",
          data:'columnCl='+columnCl+'&editvalCl='+editableObjCl.innerHTML+'&idCl='+idCl,
          success: function(data){
            $(editableObjCl).css("background","#FDFDFD");
          }
         });
      }

    //___________________________________________________________________//

      //_________Fonction rechrche dans les listes produit et client___________//

      //recherche Client
      $(function(){
      $("#searchC").on("keyup", function() {
      		var regval = new RegExp( '^'+ $(this).val(),"i" );

      		$("table tr:gt(0)").hide()
           $("table tr:gt(0)").filter( function(){
           var contenu=$(this).find( 'td:eq(1)' ).html();
          return contenu.match( regval ) ;}).show();
          })

      })


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
      var new_packlist = $("#new_packlist_form");
        new_packlist.submit(function(e) {
        e.preventDefault();
        $.ajax({
        type: new_packlist.attr('method'),
        url: new_packlist.attr('action'),
        data: new_packlist.serialize(),
        success:
            function(idpacklist){
            swal("Packlist ajouté avec succès", "succès"),
            window.location.href = "packlist.php?id="+idpacklist
            }
        });
        e.preventDefault();

      });
