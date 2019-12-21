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



?> 
<!DOCTYPE html>
<html>
<head>
    <title>EDT</title>
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
  <a class="active" href="#">Ajouter les profiles d'enseignants</a>
  <a class="active" href="#">Ajouter les profiles d'etudiants</a>
  
  
  <a> <form  method="POST"><button name="logout">Déconnecter  </button></form></a>
  </div>
  </div>

<span style="font-size:40px;cursor:pointer;color:#f15a22; position:absolute; right: 10px " onclick="openNav()">&#9776;</span>

<img src="l.png" height="200px" width="200px" style="position: absolute;left: 5px;top: 5px">
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
  text-shadow:1px 1px 0px #fa8072;">EDT :  Emplois du temps universitaire en ligne 
     <br>
     &nbsp;&nbsp;&nbsp;&#8223;génération automatique,essai gratuit<br> facile, rapide, entièrement en ligne.&#8221; <br><br>
   Crée Votre Emplois du Temps</h1>
     

<nav class="nav">    

<ul>
<hr>
  
</ul>
</nav>

<div class="table">
	

  <h2>Voire Votre Données : </h2>
  <details> 
    <div class="table-responsive">          
        <table class="table" style="margin-left: -30px;">
       <thead>
      <tr>
        
        
        <th>Nom de module</th>
        <th>Spécialité</th>
        
        <th></th>
        

      </tr>
       </thead>
        <tbody>
      <tr>
        <?php 
 
require "mysql.php" ;
$quiry2="  SELECT DISTINCT * FROM subject GROUP BY name_s ; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  
  echo "<tr>";
  


echo "<td>" . $row['name_s'] . "</td>";
echo "<td>" . $row['specialite'] . "</td>";
echo "<td>"."<a href ='update.php?id=". $row['id_s'] ." class='submit'> "."modifie"."</a>". "&nbsp;&nbsp;&nbsp;"."<a href ='delete.php?id=". $row['id_s'] ." class='submit'> "."supprimer"."</a>"."</td>";


echo "</tr>";
echo "</form>";
 }
}





 
?>                                                                       
        
        
        
         </tr>
       

        </tbody>
  </table>
  </div>
  <summary>La liste des matieres:</summary>
  </details>
<br>
 <details> <div class="table-responsive">          
        <table class="table" style="margin-left: -30px;">
       <thead>
      <tr>
        <th>Nom d'nseignant</th>
        <th>Matières qualifiées</th>
        <th></th>
        

      </tr>
       </thead>
        <tbody>
      <tr>
        <?php 
 
require "mysql.php" ;

$quiry2="  SELECT DISTINCT * FROM teacher GROUP BY name_t; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['name_t'] . "</td>";
echo "<td>" . $row['matiere_qualifie'] . "</td>";
echo "<td>"."<a href ='modens.php?id=". $row['id_t'] ." class'submit'> "."modifie"."</a>". "&nbsp;&nbsp;&nbsp;"."<a href ='supens.php?id=". $row['id_t'] ." class='submit'> "."supprimer"."</a>"."</td>";
echo "</tr>";
 }
}
 
?>                                                                  
  
        
         </tr>
       

        </tbody>
  </table>
  </div>
  <summary>La liste des enseignants:</summary>
  </details>

<br>



 <details>
  <div class="table-responsive">          
        <table class="table" style="margin-left: -30px;">
       <thead>
      <tr><td>Activitées</td></tr>
      <tr>
        <th>N°</th>
        <th>Enseignant</th>
        <th>Module</th>
        <th>Apprenant</th>
        <th>Type</th>
        <th>Dure</th>
        
        <th></th>
        

      </tr>
       </thead>
        <tbody>
      <tr>
        <?php 
 
require "mysql.php" ;
$quiry2="  SELECT DISTINCT * FROM activity GROUP BY id_activity ; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['id_activity'] . "</td>";
echo "<td>" . $row['name_t'] . "</td>";
echo "<td>" . $row['name_s'] . "</td>";
echo "<td>" . $row['id_student'] . "</td>";
echo "<td>" . $row['name_tag'] . "</td>";
echo "<td>" . $row['dure'] . "</td>";
echo "<td>"."<a href ='modact.php?id=". $row['id_activity'] ." class'submit'> "."modifie"."</a>". "&nbsp;&nbsp;&nbsp;"."<a href ='supact.php?id=". $row['id_activity'] ." class='submit'> "."supprimer"."</a>"."</td>";
echo "</tr>";
 }
}

 
?>                                                                       
        
        
        
         </tr>
       

        </tbody>
  </table>
  </div>
  <summary>La liste des avtivitées:</summary>
  </details>    

<br>
 <details>
  <div class="table-responsive">          
        <table class="table" style="margin-left: -30px;">
       <thead>
      <tr>
        <th>Salles</th>
        
        <th>Type</th>
        <th>la capacité</th>
        <th></th>
     

      </tr>
       </thead>
        <tbody>
      <tr>
        <?php 
 
require "mysql.php" ;
$quiry2="  SELECT DISTINCT * FROM room GROUP BY id_sal ; " ;
$result2 = mysqli_query($connection,$quiry2) or die("false");
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['name_sal'] . "</td>";
echo "<td>" . $row['type_s'] . "</td>";
echo "<td>" . $row['Capacity'] . "</td>";
echo "<td>"."<a href ='modsall.php?id=". $row['id_sal'] ." class'submit'> "."modifie"."</a>". "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<a href ='supsall.php?id=". $row['id_sal'] ." class='submit'> "."supprimer&nbsp;&nbsp;&nbsp;&nbsp;"."</a>"."</td>";
echo "</tr>";
 }
}

 
?>                                                                       
        
        
        
         </tr>
       

        </tbody>
  </table>
  </div>
 

  <summary>La liste des salles:</summary>
  </details> 

<form method="post">

 <br><br>
 <!--
 <h3>EXPORTER VOTRE DONNEES :</h3>
 <a href="fet/export.php"><input type="button" name="export" class="submit" value="exporter" style="margin-top: -10px;"></a><br>
 !-->
 <h3>GENERER LES EMPLOIS DU TEMPS :</h3>
 <a href="fet/generer.php"><input type="button" name="generer" class="submit" value="genere" style="margin-top: -10px;"></a><br>
 <h3>VOIR LES RESULTATS :</h3>
 <a href="emploi.php"><input type="button" name="result" class="submit" value="resultats" style="margin-top: -10px;"></a><br>

<?php
if(isset($_POST['vider'])){
//header('Content-Type: text/plain');

require "mysql.php" ;

$sql1 = 'DELETE FROM activity WHERE id_activity > 0 ' ;
$result1 = mysqli_query($connection, $sql1);
if($result1) { echo "delete act \n";}
$sql = "ALTER TABLE activity AUTO_INCREMENT = 1;";
$result = mysqli_query($connection, $sql);

$sql2 = 'TRUNCATE TABLE timetable;';
$result2 = mysqli_query($connection, $sql2);
if($result2) { echo "delete time\n";}
$sql3 = 'TRUNCATE TABLE day;';
$result3 = mysqli_query($connection, $sql3);
if($result3) { echo "delete dy \n";}
$sql4 = 'TRUNCATE TABLE ddb;';
$result4 = mysqli_query($connection, $sql4);
if($result4) { echo "delete ddb  \n";}


$sql12 = 'DELETE FROM year WHERE id_year > 0;';
$result12 = mysqli_query($connection, $sql12);
if($result12) { echo "delete year  \n";}
$sql = "ALTER TABLE year AUTO_INCREMENT = 1;";
$result = mysqli_query($connection, $sql);

$sql5 = 'DELETE FROM groupe WHERE id_groupe > 0;';
$result5 = mysqli_query($connection, $sql5);
if($result5) { echo "delete grb  \n";}
$sql = "ALTER TABLE groupe AUTO_INCREMENT = 1;";
$result = mysqli_query($connection, $sql);
$sql10 = 'DELETE FROM subgroupe WHERE id_sub_groupe > 0;';
$result10 = mysqli_query($connection, $sql10);
if($result10) { echo "delete sbgr  \n";}
$sql0 = "ALTER TABLE subgroupe AUTO_INCREMENT = 1;";
$result0 = mysqli_query($connection, $sql0);

$sql6 = 'TRUNCATE TABLE hour;';
$result6 = mysqli_query($connection, $sql6);
if($result6) { echo "delete hr  \n";}


$sql7 = 'DELETE FROM room WHERE id_sal > 0;';
$result7 = mysqli_query($connection, $sql7);
if($result7) { echo "delete rm  \n";}
$sql0 = "ALTER TABLE subgroupe AUTO_INCREMENT = 1;";
$result0 = mysqli_query($connection, $sql0);

$sql9 = 'DELETE FROM subject WHERE id_s  > 0;';
$result9 = mysqli_query($connection, $sql9);
if($result9) { echo "delete sbj  \n";}
$sql0 = "ALTER TABLE subgroupe AUTO_INCREMENT = 1;";
$result0 = mysqli_query($connection, $sql0);

$sql11 = 'DELETE FROM teacher WHERE id_t > 0;';
$result11 = mysqli_query($connection, $sql11);
if($result11) { echo "delete tch  \n";}
$sql0 = "ALTER TABLE subgroupe AUTO_INCREMENT = 1;";
$result0 = mysqli_query($connection, $sql0);
$sql13 = 'TRUNCATE TABLE entre_act;';
$result13 = mysqli_query($connection, $sql13);
if($result13) { echo "delete ent_ac  \n";}

$sql14 = 'TRUNCATE TABLE etud_con;';
$result14 = mysqli_query($connection, $sql14);
if($result14) { echo "delete et_c  \n";}


//if($result) { echo "delete succ";}
/*
$rows = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $rows[] = $row;
}

$n = 0;//"' . mysqli_real_escape_string($row['id']) . '"
foreach ($rows as $row) {
    $sql = 'DROP TABLE IF EXISTS "' .$rows[] . '";';
    mysqli_query($link, $sql);
    ++$n;
}

echo $n . 'tables dropped' . PHP_EOL;
//exit(__FILE__ . ': ' . __LINE__);*/
}
?>  

 <h2> SUPPRIMER TOUS :</h2>
<input type="submit" name="vider" class="submit" value="supprimer tous" style="margin-top: -10px;"><br></form>


</div>
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


