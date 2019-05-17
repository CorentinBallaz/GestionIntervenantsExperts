
<!DOCTYPE html>
      <html lang="fr">
      <head>
        <title>Professeur</title>
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


  <center></br><form class="form-group" method="post" action="professeur.php">
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
</form></center></br>
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
      <form class="form-group" method="post" action="professeur.php">
        <?php
            echo '';
            echo '<SELECT name="eleve_c" size=1>';
            try{
              $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
              $qry = "SELECT eleve_concerne FROM demande ";
              $req = $db->query($qry);
              while($log = $req->fetch()){
                echo '<option value="'.$log[0].'">'.$log[0];
              }
            }catch(PDOExeption $e){
              echo "erreur de connection à la BDD";
            }
            echo '</SELECT></br></br>';
            echo '<input type="submit" name="info" >';
         ?>
    </form>
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
        <th>cours_concerné</th>
        <th>description</th>
        <th>eleve_concerne</th>
      </tr>
    </thead>

    <?php
        if(isset($_POST['info'])){
          echo '<tbody>';
          $qry = 'SELECT cours_concerne ,description, eleve_concerne FROM demande WHERE eleve_concerne ="'.$_POST['eleve_c'].'"';
          $req = $db->query($qry);
          $nom_cours = "";
          while($log = $req->fetch()){
            echo '<tr>';
            echo '<td>'.$log[0].'</td>';
            $nom_cours = $log[0];
            echo '<td>'.$log[1].'</td>';
            echo '<td>'.$log[2].'</td>';
            echo '</tr>';
          }

            echo '<td>';
            echo '<form class="form-group" method="post" action="professeur.php">';
            echo '<SELECT name="expert" size=1>';
            $query = "SELECT nom FROM personne WHERE id_personne IN (SELECT id_expert FROM estexpert WHERE id_domaine IN (SELECT id_domaine FROM domaine_expertise WHERE id_cours IN (SELECT id_cours FROM cours WHERE nom_cours ='".$nom_cours."')))";

            $req = $db->query($query);
            while($log = $req->fetch()){
              echo '<option value="'.$log[0].'">'.$log[0];
           }
           echo '</SELECT><input type="submit" name="expert_btn" ></form>';
           echo '</td>';
           echo '</tbody>';

        }
        if (isset($_POST['expert_btn'])){
          $nom_expert = $_POST['expert'];
          $sous_requ = '(SELECT id_personne FROM personne WHERE nom ="'.$nom_expert.'" LIMIT 1)';
          $sql = 'UPDATE demande SET id_expert ='.$sous_requ.' WHERE id_demande = '.$sous_requ;
          $db->prepare($sql)->execute();
        }

      ?>

       </table>
      <br>
      <br>
      <br>
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
      <form class="form-group" method="post" action="professeur.php">
        <?php
            echo '';
            echo '<SELECT name="reçu" size=1>';
            try{
              $qry = "SELECT eleve_concerne FROM demande ";
              $req = $db->query($qry);
              while($log = $req->fetch()){
                echo '<option value="'.$log[0].'">'.$log[0];
              }
            }catch(PDOExeption $e){
              echo "erreur de connection à la BDD";
            }
            echo '</SELECT></br></br>';
            echo '<input type="submit" name="btn_recu" >';
         ?>
    </form>
    <!--
      Select le comptes rendu
    -->

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

</body>
