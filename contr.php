<?php
error_reporting(E_ALL | E_ALL);
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


require "mysql.php" ;
//insert ens_cont
if(isset($_POST['insérer1'])){  
if(isset($_POST['ens']) && isset($_POST['nbj']) && isset($_POST['nbh']) && isset($_POST['cod']) && isset($_POST['nbhc']))
 { 
    $nbj=$_POST['nbj']; 
    $ens=$_POST['ens']; 
    $cod=$_POST['cod']; 
    $nbh=$_POST['nbh'];
    $nbhc=$_POST['nbhc'];
 
if($ens!=NULL){
  $quiry="   INSERT INTO prof_con (id_c, nb_max_jr, nb_hr_rep_jr , nb_hr_tr_cont, name_t , type_act)  VALUES  (NULL, '".$nbj."' ,'".$nbh."','".$nbhc."' , '".$ens."' ,'".$cod."'); ";
  $result = mysqli_query($connection,$quiry);
   
  //if($result) echo "insert valide" ;
}}
}
//insert et_cont

if(isset($_POST['insérer2'])){  
if(isset($_POST['et']) && isset($_POST['et_nbj']) && isset($_POST['et_nbh']))
 { 
    $et_nbj=$_POST['et_nbj']; 
    $et=$_POST['et']; 
    $et_nbh=$_POST['et_nbh'];
   
if($et!=NULL){
  $quiry2="   INSERT INTO etud_con (id_et_c, nb_mx_jrs, nb_hr_cont, id_student)
    VALUES  (NULL, '".$et_nbj."' ,'".$et_nbh."','".$et."'); ";
  $result2 = mysqli_query($connection,$quiry2);
   
//  if($result2) echo "insert valide" ;
}
}}


//insert sal_cont

if(isset($_POST['insérer3'])){  
if(isset($_POST['sal']) && isset($_POST['jr']) && isset($_POST['hr']) )
 { 
    $sal=$_POST['sal']; 
    $jr=$_POST['jr']; 
    $hr=$_POST['hr']; 
    
 if($sal!=NULL){

  $quiry3="   INSERT INTO salle_con (id_salle_c, name_sal, jour , hr)  
  VALUES  (NULL, '".$sal."' ,'".$jr."','".$hr."' ); ";
  $result3 = mysqli_query($connection,$quiry3);
   
  //if($result3) echo "insert valide" ;
}}}

//insert seances_cont
if(isset($_POST['insérer4'])){  
if(isset($_POST['act']) && isset($_POST['a_jr']) && isset($_POST['a_hr']) )
 { 
    $act=$_POST['act']; 
    $a_jr=$_POST['a_jr']; 
    $a_hr=$_POST['a_hr']; 
    
 if($act!=NULL){

  $quiry4="   INSERT INTO act_con (id_act_c, id_activity , jour , hr)  
  VALUES  (NULL, '".$act."' ,'".$a_jr."','".$a_hr."' ); ";
  $result4 = mysqli_query($connection,$quiry4);
   
 // if($result4) echo "insert valide" ;
}}}



//insert act_cont
if(isset($_POST['insérer6'])){  
if(isset($_POST['act_1']) && isset($_POST['act_2']) && isset($_POST['nb_min']))
 { 
    $act_1=$_POST['act_1']; 
    $act_2=$_POST['act_2']; 
    $nb_min=$_POST['nb_min']; 
     
 if($act_1!=NULL && $act_2!=NULL){

  $quiry6="   INSERT INTO entre_act (id_e, act_o , act_t , nbr_min)  
  VALUES  (NULL, '".$act_1."' ,'".$act_2."' ,'".$nb_min."' ); ";
  $result6 = mysqli_query($connection,$quiry6) or die("invalid ");
   
 // if($result6) echo "insert valide" ;
}}}


?>

<!DOCTYPE html>
<html>
<head>
    <title>EDT</title>
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
     &nbsp;&nbsp;&nbsp;&#8223;génération automatique,essai gratuit, <br>facile, rapide, entièrement en ligne.&#8221;<br><br><br>
  <u>Gestion des contraintes </u></h1>
     <br>
     
<nav class="nav">    

<ul>
  <hr>
  <li><a class="active" href="Jours.php">Jours/Heures </a></li><hr>
  <li><a class="active" href="Matieres.php">Matieres</a></li><hr>
  <li><a class="active" href="Enseignants.php">Enseignants</a></li><hr>
  <li><a class="active" href="Apprenant.php">Apprenants</a></li><hr>
  <li><a class="active" href="Activité.php">Activités</a></li><hr>
  <li><a class="active" href="salles.php">Salles</a></li><hr>
  <li><a class="active" href="contr.php">Contraintes</a></li><hr>
  <li><a class="active" href="Emplois.php">Générer</a></li><hr>
</ul>
</nav>
 <br>
<center>
<h1 style="color: #424040"><u>"Contraintes Tomporelles/Spatiales"</u></h1>
</center>
<div>


  <form method="POST">
 <div class="table">
  <h3 style="color: #990000"><u>&#10148; Concernant les enseignants :</u></h3> 

  Choisissez l'enseignant :   <?php 
    require'mysql.php';
    $sql = "SELECT name_t FROM teacher ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='ens'>";echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){
    
  echo "<option>".$row['name_t'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 
 &nbsp;&nbsp; <br>

<h4 style="color: #424040">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10148;"Tomporelles"</h4>

 &raquo; le nombre maximum des jours de travail par semaine :<input type="text" name="nbj" placeholder="max=6" style="width: 100px;">&nbsp;&nbsp;<br>

 &raquo; le nombre d'heures de repos par jour  : <input type="text" name="nbh" placeholder="max=3"  style="width: 100px;">&nbsp;&nbsp;<br><br><br>

&raquo; le nombre d'heures continues de travail par jour (avec un type de séance) :<br><br>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez le type de séance :&nbsp;&nbsp;
  <select name="cod">
    <option></option>
    <option>C</option>
    <option>TD</option>
    <option>TP</option>
  </select>
  &nbsp;&nbsp;<br>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saisissez son nombre d'heures continues :<input type="text" name="nbhc" placeholder="max=4" style="width: 100px;">


  <input type="submit" name="insérer1" value ="valider"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 90px;cursor:pointer;" class="bu"><br><br>


  <h3 style="color: #990000"><u>&#10148; concernant les etudiants :</u></h3> 


Séléctionnez le groupe/ la section :
<?php 
    require'mysql.php';
    $sql = "SELECT id_year,name_year FROM year ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='et'>";echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){
  
  echo "<option>".$row['name_year'];
  echo "</option>";

   

   $sql2 = "SELECT id_groupe,name_g FROM groupe where id_year = '".$row['id_year']."'; "; 
    $res2 = mysqli_query($connection,$sql2)or die("invalid ");
    
    if ($res2) {
 while($row2 = mysqli_fetch_array($res2)){
   

  echo "<option>".$row2['name_g'];
  echo "</option>";


  $sql3 = "SELECT name_sub_g FROM sub_groupe where id_groupe = '".$row2['id_groupe']."'; "; 
    $res3 = mysqli_query($connection,$sql3)or die("invalid ");
    
    if ($res3) {
 while($row3 = mysqli_fetch_array($res3)){
  
  echo "<option>".$row3['name_sub_g'];
  echo "</option>";

   }}
   }}

   }}

   


   echo "</select>";
   ?>
   &nbsp;&nbsp;<br>

<h4 style="color: #424040">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10148;"Tomporelles"</h4>

&raquo; le nombre maximum des jours d'étude par semaine pour un groupe/une section : <input type="text" name="et_nbj" placeholder="max=6"  style="width: 100px;">&nbsp;&nbsp;<br>


&raquo; le nombre d'heures continues d'études par jour:<input type="text" name="et_nbh" placeholder="max=3"  style="width: 100px;">



 

  <input type="submit" name="insérer2" value ="valider"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu"><br><br>

    <h3 style="color: #990000"><u>&#10148; Concernant les Salles :</u></h3> 


Séléctionnez la salle :
<?php 
    require'mysql.php';
    $sql = "SELECT name_sal FROM room ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='sal'>";  echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){

  echo "<option>".$row['name_sal'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 
&nbsp;&nbsp;<br>

<h4 style="color: #424040">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10148;"Spatiales"</h4>

&raquo; Cette salle ne sera pas disponible ? : <br><br>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 le jour : 
 <?php 
    require'mysql.php';
    $sql = "SELECT name_d FROM day ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='jr'>";  echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){

  echo "<option>".$row['name_d'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 
 ,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
 à l'heur :
 <?php 
    require'mysql.php';
    $sql = "SELECT name_h FROM hour ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='hr'>";  echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){

  echo "<option>".$row['name_h'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 

  <input type="submit" name="insérer3" value ="valider"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu"><br><br>

  <h3 style="color: #990000"><u>&#10148; concernant les séances :</u></h3> 

<h4 style="color: #424040">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10148;"Tomporelles"</h4>

<h4 style="color: #990000">&raquo; un temps de démarrage préféré pour une séance :</h4> 

  Choisissez la séance : 
  <?php 
    require'mysql.php';
    $sql = "SELECT * FROM activity ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='act'>";  echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){

  echo "<option>".$row['id_activity'];
  echo "</option>";

   }}
   echo "</select>";
   ?>  &nbsp;&nbsp;<br>

  seléctionner le jour de démarrage préféré : 
  <?php 
    require'mysql.php';
    $sql = "SELECT name_d FROM day ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='a_jr'>";  echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){

  echo "<option>".$row['name_d'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 
   &nbsp;&nbsp;

  seléctionner l'heur de démarrage préférée : 
<?php 
    require'mysql.php';
    $sql = "SELECT name_h FROM hour ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='a_hr'>";  echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){

  echo "<option>".$row['name_h'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 

  &nbsp;&nbsp;

  <input type="submit" name="insérer4" value ="valider"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu"><br>

<h4 style="color: #990000">&raquo; nombre minimum de jours entre deux séances :</h4> 

 Séance 01 :
<?php 
    require'mysql.php';
    $sql = "SELECT * FROM activity ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='act_1'>";  echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){

  echo "<option>".$row['id_activity'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 
 <br>
 Séance 02 :
<?php 
    require'mysql.php';
    $sql = "SELECT * FROM activity ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='act_2'>";  echo "<option></option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){

  echo "<option>".$row['id_activity'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 
 <br>


le nombre minimum de jours entre ces séances : <input type="text" name="nb_min" placeholder="min=1"  style="width: 100px;">

  <input type="submit" name="insérer6" value ="valider"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu"><br><br>

 
  
 
   </div>
 <br><br><br><hr>
   <div class="table-responsive">    
  <h2 class="table" style="font-size: 30px;">La liste de Contraintes :</h2>
     <details class="table">       
        <table class="table" style="margin-left: -30px;">
       <thead>
      <tr>
     
      
        <th>Eneignant</th>
        <th>NB max jour</th>
        <th>NB heure repos</th>
        <th>Type de seance </th>
        <th>NB heure </th>
        <th></th>

      </tr>
       </thead>
        <tbody>
      <tr>

       <?php 
 
require "mysql.php" ;

$quiry2="  SELECT DISTINCT * FROM prof_con GROUP BY id_c; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['name_t'] . "</td>";
echo "<td>" . $row['nb_max_jr'] . "</td>";
echo "<td>" . $row['nb_hr_rep_jr'] . "</td>";
echo "<td>" . $row['type_act'] . "</td>";
echo "<td>" . $row['nb_hr_tr_cont'] . "</td>";

echo "</tr>";
 }
}
 
?>                                                                  
                         
         </tr>
       
        </tbody>
  </table><summary> Contraintes d'enseignants</summary> 
</details> 

  <details class="table">  
<table class="table" style="margin-left: -30px;">
       <thead>
      <tr>
        
      
        <th>Section/Groupe</th>
        <th>NB max jour</th>
        <th>NB heure continues</th>
        
        <th></th>

      </tr>
       </thead>
        <tbody>
      <tr>

       <?php 
 
require "mysql.php" ;

$quiry2="  SELECT DISTINCT * FROM etud_con GROUP BY id_et_c; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['id_student'] . "</td>";
echo "<td>" . $row['nb_mx_jrs'] . "</td>";
echo "<td>" . $row['nb_hr_cont'] . "</td>";

echo "</tr>";
 }
}
 
?>                                                                  
                         
         </tr>
       
        </tbody>
  </table>
  <summary> Contraintes d'etudiants</summary>
</details>


  <details class="table"> 
<table class="table" style="margin-left: -30px;">
       <thead>
      <tr>
     
      
        <th>Salle non disponible</th>
        <th>Jour</th>
        <th>Heure</th>
        
        <th></th>

      </tr>
       </thead>
        <tbody>
      <tr>

       <?php 
 
require "mysql.php" ;

$quiry2="  SELECT DISTINCT * FROM salle_con GROUP BY id_salle_c; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['name_sal'] . "</td>";
echo "<td>" . $row['jour'] . "</td>";
echo "<td>" . $row['hr'] . "</td>";

echo "</tr>";
 }
}
 
?>                                                                  
                         
         </tr>
       
        </tbody>
  </table><summary> Contraintes des salles  </summary>
</details>
  
  <details class="table"> 
<table class="table" style="margin-left: -30px;">
       <thead>
      <tr>
      
      
        <th>Id séances  </th>
        <th>Jour</th>
        <th>Heure</th>
        
        <th></th>

      </tr>
       </thead>
        <tbody>
      <tr>

       <?php 
 
require "mysql.php" ;

$quiry2="  SELECT DISTINCT * FROM act_con GROUP BY id_act_c; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['id_activity'] . "</td>";
echo "<td>" . $row['jour'] . "</td>";
echo "<td>" . $row['hr'] . "</td>";

echo "</tr>";
 }
}
 
?>                                                               
                         
         </tr>
       
        </tbody>
  </table>  


<table class="table" style="margin-left: -30px;">
       <thead>
      <tr>
        
      
        <th>Seance 1  </th>
        <th>Seance 2</th>
        <th>NB min jour</th>
        
        <th></th>

      </tr>
       </thead>
        <tbody>
      <tr>

       <?php 
 
require "mysql.php" ;

$quiry2="  SELECT DISTINCT * FROM entre_act GROUP BY id_e; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['act_o'] . "</td>";
echo "<td>" . $row['act_t'] . "</td>";
echo "<td>" . $row['nbr_min'] . "</td>";

echo "</tr>";
 }
}
 
?>                                                                  
                         
         </tr>
       
        </tbody>
  </table> 
<summary> Contraintes des séances </summary>

  </details>

  

  </div>
 
 
 
    
    
</form> 
</div>  
 <a href="Emplois.php"><input type="button" name="" value="suivant" style="float:right;position: relative;margin: 20px;" class="submit"> </a> 
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
