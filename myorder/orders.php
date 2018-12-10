<?php
//session_start();

if ($_SESSION['idclient'] != 'error') {

var_dump($_SESSION['idclient']);
session_destroy();
}

else
{
  var_dump($_SESSION['idclient']);
  session_destroy();
}




 ?>
