<?php
require_once('../cnx.php');

$qulites = $bdd->query('SELECT * FROM qualite');


while ($dataQ = $qulites->fetch()){

  echo "<tr><td>".$dataQ['qualite']."</td>";
  echo "<td style='background-color:".$dataQ['color']."'></td>";
  echo "<td style='text-align:center;cursor: pointer;' onclick=\"location.href='edite_qualite_form.php?q=".$dataQ['qualite']."';\"><span class='glyphicon glyphicon-pencil'></span></td>";
  echo "<td style='text-align:center;cursor: pointer;' onclick=del_Q(".$dataQ['id_qualite'].");><span class='glyphicon glyphicon-trash'></span></td></tr>";
}


?>
