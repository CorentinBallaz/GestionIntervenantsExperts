

  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="background-color:#C4E8D9;">
      </html>
      <!DOCTYPE html>
      <html lang="fr">
      <head>
        <title>New compte</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      </head>
      <body>

        <h1 class="alert alert-success">Accueil</h1>
        <p>Creation de compte Gesty</p>

      <center><form class="form-group" method="post" action="Accueil.php">
        Votre login : <input  type="text" class="form-control" name="login" required>
        <br/>
        Votre mtdp : <input type="password" class="form-control" name="pwd" required><br />
        Votre Nom : <input type="text" class="form-control" name="nom" required><br />
        Votre Prenom : <input type="text" class="form-control" name="prenom" required><br />
        <INPUT type= "radio" name="type" value="etudiant" checked> Etudiant
        <INPUT type= "radio" name="type" value="professeur"> Professeur
        <INPUT type= "radio" name="type" value="expert"> Expert
        <br/>
      <input type="submit" name="Creation" class="btn btn-dark">
      </form>
      <a class="p-3 mb-2 bg-dark text-white" href="Creation_compte.php">Pas de compte ?</a>
      </center>
      </body>
      </html>
    </div>
    <div class="col-sm-4"></div>
  </div>
