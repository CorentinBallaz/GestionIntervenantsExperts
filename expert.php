<!DOCTYPE html>
      <html lang="fr">
      <head>
        <title>Expert Interface</title>
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
//echo "this is the session of ";
echo  $_SESSION['login'];
 ?>
<body>


<form class="form-group" method="post" action="expert.php">
    Domaine d'expertise:
    <SELECT name="Expertise" size="1">
    <?php
    $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
    $qry = 'SELECT nom_expertise FROM domaine_expertise';
    //echo $qry;
    //on recupere le type ( etudiant ,expert , prof )
    $req = $db->query($qry);
    while($log = $req->fetch()){
      $Expertise = $log[0];
      //echo $Cours;
      echo "<option>".$Expertise;
    }
     ?>
    </SELECT>

  <input type="submit" name="Expertise1" class="btn btn-dark">
 </form>
 <?php
    if (isset($_POST['Expertise1'])){
      $sql = "INSERT INTO estexpert (id_domaine, id_expert) VALUES ((SELECT id_domaine FROM domaine_expertise WHERE nom_expertise = '".$_POST["Expertise"]."'),(SELECT id_personne FROM personne WHERE login = '".$_SESSION["login"]."'))";
      $db->prepare($sql)->execute([]);
      //echo $sql;
    }
 ?>	




<div class="container-fluid text-center"> 

  <div class="row content">
    
    	<!-- pour affichage des élement -->
      <!--<p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>-->

      <h1> Demandes d'intervention reçu </h1>
      <br>
      
     	<div class="col-sm-4">
     	 <!--<div class="form-group">-->
     	 	<br>
     	 	<br>
		    <label for="Cours concernés">Demandes de : </label>
		    <select class="form" name="Eleve" id="exampleFormControlSelect1">
		    <?php
    			$db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
    			$qry = "SELECT nom  FROM personne where id_personne in (select id_eleve from demande where (etat = 'validee' and id_expert in (select id_personne from personne where login = '".$_SESSION["login"]."')))";
   				 //echo $qry;
   					 //on recupere le type ( etudiant ,expert , prof )
    $req = $db->query($qry);
    while($log = $req->fetch()){
      $Eleve = $log[0];
      //echo $Cours;
      echo "<option>".$Eleve;
    }
     ?>


		 	</select>

  
  <input type="submit" name="Afficher" class="btn btn-dark">

		  </div>
    

    <!--<div class="form-group">-->
  	<!--<div class ="col-xs-8">-->
    <div class="col-sm-6"> 
    		
    <table class="table table-striped">
    	<thead>
     	 <tr>
        	<th>cours_concerné</th>
        	<th>description</th>
        	<th>eleve_concerne</th>
      	</tr>
    	</thead>
    <tbody>
  	 <?php
  	 if (isset($_POST["Afficher"])){
    $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
    $qry = "SELECT cours_concerne,description FROM demande where id_eleve in (select id_personne from personne where nom = '".$_POST["Eleve"]."')"  ;
    //echo $qry;
    //on recupere le type ( etudiant ,expert , prof )
    $req = $db->query($qry);
    while($log = $req->fetch()){
      $Expertise = $log[0];
      //echo $Cours;
      echo $Expertise;
    }
     ?>

  


}
       <tr>	
       			<td> ISOC</td>
       			<td> un cours concernant la blockchain</td>
       			<td> Dadou</td>
       </tr>


    </tbody>
  </table>
  
  	</div>
  	
  	<div class="col-sm-2"> 
  		
  		
 
      <br>
      <br>
      <button type="button" class="btn">Accepter</button>
       <button type="button" class="btn">Refuser</button>

  	</div>
  	
  </div>
</div>

</body>
</html>