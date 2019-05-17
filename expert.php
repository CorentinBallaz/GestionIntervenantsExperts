l>
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
	




<div class="container-fluid text-center"> 

  <div class="row content">
    
    	<!-- pour affichage des élement -->
      <!--<p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>-->

      <h1> Faire une nouvelle demande </h1>
      <br>
      
     	<div class="col-sm-3 sidenav">
     	 <!--<div class="form-group">-->
     	 	<br>
     	 	<br>
		    <label for="Cours concernés">Cour Concerné</label>
		    <select class="form-control" id="exampleFormControlSelect1">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>
		  </div>
    

    <!--<div class="form-group">-->
  	<!--<div class ="col-xs-8">-->
    <div class="col-sm-3"> 
    	
     	 	<br>
     	 	<br>
		    <label for="Domaine expertise">Domaine d'expertise</label>
		    <select class="form-control" id="exampleFormControlSelect1">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>
		  
  
  	</div>
  	<div class="col-sm-3"> 
  		<br>
  		<br>
  		<label for="Domaine expertise">Nombre d'élèves </label>
		    <select class="form-control" id="exampleFormControlSelect1">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>

  	</div>

  	<div class="col-sm-3"> 
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
<!-- SPLITE -->



</div>
	</div>



</body>