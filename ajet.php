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




?>


<!DOCTYPE html>
<html>
<head>
	<title>Ajouter un étudiant</title>
  <script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<meta charset="utf-8">
   <link rel="stylesheet" href="ajoustyle.css">
   <link rel="icon" type="image/png" href="l.ico">

<link rel="stylesheet" href="chefst.css">
<a href="index.php"> <img src="l.png" height="150px" width="150px"  ></a>
 <div id="myNav" class="overlay">
 
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <a class="active" href="base1.php">Mon Acceuil</a>
  <a class="active" href="jours.php">Génération</a>
  <a class="active" href="#">Ajouter les profiles d'enseignants</a>
  <a class="active" href="#">Ajouter les profiles d'etudiants</a>
  
  
  <a> <form  method="POST"><button name="logout">Déconnecter  </button></form></a>
  </div>
  </div>
  <span style="font-size:40px;cursor:pointer;color:#f15a22;position:absolute;right: 10px " onclick="openNav()">&#9776;</span>
  <style>


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
  top: 15%;
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
<div>
	<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
</head>
<body>

	<h1 style="color: #f15a22;text-align:center; text-shadow: 0px 0px 4px #ffb3b3;position:relative;padding:5px;
margin:3px;display:block;margin-top: -70px;margin-bottom: 50px;
  font-family: Kristen ITC, cursive;
  font-style: italic;
  font-size:25px;
  font-weight:bold;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  text-shadow:1px 1px 0px #5a7391;"> Bienvenue sur votre profile</h1>
	
<div class="header">
	<h2>Ajouter un étudiant</h2>
</div>
<nav class="nav">    

<ul>
  <hr>
  <li><a class="active" href="chef.php">Mon profile</a></li><hr>
  <li><a class="active" href="#">Profiles des enseignants</a></li><hr>
  <li><a class="active" href="#">Profiles des enseignants</a></li><hr>  
</ul>
</nav>
<form method="post">
	<center>
	<div class="input-group">
		<label>Nom</label>
		<input type="text" name="nom" value="">
	</div>
	<div class="input-group">
		<label>Prénom</label>
		<input type="text" name="prenom" value="">
	</div>
	<div class="input-group">
		<label>Mot de passe</label>
		<input type="password" name="passe">
	</div>
	<div class="input-group">
		<label>Niveau </label>
		 <?php 
    require'mysql.php';
   $sql = "SELECT * FROM year ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='niv'>";echo "<option> </option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){
  
  echo "<option>".$row['name_year'];
  echo "</option>";
  
  }}
  echo "</select>";
  ?>
	</div>
  <div class="input-group">
    <label>Section</label>
     <?php

     $sql2 = "SELECT name_g FROM groupe ; "; 
    $res2 = mysqli_query($connection,$sql2)or die("invalid ");
    echo "<select name='sec'>";echo "<option> </option>";
    if ($res2) {
 while($row2 = mysqli_fetch_array($res2)){
   


  echo "<option>".$row2['name_g'];
  echo "</option>";
  }}echo "</select>";
  ?>
  
  </div>
  <div class="input-group">
    <label>Groupe</label>
       <?php 
    $sql3 = "SELECT name_sub_g FROM sub_groupe  ; "; 
    $res3 = mysqli_query($connection,$sql3)or die("invalid ");
    echo "<select name='grb'>";echo "<option> </option>";
    if ($res3) {
 while($row3 = mysqli_fetch_array($res3)){
  
    
  echo "<option>".$row3['name_sub_g'];
  echo "</option>";

}}
echo "</select>";
  ?>
  </div>
  <div class="input-group">
    <label>Département</label>
    <input type="text" name="depart">
  </div>
		
	<div class="input-group"><center>
		<button type="submit" class="btn">Valider</button>
		</center></center>
	</div>

</form>
</body>
</html>
	<!--form method="POST">
		<label>Nom <input type="text" name="nom"/></label><br/>
		<label>Prénom <input type="text" name="prenom"/></label><br/>
<label>Mot de passe: <input type="password" name="passe"/></label><br/>

<label>Département: <input type="text" name="depart"/></label><br/>
<label>Type: <input type="text" name="type" placeholder="ensaignant/etudiant" /></label><br/>
<input type="submit" value="Valider"/>
	</form-->
</div>

<?php  


$host="localhost";
$user="root";
$password="";
$data="edt2";


$link = mysqli_connect( 'localhost', 'root', '','edt2');


$connection = mysqli_connect($host,$user,$password,$data);
if(!$connection) die("Data Base Error");
if((isset($_POST['nom']))&&(isset($_POST['prenom']))&&(isset($_POST['passe']))&&(isset($_POST['depart'])) &&(isset($_POST['niv'])) &&(isset($_POST['sec'])) &&(isset($_POST['grb']))){  
if((!empty($_POST['nom']))&&(!empty($_POST['prenom']))&&(!empty($_POST['passe']))&&(!empty($_POST['depart'])))
 { 
    $nom=$_POST['nom'];  
    $prenom=$_POST['prenom'];
    $passe = $_POST['passe'];
	$depart = $_POST['depart'];
	$type="etudiant";
  $nin = $_POST['niv'];
  $sec = $_POST['sec'];
   $grb = $_POST['grb'];  

  $req="   INSERT INTO val_ens (id_user,nom,prenom,password_ens,depart,type,niv,sec,grb)
  VALUES  ('', '".$nom."', '".$prenom."','".$passe."','".$depart."','".$type."','".$niv."','".$sec."','".$grb."') ";
  $result = mysqli_query($connection,$req)or die("false");
  //if($result){echo "inser valid";}
}}

?>

</body>
</html>