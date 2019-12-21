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

$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
require'mysql.php';
/*
 $query="select * from val_ens where nom= '". $user ."' AND password_ens= '". $pass ."'";
     $result=  mysqli_query($connection, $query)or die("errrrrrrrrrr");

$row=mysqli_fetch_assoc($result);

$niv=$row['niv'];
$sec=$row['sec'];
$grb=$row['grb'];    
*/



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
<html>
<head>
	<title>Mon profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" media="all" href="file_stylesheet.css" type="text/css" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="l.ico">

<link rel="stylesheet" href="chefst.css">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 80%;
  margin:0;
  
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
</style>


<a href="index.php"> <img src="l.png" height="150px" width="150px"  ></a>
 <div id="myNav" class="overlay">
 
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <a class="active" href="base1.php">Mon Acceuil</a>
  
  
  
  <a> <form  method="POST"><button name="logout">Déconnecter  </button></form></a>
  </div>
  </div>
  <span style="font-size:40px;cursor:pointer;color:#f15a22;position:absolute;right: 10px " onclick="openNav()">&#9776;</span>

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
					<img src="user_et.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
            <?php echo ''.$_SESSION['user'];?>
					<div class="profile-usertitle-job">
						 etudiant en departement informatique 

					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">

       <button type="button" class="btn btn-danger btn-sm">déconnecter</button>
					<!--button type="button" class="btn btn-success btn-sm"name='logout'>déconnecter</button>
					<!--button type="button" class="btn btn-danger btn-sm">Message</button-->
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="base.php">
							<i class="glyphicon glyphicon-home"></i>
							Mon aceeuil </a>
						</li>
						<li>
							<a href="ajouter.php">
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
		
		
</div>





<div>
  
  <table id="table_18" border="1" class="even_table" style="background-color: white;">
      <caption></caption>
      <thead>
        <tr><td rowspan="2"></td><th colspan="6"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Univ Yahia Fares</th></tr>
        <tr>
          <!-- span -->
        <th class="xAxis"><br>&nbsp;&nbsp;08:00-09:30<br> &nbsp; </th>
          <th class="xAxis"><br>&nbsp;&nbsp;09:35-11:05<br> &nbsp;</th>
          <th class="xAxis"><br>&nbsp;&nbsp;11:10-12:40<br> &nbsp;</th>
          <th class="xAxis"><br>&nbsp;&nbsp;12:45-14:15<br> &nbsp;</th>
          <th class="xAxis"><br>&nbsp;&nbsp;14:20-15:50<br> &nbsp;</th>
          <th class="xAxis"><br>&nbsp;&nbsp;15:55-17:25<br> &nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th class="yAxis">&nbsp;&nbsp;Samdi</th>
          <?php  

 $query="select * from val_ens where nom= '". $_SESSION['user'] ."' AND password_ens= '". $_SESSION['pass'] ."'";
     $result=  mysqli_query($connection, $query)or die("errrrrrrrrrr");

$row=mysqli_fetch_assoc($result);

$niv=$row['niv'];
$sec=$row['sec'];
$grb=$row['grb'];  
        $sql = " SELECT * FROM timetable WHERE id_student IN('". $niv ."','". $grb ."','". $sec ."') 
        AND day = 'Samdi' AND hour='08:00-09:30' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>";
    echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>

           <?php  

 $query="select * from val_ens where nom= '". $_SESSION['user'] ."' AND password_ens= '". $_SESSION['pass'] ."'";
     $result=  mysqli_query($connection, $query)or die("errrrrrrrrrr");

$row=mysqli_fetch_assoc($result);

$niv=$row['niv'];
$sec=$row['sec'];
$grb=$row['grb'];  
        $sql = " SELECT * FROM timetable WHERE id_student IN('". $niv ."','". $grb ."','". $sec ."') 
        AND day = 'Samdi' AND hour='09:35-11:05' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>";
    echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE id_student IN('". $niv ."','". $grb ."','". $sec ."') AND day = 'Samdi' AND hour='11:10-12:40' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."') AND day = 'Samdi'
         AND hour='12:45-14:15' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."') AND day = 'Samdi' AND hour='14:20-15:50' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
      <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."') AND day = 'Samdi'
         AND hour='15:55-17:25' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>

  
          
        
        </tr>
        <tr>
          <th class="yAxis">&nbsp;&nbsp;Dimanche</th>
        <?php 

 $query="SELECT * FROM val_ens where nom= '". $_SESSION['user'] ."' AND password_ens= '". $_SESSION['pass'] ."'";
     $result=  mysqli_query($connection, $query)or die("errrrrrrrrrr");

$r=mysqli_fetch_assoc($result);

$niv=$r['niv'];
$sec=$r['sec'];
$grb=$r['grb']; 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."') 
         AND day = 'Dimanche'
         AND hour='08:00-09:30' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
    <?php 
        $sql = " SELECT * FROM timetable WHERE id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Dimanche'
         AND hour='09:35-11:05' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Dimanche'
         AND hour='11:10-12:40' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Dimanche'
         AND hour='12:45-14:15' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Dimanche'
         AND hour='14:20-15:50' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
      <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Dimanche'
         AND hour='15:55-17:25' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>





          
        </tr>
        <tr>
          <th class="yAxis">&nbsp;&nbsp;Lundi</th>
   
 <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Lundi'
         AND hour='08:00-09:30' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
    <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Lundi'
         AND hour='09:35-11:05' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Lundi'
         AND hour='11:10-12:40' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Lundi'
         AND hour='12:45-14:15' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  
        AND day = 'Lundi'
         AND hour='14:20-15:50' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
      <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."') 
         AND day = 'Lundi'
         AND hour='15:55-17:25' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>




        </tr>
        <tr>
          <th class="yAxis">&nbsp;&nbsp;Mardi</th>
         

 <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mardi'
         AND hour='08:00-09:30' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
    <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mardi'
         AND hour='09:35-11:05' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mardi'
         AND hour='11:10-12:40' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mardi'
         AND hour='12:45-14:15' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mardi'
         AND hour='14:20-15:50' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
      <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mardi'
         AND hour='15:55-17:25' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>



        </tr>
        <tr>
          <th class="yAxis">&nbsp;&nbsp;Mercredi</th>
     
     <?php 
        $sql = " SELECT * FROM timetable WHERE   id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mercredi'
         AND hour='08:00-09:30' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
    <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mercredi'
         AND hour='09:35-11:05' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
   $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mercredi'
         AND hour='11:10-12:40' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
       $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mercredi'
         AND hour='12:45-14:15' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mercredi'
         AND hour='14:20-15:50' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
      <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Mercredi'
         AND hour='15:55-17:25' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>


        </tr>
        <tr>
          <th class="yAxis">&nbsp;&nbsp;Jeudi</th>
                    


 <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Jeudi'
         AND hour='08:00-09:30' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
    <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Jeudi'
         AND hour='09:35-11:05' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Jeudi'
         AND hour='11:10-12:40' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Jeudi'
         AND hour='12:45-14:15' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
     <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Jeudi'
         AND hour='14:20-15:50' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>
      <?php 
        $sql = " SELECT * FROM timetable WHERE  id_student IN('". $niv ."','". $grb ."','". $sec ."')  AND day = 'Jeudi'
         AND hour='15:55-17:25' ;";

   $result = mysqli_query($connection,$sql)or die("invalid");     
if ($result) {
$row = mysqli_fetch_array($result); 
  //if ($row['day']='Samdi' && $row['hour']='08:00-09:30') {
    
  
    echo "<td>"; 
    echo $row['id_student']; echo "<br>";
    echo $row['name_s']; echo "<br>"; echo $row['name_t']; echo "<br>";
    echo $row['name_tag']; echo "<br>";
    echo $row['name_sal'];
    echo "</td>";
        
  //else echo " <td>"."*/*"."</td>";

 } else echo " <td>"."*/*"."</td>";

 ?>




        </tr>
        <tr class="foot"><td></td><td colspan="6"></td></tr>
      </tbody>
    </table>


  
</div>


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
<?php
//unset($_SESSION['user']);
 //session_destroy();





?>
