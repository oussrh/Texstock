<?php

require_once('../cnx.php');

$login = $_POST['login'];
$password = $_POST['pwd'];


$logon = $bdd->prepare('SELECT id_client FROM clients WHERE ref_client = :login AND pwd = :pwd');
$exe = $logon->execute(array(
'login' =>$login,
'pwd' => $password
));


if($logon->rowCount() != 0)
        {

          while ($id_c = $logon->fetch())
          {
            $idC = $id_c['id_client'];
            $_SESSION['idclient'] = $idC;
            header('location:orders.php');
          }

        }

else{

      $_SESSION['idclient'] = 'error';
      header('location:orders.php');

    }

 ?>
