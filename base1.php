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
$user = $_SESSION['user'] ;

//if($_SESSION['type']!="chef")session_close(); 


?>
<!DOCTYPE html>
<html>
<head>
  <title>Mon profile</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<meta charset="utf-8">


<link rel="icon" type="image/png" href="l.ico">


<link rel="stylesheet" href="chefst.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

 
 


<style>
body {
  background:    #fff2cc;
  height: 100%;
  overflow: auto;
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
  <a href="index.php"> <img src="l.png" height="150px" width="150px"  ></a>
<div id="myNav" class="overlay">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <a class="active" href="base1.php">Mon Acceuil</a>
  <a class="active" href="jours.php">Génération</a>
  <a class="active" href="emploi.php">Emplois du temps</a>
  <a class="active" href="static.php">Statistique</a>
  <a class="active" href="ajouter.php">Ajouter les profiles d'enseignants</a>
  <a class="active" href="ajet.php">Ajouter les profiles d'etudiants</a>
  
  
 <a> <form  method="POST"><button name="logout">Déconnecter  </button></form></a>
  </div>
  </div>
  <span style="font-size:40px;cursor:pointer;color:#f15a22;position:absolute;right: 10px " onclick="openNav()">&#9776;</span>
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
  
  <!--h1></h1-->

<div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="user.png" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
           <?php echo ''.$_SESSION['user'];?>
          </div>
          <div class="profile-usertitle-job">
            Chef de département d'informatique
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <form method="post">
          <button name = "logout" class="btn btn-danger btn-sm">déconnecter</button>
        </form>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <a href="chef.php">
              <i class="glyphicon glyphicon-home"></i>
              Mon aceeuil </a>
            </li>
            <li>
              <a href="#">
              <i class="glyphicon glyphicon-user"></i>
              Paramètres du compte </a>
            </li>
            <li>
              <a href="#" target="_blank">
              <i class="glyphicon glyphicon-ok"></i>
              Taches et responsabilités </a>
            </li>
            <li>
              <a href="aide.html">
              <i class="glyphicon glyphicon-flag"></i>
              aide </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
    <div class="col-md-9">
            <div class="profile-content">
          <div class="row">
    <div class="col-md-6 col-sm-12" style="background-color:#f2ede1 ; margin-right: 20px;margin-top: -15px;padding-bottom: 5px">
      
        
        <h2><a style="color: black" href="jours.php">Créer un nouveau emplois du temps</a></h2>
        <h2></h2>
        <p>Création d'un nouveau emplois du temps , en affectant les ressources de votre département (Salles, enseignants, …) à des types d’enseignement universitaire (Séances de cours, TD et TP), tout en respectant un ensemble de contraintes pour éviter les conflits. </p>
      
    </div>
    <div class="col-md-6 col-sm-12" style="background-color: #ad8b69; margin-top: -221px;margin-left: 410px">
      <div class="skills">
    <h2><a style="color: white" href="static.php">Statistiques</a></h2>
    <div>
        <strong>enseignants</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
          </div>
        <div>
        <strong>Matieres</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
          </div>
          <div>
        <strong>Salles</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
          </div>
          <div>
        <strong>apprenants</strong><br>&nbsp;
        
          </div>
          
          </div>
      </div>
    </div>
  </div>
            </div-->


<!-- education and languages -->
<section class="container">
  <div class="row">
    <div  style="background-color:#e08d3c;margin-top: -250px;margin-left: 6px;padding-bottom: 20px;margin-right: 600px">
      <div class="education">
        <h2 class="white" style="padding-top: 10px;padding-left: 10px">A propos de département</h2>
          <div class="education-content">
            <h4 class="education-title accent">&nbsp;&nbsp;&nbsp;Département d'informatique</h4>
              <div class="education-school">
                <h5>&nbsp;&nbsp;&nbsp;Université Yahia Fares Médéa</h5><span></span>
                <h5>&nbsp;&nbsp;&nbsp;année universitaire 2018-2019</h5>
              </div>
            <p class="education-description">&nbsp;&nbsp;&nbsp;Le département d'informatique à l'université de médéa est indépendant aprés qu'il &nbsp;&nbsp;<br>&nbsp;&nbsp;<br>&nbsp;&nbsp; était soumis au département de génie éléctronique </p>
          </div>
      </div>
    </div>
    <div style="background-color: #d1cdca;margin-top: -243px;margin-left: 573px;padding-bottom: 18px;margin-right: 348px">
      <div class="languages">
        <h2  style="padding-top: 10px;padding-left: 10px">Utilisateurs</h2>
          <ul>
            <h3><li>Enseignants</li></h3>
            
            <h3><li>étudiants</li></h3>
            
          </ul>
                <center>
                   <a href="ajouter.php" > <input 
                   style="margin-top: 13px" type="button" value="Ajouter"> </a>
                </center>
      </div>
    </div>
  </div>
</section>


    </div>
  </div>
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


