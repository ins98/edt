<?php
 session_start();
 if(empty($_SESSION['user']))
 {
   header('location:index.php?err=please login first');
  
 }

 //echo "helow ".$_SESSION['user'];
 
   if($_SERVER['REQUEST_METHOD']=="POST"){
     session_destroy();
     header('location:index.php');
   }
?> 

<!DOCTYPE html>
<html>
<head>
    <title>EDT</title>
    <meta charset="utf-8">
     <link rel="icon" type="image/png" href="l.ico"> 
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="stylebase1.css">


<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
  <link rel="stylesheet" type="text/css" href="engine0/style.css" />
  <script type="text/javascript" src="engine0/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section --></head>
<style>
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 100;
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
  <a class="active" href="#">Emplois du temps</a>
  <a class="active" href="#">Statistique</a>
  <a class="active" href="#">Ajouter les profiles d'enseignants</a>
  <a class="active" href="#">Ajouter les profiles d'etudiants</a>
  
  
  <a> <form  method="POST"><button>Déconnecter  </button></form></a>
  </div>
  </div>

<span style="font-size:40px;cursor:pointer;color:#f15a22;position:absolute;right: 10px " onclick="openNav()">&#9776;</span>
<img src="l.png" height="150px" width="150px" style="position: absolute;left: 5px;top: 5px">
<br>
<h1 style="color: #cc0000;text-align:center; text-shadow: 0px 0px 4px #ffb3b3;position:absolute;bottom:65%;
right:20%; left: 20%; 
  display:block;
  font-family: Comic Sans MS, Comic Sans, cursive;
  font-style: italic;
  font-size:25px;
  font-weight:bold;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  text-shadow:1px 1px 0px #fa8072;">EDT :  Emploi du temps universitaire en ligne 
     <br>
     &nbsp;&nbsp;&nbsp;&#8223;génération automatique,essai gratuit<br> facile, rapide, entièrement en ligne.&#8221; <br><br>bienvenue dans  votre espace</h1>
     <br><br><br><br><br><br><br><br><br><br><br><br>
     <img src="chef.png" height="180px" width="180px" style="margin-left: 100px;"><br><br>
     <div style="position: absolute;left: 20%;color: #f15a22">
     <h2>Nom :<?php echo '  '.$_SESSION['user'];?></h2><br>
     <h2>Prénom :<?php echo '  '.$_SESSION['user'];?></h2><br>
     <h2>Département : Informatique</h2><br>
       <h2>Email :</h2><br>
     </div>
     <div>
     

     </div>



  
<script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>


<!--?php
//connect
$host="localhost";
$user="root";
$password="";
$data="sysadmins";
$link = mysqli_connect($host,$user,$password,$data);

//get all the tables
$query = 'SHOW TABLES FROM '.$data;
$result = mysqli_query($link,$query) or die('cannot show tables');
if(mysqli_num_rows($result))
{
  //prep output
  $tab = "\t";
  $br = "\n";
  $xml = '<?//xml version="1.0" encoding="UTF-8"?>.$br;
  $xml.= '<fet version="5.37.5">'.$br;
 // $xml.= '<database name="'.$data.'">'.$br;
  
  //for every table...
  while($table = mysqli_fetch_row($result))
  {
    //prep table out
    $xml.= $tab.'<"'.$table[0].'">'.$br;
    
    //get the rows
    $query3 = 'SELECT * FROM '.$table[0];
    $records = mysqli_query($link,$query3) or die('cannot select from table: '.$table[0]);
    
    //table attributes
    /*$attributes = array('acount','module');
    $xml.= $tab.$tab.'<columns>'.$br;
    $x = 0;
    while($x < mysqli_num_fields($records))
    {
      $meta = mysqli_fetch_field($records);
      $xml.= $tab.$tab.$tab.'<column ';
      foreach($attributes as $attribute)
      {
        $attribute= $attributes.'="'.$meta->$attributes.'" ';
      }
      $xml.= '/>'.$br;
      $x++;
    }
    $xml.= $tab.$tab.'</columns>'.$br;
    */
    //stick the records
    $xml.= $tab.$tab.'<"'.$table[0].'"_list>'.$br;
    while($record = mysqli_fetch_assoc($records))
    {
      $xml.= $tab.$tab.$tab.'<"'.$table[0].'">'.$br;
      foreach($record as $key=>$value)
      {
        $xml.= $tab.$tab.$tab.$tab.'<'.$key.'>'.htmlspecialchars(stripslashes($value)).'</'.$key.'>'.$br;
      }
      $xml.= $tab.$tab.$tab.'</'.$table[0].'">'.$br;
    }
    $xml.= $tab.$tab.'</"'.$table[0].'"_list>'.$br;
    $xml.= $tab.'</table>'.$br;
  }
 // $xml.= '</database>';
  
  //save file
  $handle = fopen($data.'-backup-'.time().'.fet','w+');
  fwrite($handle,$xml);
  fclose($handle);
}
?>

</body>


 








</html>









 
 
 

 