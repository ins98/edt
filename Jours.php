<?php

 session_start(); 
 if(empty($_SESSION['user']))
 {
	 header('location:index.php?err=please login first');
 	
 }

 //echo "helow ".$_SESSION['user'];
 
   if(isset($_POST['logout'])){
	   session_destroy();
	   header('location:index.php');
   }

   $host="localhost";
$user="root";
$password="";
$data="edt2";

$link = mysqli_connect( 'localhost', 'root', '','edt2');


$connection = mysqli_connect($host,$user,$password,$data);
if(!$connection) die("Data Base Error");

if(isset($_POST['submit'])){  
if(isset($_POST['name_univ']) && isset($_POST['nbr_hrs'])) 
  {     
    $name_univ=$_POST['name_univ'];
    $nbr_days=$_POST['nbr_days'];
    $nbr_hrs=$_POST['nbr_hrs'];
   
 
  $quiry=" INSERT INTO ddb (id, Institution_Name, nbr_days, nbr_hrs)
 VALUES (NULL, '".$name_univ."', '".$nbr_days."', '".$nbr_hrs."') ;";
// WHERE NOT EXISTS (SELECT * FROM ddb WHERE Institution_Name = '".$name_univ."' AND nbr_days = '".$nbr_days."' AND nbr_hrs = '".$nbr_hrs."'); ";

  $result = mysqli_query($connection,$quiry)or die("invalid ");

 for ($i=0; $i <= $nbr_days; $i++) { 
   if (isset($_POST['j'.$i])) {
     $j[$i]=$_POST['j'.$i];
   
   //WHERE NOT EXISTS (SELECT id FROM test WHERE text = 'toto');


$quiry2=" INSERT INTO day (id,name_d) VALUES  (NULL, '".$j[$i]."') ; ";
//WHERE NOT EXISTS (SELECT * FROM day WHERE name_d = '".$j[$i]."') 

  $result2 = mysqli_query($connection,$quiry2);
  }  } 

for ($j=0; $j <= $nbr_hrs; $j++) { 
   if (isset($_POST['h'.$j])) {
     $h[$j]=$_POST['h'.$j];
   
 $quiry3="  INSERT INTO hour (id,name_h) VALUES  (NULL, '".$h[$j]."');";
// WHERE NOT EXISTS (SELECT * FROM hour WHERE name_h = '".$h[$j]."')  
  $result3 = mysqli_query($connection,$quiry3);


  }  } 




  
mysqli_close($connection);
}}


?> 
<!DOCTYPE html>
<html>
<head>
    <title>Données de base</title>
  <meta charset="utf-8">   
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="l.ico"> 
  <link rel="stylesheet" href="styleJ.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="stylebase1.css">
<style>
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>



</head>


<body>


<div id="myNav" class="overlay">
 
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <a class="active" href="base1.php">Mon Acceuil</a>
  <a class="active" href="jours.php">Génération</a>
  <a class="active" href="ajouter.php">Ajouter les profiles d'enseignants</a>
  <a class="active" href="ajet.php">Ajouter les profiles d'etudiants</a>
  
  
  <a> <form  method="POST"><button name="logout">Déconnecter  </button></form></a>
  </div>
  </div>

<span style="font-size:40px;cursor:pointer;color:#f15a22; position:absolute; right: 10px " onclick="openNav()">&#9776;</span>

<img src="l.png" height="150px" width="150px" style="position: absolute;left: 5px;top: 5px">
<br>
<h1 style="color: #f15a22;text-align:center; text-shadow: 0px 0px 4px #ffb3b3;position:relative;padding:5px;
margin:3px;display:block;
  font-family: Comic Sans MS, Comic Sans, cursive;
  font-style: italic;
  font-size:25px;
  font-weight:bold;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  text-shadow:1px 1px 0px #fa8072;">EDT :  Emploi du temps universitaire en ligne 
     <br>
     &nbsp;&nbsp;&nbsp;&#8223;génération automatique,essai gratuit<br> facile, rapide, entièrement en ligne.&#8221; <br><br>
   Les données de base</h1>
     

<nav class="nav">    

<ul>
<hr>
  <li><a class="active" href="Jours.php">Jours/Heures </a></li><hr>
  <li><a class="active" href="Matieres.php">Matieres</a></li><hr>
  <li><a class="active" href="Enseignants.php">Enseignants</a></li><hr>
  <li><a class="active" href="Apprenant.php">Apprenants</a></li><hr>
  <li><a class="active" href="activité.php">Activités</a></li><hr>
  <li><a class="active" href="salles.php">Salles</a></li><hr>
  <li><a class="active" href="contr.php">Contraintes</a></li><hr>
  <li><a class="active" href="Emplois.php">Générer</a></li><hr>
</ul>
</nav>

<div class="table">
	<form method="POST">
		<h4 style="color: #990000">&#10148; Insérer le nom d'établissement et définir les jours/heures de travail :</h4> 
	Nom Etablisssement :<input type="text" name="name_univ" required><br>

	Nombre de jours par semaine :<input type="text" name="nbr_days" value="" required><br>
	<br><br>
  Les jours :<br>
 
 <input list="j1" name="j1">
  <datalist id="j1">
    <option value="Samdi">
    <option value="Dimanche">
  </datalist>
  <input list="j2" name="j2">
  <datalist id="j2">
    <option value="Dimanche">
    <option value="Lundi">
  </datalist>
<input list="j3" name="j3">
  <datalist id="j3">
    <option value="Lundi">
    <option value="Mardi">
  </datalist>
  <input list="j4" name="j4">
  <datalist id="j4">
    <option value="Mardi">
    <option value="Mercredi">
  </datalist>
  <input list="j5" name="j5">
  <datalist id="j5">
    <option value="Mercredi">
    <option value="Jeudi">
  </datalist>
  <input list="j6" name="j6">
  <datalist id="j6">
    <option value="Jeudi">
  </datalist>
<!--
	 <input type="month" name="j1" placeholder="jour1" required>
    <input type="button" onclick="alert('Hello World!')" value="?"> 
	 <input type="text" name="j2" placeholder="jour2" required>
	 <input type="text" name="j3" placeholder="jour3" required>
	 <input type="text" name="j4" placeholder="jour4" required>
	 <input type="text" name="j5" placeholder="jour5" required>
	 <input type="text" name="j6" placeholder="jour6" >
	!-->

	 <br><br><br>
	
	Nombre de périodes par jour :<input type="text" name="nbr_hrs" value="" required>
	       
	<br>
	Heure1<input type="text" name="h1" placeholder="00:00-00:00" required>
	Heure2<input type="text" name="h2" placeholder="00:00-00:00" required>
	Heure3<input type="text" name="h3" placeholder="00:00-00:00" required><br>
	Heure4<input type="text" name="h4" placeholder="00:00-00:00" required>
	Heure5<input type="text" name="h5" placeholder="00:00-00:00" >
	Heure6<input type="text" name="h6" placeholder="00:00-00:00" ><br>
	Heure7<input type="text" name="h7" placeholder="00:00-00:00"> 
	Heure8<input type="text" name="h8" placeholder="00:00-00:00"> 
	Heure9<input type="text" name="h9" placeholder="00:00-00:00"> 
	<br><br><br>
	 
	 <br>
  <input type="submit" name="submit"  value="valider" style="float:right" class="submit">	 
 <a href="Matieres.php"> <input type="button" name="suivant"  value="suivant" style="left: 75%" class="submit"></a>
<br><br><br><br>
</div>
</form>




<script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
</body>
</html>