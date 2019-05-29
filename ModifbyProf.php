<?php

echo "youyouyouy";

 $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');


 foreach ($_POST['choix'] as $id_dem) {

 	$rq3 =  'UPDATE demande SET etat = "valide", id_expert ='.$_POST['expert'.$id_dem.''] . '  WHERE id_demande = "'.$id_dem.'"';
 	$db->query($rq3);
 }

 	header('Location: professeur.php');
 	

?>