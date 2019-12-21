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
<?php  



error_reporting(E_ALL | E_ALL);
require "mysql.php" ;
if(isset($_POST['insérer'])){  
if(isset($_POST['ens']) && isset($_POST['module']) && isset($_POST['Code_activite']) && isset($_POST['apprenant']) && isset($_POST['dure']))
 { 
    $module=$_POST['module']; 
    $ens=$_POST['ens']; 
    $Code_activite=$_POST['Code_activite']; 
    $apprenant=$_POST['apprenant'];
    $dure=$_POST['dure'];
 

  $quiry="   INSERT INTO activity (id_activity,name_t,name_s,name_tag,id_student,dure)  VALUES  (NULL, '".$ens."' ,'".$module."','".$Code_activite."' , '".$apprenant."' ,'".$dure."'); ";
  $result = mysqli_query($connection,$quiry);
   
  //if($result) echo "insert valide" ;
}}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Séances</title>
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
     &nbsp;&nbsp;&nbsp;&#8223;génération automatique,essai gratuit<br> facile, rapide, entièrement en ligne.&#8221;<br><br>
     Gestion d'activités </h1>
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
  <h3 style="color: #990000">&#10148; Insérer les differents activités :</h3> 

  Enseignant :
 
   <?php 
    require'mysql.php';
    $sql = "SELECT name_t FROM teacher ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='ens'>";echo "<option> </option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){
  
  echo "<option>".$row['name_t'];
  echo "</option>";

   }}
   echo "</select>";
   ?> 
 &nbsp;&nbsp;<br><br>

  Module : <?php 
    require'mysql.php';
    $sql2 = "SELECT name_s FROM subject ; "; 
    $res2 = mysqli_query($connection,$sql2)or die("invalid ");
    echo "<select name='module'>";echo "<option> </option>";
    if ($res) {
 while($row = mysqli_fetch_array($res2)){
  
  echo "<option>".$row['name_s'];
  echo "</option>";

   }}
   echo "</select>";
   ?> &nbsp;&nbsp;<br><br>
  Apprenant : <?php 
    require'mysql.php';
    $sql = "SELECT id_year,name_year FROM year ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='apprenant'>";echo "<option> </option>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){
  
  /*echo "<option>".$row['name_year'];
  echo "</option>";*/

   

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
   ?> &nbsp;&nbsp;<br><br>
 
 Code_activité : <select name="Code_activite"><option> </option><option>C</option><option>TD</option><option>TP</option></select>&nbsp;&nbsp;<br><br>
  

  La durée : <select name="dure">  <option>1</option> <option>2</option> </select>
<br>
<br>
   
<input type="submit" name="insérer" value ="insérer"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu" onclick=alert('activité ajoutéé') ><br><br>
  
 
       
     <h4 style="color: #990000">&#10148; Vous pouvez importer les activités par des fichiers csv :</h4>       
	 Importer les activités : <input type="file" name="file" > 
   <input type="button" name="mod" value ="import"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu">
  <br>

   </div>

   <div class="table-responsive">          
        <table class="table">
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
 
 
<a href="salles.php"><input type="button" name="suivant" value="suivant" style="float:right;position: relative;margin: 20px;" class="submit"></a>  
    
    
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


 







</html>.