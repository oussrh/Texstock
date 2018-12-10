<?php


if(isset($_GET) && $_GET['f'] == 'nps'){
       name_prod_scan();
     }

elseif(isset($_GET) && $_GET['f'] == 'sp'){
      scaned_prod_query();
      }

elseif(isset($_GET) && $_GET['f'] == 'tps'){//tot_prod_scan
      tot_prod_scan();
      }

else{
       die('No GET params received');
     }

//pie
function name_prod_scan(){
      require_once('../cnx.php');
       $req = $bdd->query('SELECT p.nom_prod, SUM(i.cpt) AS scan FROM inventaire i, produits p WHERE i.chk_valid = 1 AND i.id_produit = p.id_produit GROUP BY i.id_produit ORDER BY i.cpt DESC LIMIT 10');
       while ($data = $req->fetch()) {

       $tbl[]= array('date_v' => $data['nom_prod'] ,'scan_p' => $data['scan'], );
       }

       echo json_encode($tbl);
}
//*********************************************************************************************
function scaned_prod_query(){
      require_once('../cnx.php');
      $req = $bdd->query('SELECT date_validation, COUNT(id_scan) AS scan FROM inventaire WHERE chk_valid = 1 GROUP BY date_validation ORDER BY date_validation ASC');
      while ($data = $req->fetch()) {
        $date_inv = new DateTime($data['date_validation']);
        $date_inv = $date_inv->format('d.m.Y à H:i:s');

      $tbl[]= array('date_v' => $date_inv ,'scan_p' => $data['scan'], );
      }

      echo json_encode($tbl);
    }


function tot_prod_scan(){
      require_once('../cnx.php');
      $req = $bdd->query('SELECT date_validation, SUM(cpt) AS scan FROM inventaire WHERE chk_valid = 1 GROUP BY date_validation ORDER BY date_validation ASC');
      while ($data = $req->fetch()) {
        $date_inv = new DateTime($data['date_validation']);
        $date_inv = $date_inv->format('d.m.Y à H:i:s');

      $tbl[]= array('date_v' => $date_inv ,'scan_p' => $data['scan'], );
      }

      echo json_encode($tbl);
}


?>
