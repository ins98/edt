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
if(!empty($_POST['module']))
 { 
    $module=$_POST['module'];  
    $sp=$_POST['sp'];  
    $nb_c=$_POST['nb_c'];
    $nb_d=$_POST['nb_d'];  
    $nb_p=$_POST['nb_p'];

  $quiry="   INSERT INTO subject (name_s,specialite,id_s,nb_c,nb_d,nb_p)
  VALUES  ('".$module."', '".$sp."',NULL,'".$nb_c."','".$nb_d."','".$nb_p."') ; " ;
//  WHERE NOT EXISTS (SELECT name_s FROM subject WHERE name_s = '".$module."') ; ";
  $result = mysqli_query($connection,$quiry) or die("invalid");
   
  //if($result) echo "insert valide".mysqli_insert_id($connection) ;
}}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Matieres</title>
    <meta charset="utf-8">
   <link rel="stylesheet" href="icon.css">
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
  <a class="active" href="#">Ajouter les profiles d'enseignants</a>
  <a class="active" href="#">Ajouter les profiles d'etudiants</a>
  
  
  <a> <form  method="POST"><button name="logout">Déconnecter  </button></form></a>
  </div>
  </div>
  <span style="font-size:40px;cursor:pointer;color:#f15a22;position:absolute;right: 10px " onclick="openNav()">&#9776;</span>


	<a href="base1.php"> <img src="l.png" height="150px" width="150px"  ></a>

<h1 style="color: #f15a22;text-align:center; text-shadow: 0px 0px 4px #ffb3b3;position:relative;padding:5px;
margin:3px;display:block;margin-top: -130px;
  font-family: Comic Sans MS, Comic Sans, cursive;
  font-style: italic;
  font-size:25px;
  font-weight:bold;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  text-shadow:1px 1px 0px #fa8072;">EDT :  Emploi du temps universitaire en ligne 
     <br>
     &nbsp;&nbsp;&nbsp;&#8223;génération automatique,essai gratuit<br> facile, rapide, entièrement en ligne.&#8221;<br><br>Gestion des matieres  </h1>
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
  <h3 style="color: #990000">&#10148; Insérer les differents modules :</h3> 
  Module : <input type="text" name="module" placeholder="insérer un module" required>&nbsp;&nbsp;
  Spécialité : <input type="text" name="sp" placeholder="insérer la specialite" required><br> &nbsp;&nbsp;
  Nombre de cour par semaine : <input type="text" name="nb_c" style="width: 100px;" ><br>&nbsp;&nbsp;
  Nombre de TD par semaine : <input type="text" name="nb_d" style="width: 100px;" ><br>&nbsp;&nbsp;
  Nombre de TP par semaine : <input type="text" name="nb_p" style="width: 100px;" ><br>&nbsp;&nbsp;

   
<input type="submit" name="insérer" value ="insérer"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu" onclick=alert('matiére ajoutéé') >
  
       
     <h4 style="color: #990000">&#10148; Vous pouvez importer les modulespar des fichiers csv :</h4>       
	 Importer les matieres : <input type="file" name="file" > 
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
      <tr>
        
        
        <th>Nom de module</th>
        <th>Spécialité</th>
        <th>Nbr cour</th>
        <th>Nbr TD</th>
        <th>Nbr TP</th>
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
echo "<td>" . $row['nb_c'] . "</td>";
echo "<td>" . $row['nb_d'] . "</td>";
echo "<td>" . $row['nb_p'] . "</td>";
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
 
</form> </div>

 
    <a href="Enseignants.php">  <input type="button" name="" value="suivant" style="margin-left: 1100px" class="submit"> </a>
    
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