
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

     .form-group{

     	width: : 80px;
     }
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 750px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
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


  <div class="btn-group btn-group-justified">
  <a href="#" class="btn btn-primary">Demande Reçu</a>
  <a href="#" class="btn btn-primary">Compte Rendu Reçu</a>

</div>
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-4 sidenav">
    	<!-- pour affichage des élement -->
      <!--<p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>-->

      <h2> Demande Reçu</h2>
      <br>
      <br>
      <div class="list-group">
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">First List Group Item Heading</h4>
    <p class="list-group-item-text">List Group Item Text</p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Second List Group Item Heading</h4>
    <p class="list-group-item-text">List Group Item Text</p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Third List Group Item Heading</h4>
    <p class="list-group-item-text">List Group Item Text</p>
  </a>
</div>
    </div>

    <div class="form-group">
  	<div class ="col-xs-8">
    <div class="col-sm-8 text-left">
      <h2>Details de la demande </h2>

   <!-- <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>-->

  <br>
  <br>
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
  <br>

  	</div>
  	<div class ="col-xs-4">
  <label for="sel1">Select list:</label>
 <select multiple class="form-control" id="sel2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
  </div>
  </div>
</div>
</div>



</div>


  <form class="form-group" method="post" action="professeur.php">
    Domaine :
    <SELECT name="Domaine" size="1">
    <?php
    $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
    $qry = 'SELECT nom_cours FROM cours';
    //echo $qry;
    //on recupere le type ( etudiant ,expert , prof )
    $req = $db->query($qry);
    while($log = $req->fetch()){
      $Domaine = $log[0];
      echo $Domaine;
      echo "<option>".$Domaine;
    }
     ?>
    </SELECT>
    <br />
  <input type="submit" name="Domaine1" class="btn btn-dark">
 </form>
 <?php
    isset($_POST['C'])
 ?>


</body>
