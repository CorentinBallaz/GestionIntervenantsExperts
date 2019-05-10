<?php
session_start();
if ((isset($_POST['login'])) && (isset($_POST['pwd']))) {
  $utilisateur = "Professeur";
	// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['pwd'] = $_POST['pwd'];
  echo"Bonjour ";
  echo "<br>";
  echo $_SESSION['login'];
  echo "<br>";
  //header('location: login.php');
  if ($utilisateur == "Etudiant"){
    echo '<a href="etudiant.php">Page etudiant</a>';
  }else if($utilisateur == "Professeur"){
    echo '<a href="professeur.php">Page prof</a>';;
  }else if($utilisateur == "Expert"){
    echo '<a href="expert.php">Page expert</a>';
  }

}else{
  echo "Non connecté";
}


?>
