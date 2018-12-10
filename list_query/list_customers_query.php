<?php
require_once('cnx.php');


$customers = $bdd->query('SELECT  * FROM clients order by nom desc');


while ($data = $customers->fetch())
{
    echo '<tr><td contenteditable="true" onBlur="saveToDatabaseCl(this,\'ref_client\',\''.$data["id_client"].'\');" onClick="showEditCl(this);">'.$data["ref_client"].'</td>';
    echo '<td contenteditable="true" onBlur="saveToDatabaseCl(this,\'nom\',\''.$data["id_client"].'\');" onClick="showEditCl(this);">'.$data["nom"].'</td>';
    echo '<td contenteditable="true" onBlur="saveToDatabaseCl(this,\'adress\',\''.$data["id_client"].'\');" onClick="showEditCl(this);">'.$data["adress"].'</td>';
    // echo '<td contenteditable="true" onBlur="saveToDatabaseCl(this,\'tel\',\''.$data["id_client"].'\');" onClick="showEditCl(this);">'.$data["tel"].'</td>';
    // echo '<td contenteditable="true" onBlur="saveToDatabaseCl(this,\'email\',\''.$data["id_client"].'\');" onClick="showEditCl(this);">'.$data["email"].'</td>';
    // echo '<td>'.$data["date_ajout"].'</td>';
    echo "<td><span class='bt_edit_customer' onclick='delet_customer(".$data['id_client'].");'><span class='glyphicon glyphicon-trash'></span>&nbsp&nbsp</span></td></tr>";

}

$customers->closeCursor();

 ?>
