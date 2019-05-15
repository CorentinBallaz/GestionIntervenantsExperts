<?php
session_start();
if ((isset($_POST['login'])) && (isset($_POST['pwd']))) {
   	$_SESSION['login'] = $_POST['login'];
    $_SESSION['pwd'] = $_POST['pwd'];

  try{
    $db = new PDO('mysql:host=localhost;dbname=gestionintervenantsexperts','root','');
    $qry = "SELECT login,mot_de_passe FROM personne ";
    $req = $db->query($qry);
    while($log = $req->fetch()){
      // echo $log[1];
      // echo " ";
      // echo $log[0];
      // echo "</br>";
      if($_SESSION['login'] == $log[0] && $log[1]==$_SESSION['pwd']){
        //////////////////////////////////////////////////////////////
        ///////////////////////////// ICI LES INFORMATIONS DE LA PAGE
        /////////////////////////////////////////////////////////////
        echo "Bonjour Mr ";
        echo $_SESSION['login'];
        $qry = 'SELECT type FROM personne WHERE login = "'.$_SESSION['login'].'"';
        //echo $qry;
        //on recupere le type ( etudiant ,expert , prof )
        $req = $db->query($qry);
        while($log = $req->fetch()){
          $_type = $log[0];
        }
        echo "</br>";
        echo "Je suis un ".$_type ;
        echo "</br>";
        if ($_type == "Etudiant"){
            echo '<a href="etudiant.php">Page etudiant</a>';
          }else if($_type == "Professeur"){
            echo '<a href="professeur.php">Page prof</a>';;
          }else if($_type == "Expert"){
            echo '<a href="expert.php">Page expert</a>';
          }

      }
    }
  }catch(PDOExeption $e){
      echo "erreur de connection à la BDD";
    }
}

  //   $utilisateur = "Professeur";
  // 	// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)

  //   echo"Bonjour ";
  //   echo "<br>";
  //   echo $_SESSION['login'];
  //   echo "<br>";
  //
  //   //header('location: login.php');
  //   if ($utilisateur == "Etudiant"){
  //     echo '<a href="etudiant.php">Page etudiant</a>';
  //   }else if($utilisateur == "Professeur"){
  //     echo '<a href="professeur.php">Page prof</a>';;
  //   }else if($utilisateur == "Expert"){
  //     echo '<a href="expert.php">Page expert</a>';
  //   }
  //
  // }else{
  //   echo "Non connecté";
  // }



?>
