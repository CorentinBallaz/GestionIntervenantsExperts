

<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="background-color:#C4E8D9;">
    </html>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
      <title>Accueil</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>

      <h1 class="alert alert-success">Accueil</h1>
      <p>Compte de Gesty</p>

    <center><form class="form-group" method="post" action="login.php">
      Votre login : <input  type="text" class="form-control" name="login" required>
      <br />
      Votre mtdp : <input type="password" class="form-control" name="pwd" required><br />
    <input type="submit" name="Connexion" class="btn btn-dark">
    </form>
    <a class="p-3 mb-2 bg-dark text-white" href="Creation_compte.php">Pas de compte ?</a>
    </center>
    </body>
    </html>
  </div>
  <div class="col-sm-4"></div>
</div>

<?php


try{
  $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');

  if (isset($_POST['Creation']))
  {
    $id = "NULL";
    $sql = "INSERT INTO personne (id_personne, nom,prenom ,login, mot_de_passe, type) VALUES (?,?,?,?,?,?);";
    $db->prepare($sql)->execute([$id,$id, $id, $_POST['login'],$_POST['pwd'], $_POST['type']]);
    

  }
}catch(PDOExeption $e){
  echo "erreur de connection à la BDD";
}
?>
