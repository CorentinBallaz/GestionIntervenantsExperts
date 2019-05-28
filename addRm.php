<?php

session_start();
echo  $_SESSION['login'];

?>

<?php
 $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
 	// si on appuit sur le botuon accepter, on modifie la valeur de l'etat de la demande --> devient accepte
   if(isset($_POST["Accepter"])){

   	foreach($_POST['choix'] as $id_dem){
   		echo " accepter";
   		echo $id_dem;
   	$rq3 =  'UPDATE demande SET etat = "accepte" WHERE id_demande = "'.$id_dem.'"';
   	$db->query($rq3);
	}
}	
	//si on appuis sur le bouton refuser, on supprime le tuple concernant la demande car pas accepter par l'expert
	if(isset($_POST["Refuser"])){

   	foreach($_POST['choix'] as $id_dem){
   		echo "refuser";
   		echo $id_dem;
   	$rq3 =  'DELETE FROM demande WHERE( etat = "validee" AND id_demande = "'.$id_dem.'")';
   	$db->query($rq3);
	}
}	


	header('Location: expert.php');
?>