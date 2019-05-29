
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
        body, html {
  height: 100%;
}

      .background {
  /* The image used */
  background-image: url("fond.png");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
   background-size: cover;
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

<div class="background">
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

  <input type="submit" name="Domaine1" class="btn btn-info">
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
           //   $qry = 'SELECT prenom,etat FROM demande FULL JOIN personne ON id_eleve = personne.id_personne WHERE etat="transmis" ';
              $qry = 'SELECT prenom from personne where id_personne in (select id_eleve from demande where etat = \'transmis\')';
              $req = $db->query($qry);
              while($log = $req->fetch()){
                echo '<option value="'.$log[0].'">'.$log[0];
              }
            }catch(PDOExeption $e){
              echo "erreur de connection à la BDD";
            }
            echo '</SELECT></br></br>';
            echo '<input type="submit" name="info" class="btn btn-info" >';
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
        <th>Domaine d'expertise</th>
        <th>description</th>
        <th>Nombre d'élève <br> concernés</th>
        <th>Selectionner une <br> demande  (1 à la fois)</th>

      </tr>
    </thead>
    <form  class="form-group" method = "post" action=" ModifbyProf.php">
    <?php
        if(isset($_POST['info'])){
          echo '<tbody>';
         // $qry = 'SELECT nom_cours ,description,etat, id_eleve FROM demande FULL JOIN cours ON id_cours_concerne = id_cours WHERE id_eleve =(SELECT id_personne FROM personne WHERE prenom ="'.$_POST['eleve_c'].'" AND etat = "transmis")';
          $qry = 'SELECT nom_expertise, description, nb_eleve_concerne, id_eleve,id_demande,id_domaine_expertise FROM demande d, domaine_expertise de WHERE (id_eleve in (select id_personne from personne where prenom = "'.$_POST['eleve_c'].'") and d.etat =\'transmis\' and de.id_domaine=d.id_domaine_expertise)';
          $req = $db->query($qry);
          $nom_cours = "";
          $eleve="";
          while($log = $req->fetch()){
            echo '<tr>';
            echo '<td>'.$log[0].'</td>';
            $nom_cours = $log[0];
            echo '<td>'.$log[1].'</td>';
            echo '<td>'.$log[2].'</td>';
//            echo '<td>'.$log[3].'</td>';
            echo "<td><input type=\"checkbox\" id=\"choix\" name=\"choix[]\" value=\"".$log[4]."\"></td>\n";
            $_SESSION['eleve']=$log[3];


          //  $qry2 = "SELECT nom FROM personne WHERE id_personne IN (SELECT id_expert FROM estexpert WHERE id_domaine IN (SELECT id_domaine FROM domaine_expertise WHERE id_cours IN (SELECT id_cours FROM cours WHERE nom_cours ='".$nom_cours."')))";
            $qry2 = 'SELECT nom,id_personne from personne where id_personne in (SELECT id_expert from estexpert where id_domaine ='.$log[5].' )';
            $req2 = $db->query($qry2);
            echo '<td><SELECT name="expert'.$log[4].'" size=1><\td>\n';
            while($log1 = $req2->fetch()){
              echo '<option value="'.$log1[1].'">'.$log1[0];
           }
            echo '</tr>';
          }



        }

           // echo '<td>';
            /*
            echo '<SELECT name="expert" size=1>';
            $query = "SELECT nom FROM personne WHERE id_personne IN (SELECT id_expert FROM estexpert WHERE id_domaine IN (SELECT id_domaine FROM domaine_expertise WHERE id_cours IN (SELECT id_cours FROM cours WHERE nom_cours ='".$nom_cours."')))";

            $req = $db->query($query);
            while($log = $req->fetch()){
              echo '<option value="'.$log[0].'">'.$log[0];
           }

           echo '</td><td>';
           echo '</SELECT><input type="submit" name="expert_btn" class="btn btn-info" ></td></form>';
           echo '</tbody>';

        }
        if (isset($_POST['expert_btn'])){
          $nom_expert = $_POST['expert'];
          $sous_requ = '(SELECT id_personne FROM personne WHERE nom ="'.$nom_expert.'")';

          $eleve = $_SESSION['eleve'];
          $sql = 'UPDATE demande SET id_expert ='.$sous_requ.' WHERE id_eleve = "'.$eleve.'"';
          $db->prepare($sql)->execute();
          $sql = 'UPDATE demande SET etat = "valide" WHERE id_eleve = "'.$eleve.'"';
          $db->prepare($sql)->execute();
        }
*/


      ?>

       </table>

          <button type="submit" class="btn" name = "Valider">Valider</button>
        </form>
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
              echo '<SELECT name="eleve_c2" size=1>';
              try{
                $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
                $qry = 'SELECT prenom,etat FROM demande FULL JOIN personne ON id_eleve = personne.id_personne WHERE etat="renseigne" ';
                $req = $db->query($qry);
                while($log = $req->fetch()){
                  echo '<option value="'.$log[0].'">'.$log[0];
                }
              }catch(PDOExeption $e){
                echo "erreur de connection à la BDD";
              }
              echo '</SELECT></br></br>';
              echo '<input type="submit" name="info2" class="btn btn-info" >';
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
        <th>Durée de l'intervention</th>
        <th>Retour</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if(isset($_POST['info2'])){
      echo '<tbody>';
      $qry = 'SELECT id_demande,duree, retour FROM demande WHERE (id_eleve =(SELECT id_personne FROM personne WHERE prenom ="'.$_POST['eleve_c2'].'") and etat = "renseigne")';
      $req = $db->query($qry);
      $nom_cours = "";


      while($log = $req->fetch()){
        echo '<tr>';
        echo '<td>'.$log[1].'</td>';
        echo '<td>'.$log[2].'</td>';
        $_SESSION['elevec2']=$log[0];
        echo '</tr>';
      }
      echo '<tr>';
      echo '<td>'." Archivage des données".'</td>';
      echo '</tr>';
      echo '<tr><td>
      <form class="form-group" method="post" action="professeur.php">
        <input type="submit" name="archi" class="btn btn-info">
      </form></td></tr>';

    }
    if(isset($_POST['archi'])){

      $elevec2 = $_SESSION['elevec2'];
      $sql = 'UPDATE demande SET etat = "archive" WHERE id_demande = "'.$elevec2.'"';
      //echo $sql;
      $db->prepare($sql)->execute();
    }

       ?>
       </tbody>
  </table>
  <br>
  <br>
  <br>


  </div>
</div>
</div>

</div>

</body>
