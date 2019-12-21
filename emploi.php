<?php
 session_start();
 if(empty($_SESSION['user']))
 {
   header('location:index.php?err=please login first');
  
 }

 //echo "helow ".$_SESSION['user'];
 
   /*if($_SERVER['REQUEST_METHOD']=="POST"){
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
    <title>EDT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 80%;
  margin-right:5%;
  margin-left:5%;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #f15a22;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 20%;
}

.tablink:hover {
  background-color: #ffcc99;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Home {background-color: #ff9966;}
#News {background-color: #ff9966;}
#Contact {background-color: #ff9966;}
#About {background-color: #ff9966;}
#module {background-color: #ff9966;}
</style>

   
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
  <a class="active" href="emploi.php">Emplois du temps</a>
  <a class="active" href="static.php">Statistique</a>
  <a class="active" href="#">Ajouter les profiles d'enseignants</a>
  <a class="active" href="#">Ajouter les profiles d'etudiants</a>
  
  
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
     &nbsp;&nbsp;&nbsp;&#8223;génération automatique,essai gratuit ,<br> facile, rapide, entièrement en ligne.&#8221;<br><br>Les emplois du temps édite  </h1>
     <br>
<button class="tablink" onclick="openPage('Home', this, '#ff9966')">Enseignants</button>
<button class="tablink" onclick="openPage('News', this, '#ff9966')" id="defaultOpen">Activities</button>
<button class="tablink" onclick="openPage('Contact', this, '#ff9966')">Salles</button>
<button class="tablink" onclick="openPage('About', this, '#ff9966')">Apprenants</button>

<button class="tablink" onclick="openPage('module', this, '#ff9966')">Modules</button>

<div id="Home" class="tabcontent">
  <h1>Consulte les différents emplois du temps d'enseignant :</h1><br>
  <a href="fet/timetables/file/file_teachers_days_horizontal.html style="color: black">L'emploi des jours de travail de tous les enseignants </a><br><br><br><br>

  <a href='fet/timetables/file/file_teachers_time_horizontal.html' style="color: black">L'emploi des heurs de travail de tous les enseignants</a><br><br><br><br>

  <a href='fet/timetables/file/file_teachers_free_periods_days_horizontal.html' style="color: black">L'emploi des pèriod vide  de travail de tous les enseignants</a><br><br><br><br>
  
 


 

</div>

<div id="News" class="tabcontent">
  <h1>Consulte les différents emplois d'activities :</h1><br>
  <a href="fet/timetables/file/file_activities_days_horizontal.html" style="color: black">L'emploi des jours de tous les activities </a><br><br><br>

  <a href='fet/timetables/file/file_activities_time_horizontal.html' style="color: black">L'emploi des heurs de tous les activities</a><br><br><br>
 
  <a href='fet/timetables/file/file_activity_tags_time_horizontal.html' style="color: black">L'emploi des heurs de tous les codes activities</a><br><br><br>
 



  
</div>

<div id="Contact" class="tabcontent">
  <h1>Consulte les différents emplois des salles :</h1><br>

  <a href="fet/timetables/file/file_rooms_days_horizontal.html" style="color: black">L'emploi des jours de tous les salles </a><br><br><br>


  <a href='fet/timetables/file/file_rooms_time_horizontal.html' style="color: black">L'emploi des heurs de tous salles </a><br><br><br>


</div>

<div id="About" class="tabcontent">
  <h1>Consulte les différents emplois du temp d'apprenants :</h1><br>

  <a href="fet/timetables/file/file_years_days_horizontal.html" style="color: black">L'emploi des jours des niveaux </a>


  <a href='fet/timetables/file/file_years_time_horizontal.html' style="color: black">L'emploi des heurs des niveaux </a><br><br>

    <a href="fet/timetables/file/file_groups_days_horizontal.html" style="color: black">L'emploi des jours des sections </a><br><br>




  <a href='fet/timetables/file/file_groups_time_horizontal.html' style="color: black">L'emploi des heurs  des sections </a><br><br>

    

  <a href="fet/timetables/file/file_subgroups_days_horizontal.html" style="color: black">L'emploi des jours des groupes </a><br><br>


</div>
<div id="module" class="tabcontent">
  <h1>Consulte les différents emplois des modules :</h1><br>

  <a href="fet/timetables/file/file_activities_days_horizontal.html" style="color: black">L'emploi des jours de tous les modules </a><br><br><br>

  

  <a href='fet/timetables/file/file_activities_time_horizontal.html' style="color: black">L'emploi des heurs de tous les modules </a><br><br><br>

</div>
<input type="submit" name="" value="Telecharger" style="float:right;position: relative;margin: 20px;" class="submit">
<input type="submit" name="" value="Imprimer" style="float:right;position: relative;margin: 20px;" class="submit">
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

		

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