<?php
 session_start();
 if(empty($_SESSION['user']))
 {
   header('location:index.php?err=please login first');
  
 }

 //echo "helow ".$_SESSION['user'];
 
  /* if($_SERVER['REQUEST_METHOD']=="POST"){
     session_destroy();
     header('location:index.php');
   }*/
?> 

<!--<?php
include("csv.php");
$csv = new csv() ;
if(isset($_POST['sub'])){
	$csv->Import($_FILES['file']['tmp_name']);
	//var_dump($_FILES['file']);
  }
if (isset($_POST['exp'])) {
	$csv->export();
}
?>
!-->

<!DOCTYPE html>
<html>
<head>
    <title>Apprenants</title>
    <meta charset="utf-8">
   
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

 <div id="myNav" class="overlay">
 
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <a class="active" href="base1.php">Mon Acceuil</a>
  <a class="active" href="jours.php">Génération</a>
  <a class="active" href="ajouter.php">Ajouter les profiles d'enseignants</a>
  <a class="active" href="ajet.php">Ajouter les profiles d'etudiants</a>
  
  
  <a> <form  method="POST"><button>Déconnecter  </button></form></a>
  </div>
  </div>
  <span style="font-size:40px;cursor:pointer;color:#f15a22;position:absolute;right: 10px " onclick="openNav()">&#9776;</span>
<img src="l.png" height="100px" width="100px" style="position: absolute;left: 5px;top: 5px">
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
     &nbsp;&nbsp;&nbsp;&#8223;génération automatique,essai gratuit <br>, facile, rapide, entièrement en ligne.&#8221;<br><br>Gestion d'apprenants </h1>
     <br>
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

  <form method="POST">
 <div class="table">
  <h3 style="color: #990000">&#10148; Insérer les niveau avec ses spécialité puis les sections et les groupes :</h3> 
  Niveau : <input type="text" name="niveau" placeholder="exp:L3_informatique" required>&nbsp;&nbsp;

   

  <br>

 Nombre de section: <input type="text" name="section" placeholder="insérer le nombre de section " required>&nbsp;&nbsp;
   Nombre d'apprenants : <input type="text" name="nbstd" placeholder="insérer le nbr maximum d'apprenants dans la section" required>&nbsp;&nbsp;

    <br>

  Nombre de group par section: <input type="text" name="group" placeholder="insérer un module" required>&nbsp;&nbsp;

Nombre d'apprenants : <input type="text" name="nbgp" placeholder="insérer le nbr maximum d'apprenants dans les groupes" required>&nbsp;&nbsp;
    <br><br>

     
<input type="submit" name="insérer" value ="insérer"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu">
  <?php  



//error_reporting(E_ALL | E_ALL);
require "mysql.php" ;
if(isset($_POST['insérer'])){


 
    $niveau=$_POST['niveau'];  
    
  $quiry="   INSERT INTO year (id_year,name_year,nbr_stdt)  VALUES  (NULL, '".$niveau."',''); ";
  $result = mysqli_query($connection,$quiry);
  


  
  $section=$_POST['section'];
    $nb=$_POST['nbstd'];
    $group=$_POST['group'];
    $nbg=$_POST['nbgp'];
    for ($i=1; $i <=$section ; $i++) { 
         $p= $niveau." section ";
         $n=$p.$i;
      # code...
        $quiry1="INSERT INTO groupe (id_groupe,name_g,id_year,nbr_std) VALUES (NULL,'".$n."',(SELECT id_year FROM year WHERE name_year ='$niveau'),'".$nb."'); ";
     $result1 = mysqli_query($connection,$quiry1);
  
        for ($j=1; $j <=$group ; $j++) { 
          # code...
            $s="G".$j." ".$n;
        $quiry2="INSERT INTO sub_groupe (id_sub_groupe,name_sub_g,id_groupe) VALUES (NULL,'".$s."',(SELECT id_groupe FROM groupe WHERE name_g='$n')); ";
     $result2 = mysqli_query($connection,$quiry2);
  }}


}
?>
       
     <h4 style="color: #990000">&#10148; Vous pouvez importer les enseignants par des fichiers csv :</h4>       
   Importer les apprenants: <input type="file" name="file" > 
   <input type="button" name="mod" value ="import"style="font-size: 20px;
  background-color:#ffcc99 ;  

  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu">
  <br>
   </div>
  <!--
   <div class="table-responsive">          
        <table class="table">
       <thead>
      <tr>
    
        <th>Niveau</th>
        
        <th>Section</th>
        <th>Groupe</th>


      </tr>
       </thead>
        <tbody>
      <tr>
         <?php 
 
require "mysql.php" ;

$quiry2="  SELECT DISTINCT * FROM year GROUP BY id_year ; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
while  
   ($row = mysqli_fetch_array($result2)){ 
    //echo "<tr>";

 echo "<td>" . $row['name_year'] . "</td>";
 

$sq="SELECT count(*)AS roww FROM groupe GROUP BY id_year;";
$rr=mysqli_query($connection,$sq);
while ($rro = mysqli_fetch_assoc($rr)) {
  # code...


$numr=$rro['roww'];

echo "<td>" . $numr . "</td>";}
}


 $q="SELECT count(id_sub_groupe)AS row FROM sub_groupe  GROUP BY id_groupe; ";
$r=mysqli_query($connection,$q);
while ($ro = mysqli_fetch_assoc($r)
) {

  # code...
$num=$ro['row'];

echo "<td>" . $num . "</td>";}

//echo "<td>" . $row['matiere_qualifie'] . "</td>";
//echo "<td>"."<a href ='modens.php?id=". $row['id_teacher'] ." class'submit'> "."modifie"."</a>". "&nbsp;&nbsp;&nbsp;"."<a href ='supens.php?id=". $row['id_teacher'] ." class='submit'> "."supprimer"."</a>"."</td>";
//echo "</tr>"; 
} 





?>                                                                           
        
        
        
         </tr>
       

        </tbody>
  </table>
  </div>
 !-->

<a href="activité.php"><input type="button" name="" value="suivant" style="float:right;position: relative;margin: 20px;" class="submit">  </a>
    
    
</form> </div>
		

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