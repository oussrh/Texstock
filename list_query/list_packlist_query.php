<?php

include_once ('cnx.php');

if($_SESSION['userPrev'][0]=='admin'){
$packlists = $bdd->query('SELECT * FROM packlists pl, clients c, pays p WHERE c.id_client = pl.client_id AND p.id = pl.pays_id');
while ($data = $packlists->fetch())
{

  echo'<tr><td>'.$data['nom_packlist'].'</td>';
  echo'<td>'.$data['nom'].'</td>';
  echo'<td>'.$data['pays'].'</td>';
  echo'<td>'.$data['date_creation'].'</td>';
  echo "<td>
          <div style='text-align:center;'>
            <span onclick='window.location.href = \"packlist.php?id=".$data['id_packlist']."\";' class='bt_edit_customer glyphicon glyphicon-edit' alt='Edité' title='Edité'></span>
          </div></td>";
  echo "<td>
          <div style='text-align:center;'>
            <span class='bt_edit_cmd' onclick='delet_packlist(".$data['id_packlist'].");'><span class='glyphicon glyphicon-trash'></span>&nbsp&nbsp</span>
          </div></td></tr>";
}

$packlists->closeCursor();
}

elseif($_SESSION['userPrev'][0]=='operator'){

  $packlists = $bdd->query('SELECT * FROM packlists pl, pays p, commandes c WHERE p.id = pl.pays_id AND c.id_packlist = pl.id_packlist');
  while ($data = $packlists->fetch())
  {
    echo'<tr><td style="font-size:6mm;">'.$data['nom_packlist'].'</td>';
    echo'<td style="font-size:6mm;">'.$data['pays'].'</td>';
    echo "<td style='font-size:6mm;'>
            <div style='text-align:center;'>
              <span onclick='window.location.href = \"packlist_p.php?id=".$data['id_packlist']."\";' class='bt_edit_customer glyphicon glyphicon-share' alt='Edité' title='Edité'></span></tr>";
  }

  $packlists->closeCursor();




}


 ?>
