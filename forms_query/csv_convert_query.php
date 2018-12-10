<?php
    require_once('../cnx.php');

if(isset($_POST["Import"])){
    $filename=$_FILES["file"]["tmp_name"];


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
	         {



             $add_product = $bdd->prepare('INSERT INTO produits (code_br, descript, qualite, poids) VALUES(:code_br, :descript, :qualite, :poids)');
             $result = $add_product->execute(array(
                       'code_br' => $getData[0],
                       'descript' => $getData[1],
                       'qualite' => $getData[2],
                       'poids'=> $getData[3]
                       ));



        if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Erreur lors d'import du fichier CSV.\");
							window.location = \"../list_products.php\"
						  </script>";
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"Le fichier CSV a été importé avec succès.\");
						window.location = \"../list_products.php\"
					</script>";
				}
	         }

	         fclose($file);
		 }

}

 ?>
