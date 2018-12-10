<?php
require_once('../cnx.php');
 $req = $bdd->query('SELECT login, last_cnx FROM users');
 while ($data = $req->fetch()) {
   $last_cnx = new DateTime($data['last_cnx']);
   $last_cnx = $last_cnx->format('d.m.Y à H:i:s');

   echo'<tr>
          <td>'.$data["login"].'</td>
          <td>'.$last_cnx.'</td>
      </tr>';
 }


?>
