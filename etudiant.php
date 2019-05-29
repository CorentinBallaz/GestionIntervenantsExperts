<!DOCTYPE html>
      <html lang="fr">
      <head>
        <title>Etudiant</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
        	
     .form-group{
     	width: : 80px;
     }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 350px}
    
    /* Set gray background color and 100% height */
   /* .sidenav {
      padding-top: 20px;
      /*background-color: #f1f1f1;
      height: 100%;
    }*/
    .list-group{
    	max-height: 220px;
    	overflow:scroll;
    }
    .col-sm-8{
      position: absolute;
      top : 200px;
      right: 0px;

    }
    body, html {
  	height: 100%;
}
    .background {
    /* The image used */
    background-image: url("fond2.png");

    /* Full height */
    height: 118%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
} 
    
    /* Set black background color, white text and some padding */
    
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
      </head>

      <?php
session_start();
echo "this is the session of ";
echo  $_SESSION['login'];
 ?>
<body>
	

<div class="background">
<form class="form-group" method="post" action="etudiant.php">
<div id="splitter">
	<div class="container-fluid text-center"> 
	<div class="row content">
	<h1> Faire une nouvelle demande </h1>
	<br>
	<div class="col-sm-3"> 
<br>
<br>
<label for="Domaine expertise">Domaine d'expertise</label>
<class ="form-group" method="post" action="etudiant.php">
<?php
    echo '';
    echo '<SELECT name="domaine" size=1>';
    
    try{
      $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
      $qry = "SELECT nom_expertise FROM domaine_expertise ";
      $req = $db->query($qry);
      while($log = $req->fetch()){
        echo '<option value="'.$log[0].'">'.$log[0];
      }
    }catch(PDOExeption $e){
      echo "erreur de connection à la BDD";
    }
    echo '</SELECT></br></br>';
 ?>
</div>
<div class="col-sm-3"> 
<br>
<br>
<div class="form-group">
<label for="comment">Description:</label>
<textarea class="form-control"  methode= 'post' name='cmtre' rows="5" id="comment" ></textarea>
</div>
</div>
<div class="col-sm-3"> 
<br>
<br>
<label for="Domaine expertise">Nombre d'élèves</label>
<br>
<input type="number" name="nbre" id="replyNumber" min="0" data-bind="value:replyNumber" />
</div>
<div class="col-sm-3"> 
<br>
<br>
<label for="Envoi">Envoi de la demande :</label>
<br>
<br>
<input type="submit" name="envoi" class="btn btn-dark">

		  
</form> 


<?php
try{


if (isset($_POST['envoi']))
{
	$db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
  $id = "NULL";
  $sql1 = "SELECT id_domaine FROM domaine_expertise WHERE nom_expertise = '".$_POST['domaine']."'";
  $stmt1 = $db->prepare($sql1);
$stmt1->execute();
$result = $stmt1->fetch();

$sql2 = "SELECT id_cours FROM domaine_expertise WHERE nom_expertise = '".$_POST['domaine']."'";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->fetch();

$sql3 = "SELECT id_personne FROM personne WHERE login = '".$_SESSION['login']."'";
$stmt3 = $db->prepare($sql3);
$stmt3->execute();
$result3 = $stmt3->fetch();





  $sql = 'INSERT INTO demande (id_demande, id_cours_concerne,id_domaine_expertise ,description, etat, duree, retour, nb_eleve_concerne, id_eleve, id_expert) VALUES (NULL,"'.$result2[0].'","'.$result[0].'","'.$_POST['cmtre'].'","'."transmis".'",NULL,NULL,"'.$_POST['nbre'].'","'.$result3[0].'",NULL);';
  
  $stmt = $db->prepare($sql);
$stmt->execute([]);



}
}catch(PDOExeption $e){
echo "erreur de connection à la BDD";
}
?>      

  	</div>
  	
  </div>
</div>




</div>

<div> 
	<hr class="style4">
		<div class="container-fluid text-center">    
			<h1> Rapport sur l'intervention</h1>
  <div class="row content">
  	
    <div class="col-sm-3 ">

      
      <br>
      <br>


   <!--<p> Intervention Réalisée</p>-->

 	<label for="Domaine expertise">Interventions n° :</label>
 	<br>
<form class ="form-group" method="post" action="etudiant.php">
<?php
            echo '';
            echo '<SELECT name="numdem" size=1>';
            try{
              $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
              $qry = 'SELECT id_demande,etat FROM demande FULL JOIN personne ON id_eleve = personne.id_personne WHERE etat="accepte" ';
              $req = $db->query($qry);
              while($log = $req->fetch()){
                echo '<option value="'.$log[0].'">'.$log[0];
              }
            }catch(PDOExeption $e){
              echo "erreur de connection à la BDD";
            }
            echo '</SELECT></br></br>';
            
         ?>
         <input type="submit" name="info" class="btn btn-info" >
         
</div>

  

    <div class="form-group">
  	
    <div class="col-sm-7 text-left"> 
    	<br>
      <h4>Details de l'intervention </h4>
  

          
   <table class="table table-striped">
    <thead>
      
        <th>Cours</th>
        <th>Domaine</th>
        <th>Expert</th>
      
</thead>

      	 <?php
  	 if (isset($_POST['info'])){
      

    $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
    $qry = 'SELECT nom_cours FROM cours WHERE id_cours IN (SELECT id_cours_concerne FROM demande WHERE `id_demande`='.$_POST['numdem'].')';
    $stmt = $db->prepare($qry);
	$stmt->execute();
	$result = $stmt->fetch();
    
    $qry2 = 'SELECT nom_expertise FROM domaine_expertise WHERE id_domaine IN (SELECT id_domaine_expertise FROM demande WHERE `id_demande`='.$_POST['numdem'].')';
    $stmt2 = $db->prepare($qry2);
	$stmt2->execute();
	$result2 = $stmt2->fetch();

	$qry3 = 'SELECT nom FROM personne WHERE id_personne IN (SELECT id_cours_concerne FROM demande WHERE id_demande='.$_POST['numdem'].')';
    $stmt3 = $db->prepare($qry3);
	$stmt3->execute();
	$result3 = $stmt3->fetch();




	
    echo '<tr>';
    echo '<td>'.$result[0].'</td>';
    echo '<td>'.$result2[0].'</td>';
    echo '<td>'.$result3[0].'</td>';
    echo "</tr>\n";

    //  echo "<td>".$description."</td>";
    }

    
?>

       </table>

 <!-- <label for="Duree intervention">Durée de l'intervention</label>-->

<label for="Duree intervention">Durée de l'intervention(minutes)</label>
<br>
<input type="number" name="heure" id="replyNumber" min="0" data-bind="value:replyNumber" />
<br>
<label for="Duree intervention">Commentaire sur l'intervention</label>
<textarea class="form-control"  methode= 'post' name='ret' rows="5" id="comment" ></textarea>
 
</div>


 
  
  	</div>
  	<div class ="col-sm-2">

  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  <label for="Archivage">Archivage des données :</label>
 
      <br>
      <br>
      <input type="submit" name="archiv" class="btn btn-info" >

  </div>
  </div>
</div>
</div>
<?php
try{


if (isset($_POST['archiv']))
{

  $sql = 'UPDATE demande SET etat ="renseigne" WHERE (id_demande = '.$_POST['numdem'].')';
  $db->prepare($sql)->execute();
  $sql = 'UPDATE demande SET duree ='.$_POST['heure'].' WHERE (id_demande = '.$_POST['numdem'].')';
  $db->prepare($sql)->execute();
  $sql1 = 'UPDATE demande SET retour ="'.$_POST['ret'].'" WHERE (id_demande = '.$_POST['numdem'].')';
  $db->prepare($sql1)->execute();


}
}catch(PDOExeption $e){
echo "erreur de connection à la BDD";
}
?>      
</form>
</div>
	</div>
</div>
</body>


