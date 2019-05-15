
<!DOCTYPE html>
      <html lang="fr">
      <head>
        <title>New compte</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
        	hr { width:95%; height:3px; background: #3359DE }

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
    .sidenav {
      padding-top: 20px;
      /*background-color: #f1f1f1;*/
      height: 100%;
    }
    .list-group{
    	max-height: 220px;
    	overflow:scroll;

    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

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

<!--
CODE POUR LES COURS
-->


  <form class="form-group" method="post" action="professeur.php">
    Domaine :
    <SELECT name="Cours" size="1">
    <?php
    $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
    $qry = 'SELECT nom_cours FROM cours';
    //echo $qry;
    //on recupere le type ( etudiant ,expert , prof )
    $req = $db->query($qry);
    while($log = $req->fetch()){
      $Cours = $log[0];
      //echo $Cours;
      echo "<option>".$Cours;
    }
     ?>
    </SELECT>

  <input type="submit" name="Domaine1" class="btn btn-dark">
 </form>
 <?php
    if (isset($_POST['Domaine1'])){
      $sql = "INSERT INTO aCours (id_cours, id_personne) VALUES ((SELECT id_cours FROM cours WHERE nom_cours = '".$_POST["Cours"]."'),(SELECT id_personne FROM personne WHERE login = '".$_SESSION["login"]."'))";
      $db->prepare($sql)->execute([]);
      //echo $sql;
    }
 ?>

<!--
FIN CODE POUR LES COURS
-->
<div id="splitter">
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-4 sidenav">
    	<!-- pour affichage des élement -->
      <!--<p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>-->

      <h1> Demandes Reçus</h1>
      <br>
      <br>
      <div class="list-group">
      	<form>
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
 <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
 <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
  <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
  <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
  <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
    <input rype="submit">
  </a>

</form>
</div>
    </div>

    <div class="form-group">
  	<div class ="col-xs-8">
    <div class="col-sm-8 text-left">
    	<br>
      <h2>Details de la demande </h2>
  <br>
  <br>
  <br>


  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Nombre d'élève</th>
        <th>Domaine expertise</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Coco</td>
        <td>Blz</td>
        <td>4</td>
        <td>BlockChaine</td>

      </tr>


    </tbody>
  </table>
  <br>
  <br>
  <br>

  	</div>
  	<div class ="col-xs-4">

  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  <label for="sel1">Experts concernés:</label>
 <select multiple class="form-control" id="sel2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      <br>
      <br>
      <button type="button" class="btn">Envoyer</button>
  </div>
  </div>
</div>
</div>



</div>

<div>
	<hr class="style4">
		<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-4 sidenav">
    	<!-- pour affichage des élement -->
      <!--<p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>-->

      <h1> Comptes Rendus Reçus</h1>
      <br>
      <br>
    <div class="list-group">
      	<form>
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
 <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
 <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
  <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
  <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
  </a>
  <a href="#" class="list-group-item ">
    <h4 class="list-group-item-heading">De : Nom de l'étudiant</h4>
    <p class="list-group-item-text">Domaine expertise : </p>
    <input rype="submit">
  </a>
   </div>

    </div>

    <div class="form-group">
  	<div class ="col-xs-8">
    <div class="col-sm-8 text-left">
    	<br>
      <h2>Details du compte rendu </h2>
  <br>
  <br>
  <br>


  <table class="table table-striped">
    <thead>
      <tr>
        <th>Expert</th>
        <th>Durée de l'intervention</th>
        <th>Retour</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>César Groum</td>
        <td>3:00</td>
        <td>On a effectué un TP, tres intéressant</td>


      </tr>


    </tbody>
  </table>
  <br>
  <br>
  <br>

  	</div>
  	<div class ="col-xs-4">

  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  <label for="Archivage">Archivage des données :</label>

      <br>
      <br>
      <button type="button" class="btn">Archivage</button>
  </div>
  </div>
</div>
</div>


</div>
	</div>
</div>
<!--<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>-->

</body>
