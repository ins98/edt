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
     

  $quiry="   INSERT INTO module (id_module,nom_module)  VALUES  (NULL, '".$module."'); ";
  $result = mysqli_query($connection,$quiry);
   
  //if($result) echo "insert valide".mysqli_insert_id($connection) ;
}}

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
  <a class="active" href="#">Ajouter les profiles d'enseignants</a>
  <a class="active" href="#">Ajouter les profiles d'etudiants</a>
  
  
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
     Gestion de code_activité </h1>
     <br>
     
<nav class="nav">    

<ul>
  <hr>
  <li><a class="active" href="Jours.php">Jours/Heures </a></li><hr>
  <li><a class="active" href="Matieres.php">Matieres</a></li><hr>
  <li><a class="active" href="code.php">Code_activité</a></li><hr>
  <li><a class="active" href="Enseignants.php">Enseignants</a></li><hr>
  <li><a class="active" href="Apprenant.php">Apprenants</a></li><hr>
  <li><a class="active" href="Activité.php">Activités</a></li><hr>
  <li><a class="active" href="salles.php">Salles</a></li><hr>
  <li><a class="active" href="contr.php">Contraintes</a></li><hr>
</ul>
</nav>
 <form method="POST">
 <div class="table">
  <h3 style="color: #990000">&#10148; Insérer les differents code_activité :</h3> 
  code_activité : <input type="text" name="module" placeholder="exp : cour ,tp,td" required>&nbsp;&nbsp;<br><br>

  imprimable   :  <input type="checkbox" name="">Oui  <input type="checkbox" name="">Non<br><br>
   

  
  Commentaire : <textarea cols="40" rows="5" name="comment" placeholder="Commentaire par défaut"></textarea>
  <input type="submit" name="insérer" value ="insérer"style="font-size: 20px;
  background-color:#ffcc99 ;  
  color: #ff3300 ;
  text-align: center;
  border:2px solid #ff5050 ;
  border-radius: 8px; padding: 10px; margin: 10px; margin-left: 60px;cursor:pointer;" class="bu"><br><br>
       
     <h4 style="color: #990000">&#10148; Vous pouvez importer les codes par des fichiers csv :</h4>       
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
        <th>#</th>
        <th>Nom de code</th>
        
        <th>imprimer</th>
        

      </tr>
       </thead>
        <tbody>
      <tr>
        <?php 
 
require "mysql.php" ;
$quiry2="  SELECT DISTINCT * FROM module GROUP BY id_module ; " ;
$result2 = mysqli_query($connection,$quiry2);
if ($result2) {
 while($row = mysqli_fetch_array($result2)){
  echo "<tr>";
echo "<td>" . $row['id_module'] . "</td>";
echo "<td>" . $row['nom_module'] . "</td>";
echo "<td>"."<input type='button' value='modifier' class='bu'>".
        "<input type='button' value='supprimer' class='bu'>"."</td>";
echo "</tr>";
 }
}

 
?>                                                                       
        
        
        
         </tr>
       

        </tbody>
  </table>
  </div>
 
 
<input type="submit" name="" value="suivant" style="float:right;position: relative;margin: 20px;" class="submit">  
    
    
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