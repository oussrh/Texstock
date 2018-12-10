<?php

include_once ('cnx.php');

$template = $bdd->query('SELECT * FROM template ORDER BY date_creation ASC');

while ($data = $template->fetch())
{

  echo"<tr><td>".$data['nom']."</td>";
  echo"<td>".$data['date_creation']."</td>";
  echo "<td>
          <div style='text-align:center;'>
            <span onclick='window.location.href = \"template.php?id=".$data['id_template']."\";' class='bt_edit_customer glyphicon glyphicon-edit' alt='Edité' title='Edité'></span>
          </div></td>";
}

$template->closeCursor();



 ?>
